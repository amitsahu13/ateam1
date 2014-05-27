<?php
/*
 * Inbox Model For Our MailBOx Stack pashkovdenis@gmail.com 2013
 */
class Inbox extends AppModel {
	var $useTable = false;
	 
	// get Totals
	public static function getTotal($user, $type = "") {
		$model = new self ();
		App::import ( "model", "User" );
		App::import ( "model", "Job" );
		App::import ( "model", "Project" );
		$total = 0;
		
		if ($type == "")
			$work_rooms = $model->query ( "SELECT count FROM   chat_logs  WHERE user_id='{$user}'    " );
		else
			$work_rooms = $model->query ( "SELECT count FROM   chat_logs  WHERE user_id='{$user}'  AND room_type='{$type}'    " );
		
		if (! empty ( $work_rooms [0] ["chat_logs"] ["count"] ))
			$total = $work_rooms [0] ["chat_logs"] ["count"];
		
		return $total;
	}
	private function substr($strin, $limit) {
		$str = "";
		for($x = 0; $x <= $limit; $x ++) {
			$str .= $strin [$x];
		}
		return $str . "...";
	}
	/*
	 * GetInbox 2013 pashkovdenis@gmail.com ___________
	 */
	public function getInbox($user = 1, $type = null) {
		$result = array ();
		App::import ( "model", "User" );
		App::import ( "model", "Job" );
		App::import ( "model", "Project" );
		
		$project_model = new Project ();
		$user_model = new User ();
		$job_model = new Job ();
		
		$this->query ( "DELETE FROM chat_logs WHERE user_id = '{$user}'  " );
		$records = array(1);
		$multi =  1 ;

		$ids =array(1);
		
		$experts = $this->query ( "SELECT room_id FROM  workroom_experts WHERE expert='{$user}' " );
		foreach ( $experts as $ex )
			$ids [] = $ex ["workroom_experts"] ["room_id"];
			
		
		$work_rooms = $this->query ( "SELECT * FROM  workroom  WHERE   (user_id='{$user}' OR   to_user = '{$user}'  OR leader= '{$user}' OR id IN (" . join ( ",", $ids ) . "))  ORDER BY timestamp DESC    " );
		
		if ($type != "" && $type == 1)
			 $work_rooms = $this->query ( "SELECT * FROM  workroom  WHERE   (user_id='{$user}' OR   to_user = '{$user}'  OR leader= '{$user}'  OR id IN (" . join ( ",", $ids ) . ") ) AND private=1 AND to_user!=''  ORDER BY timestamp DESC    " );
		if ($type != "" && $type == 2)
			 $work_rooms = $this->query ( "SELECT * FROM  workroom  WHERE   (user_id='{$user}' OR   to_user = '{$user}'  OR leader= '{$user}' OR id IN (" . join ( ",", $ids ) . ")) AND  job_id<>''  ORDER BY timestamp DESC    " );

		

		foreach ( $work_rooms as $room ) {
            $multi  ++ ;
			$last = $this->query ( "SELECT * FROM workroom_chat WHERE room_id = '{$room['workroom']["id"]}'  ORDER BY id DESC LIMIT 1" );
			
			if (empty ( $last ))
				continue;
			
			$rec = new stdClass ();
			
			
			$rec->time =$this->caltime(strftime ( "%Y-%m-%d %H:%M:%S", $last [0] ["workroom_chat"] ["timestamp"] ));
			//$rec->time = strftime ( "%m-%d-%Y ", $last [0] ["workroom_chat"] ["timestamp"] );
			if (strlen ( $last [0] ["workroom_chat"] ["text"] ) > 50)
				$rec->text = $this->substr ( $last [0] ["workroom_chat"] ["text"], 50 );
			else
				$rec->text = $last [0] ["workroom_chat"] ["text"];
			
			
			$ca =   Workroom::getAttachCount( $room['workroom']["id"] ) ;  
			if ($ca)
			$rec->attach =   $ca; 
			else
			$rec->attach =   '';
			  
			
			
			
			$rec->user_id = $last [0] ["workroom_chat"] ["user_id"];
			
			if ($user != $room ["workroom"] ["to_user"])
				$rec->to_user = $room ["workroom"] ["to_user"];
			else
				$rec->to_user = $room ["workroom"] ["user_id"];
			
			$rec->counter = 0;
			$rec->chat = 0;
			$rec->type = $room ["workroom"] ["type"];
			$rec->private = 0;
			$rec->raw = false;
            $rec->order =   $last [0] ["workroom_chat"] ["timestamp"] +  $multi  ;
			$rec->job_id = $room ["workroom"] ["job_id"];
			$rec->private_room = 0;
			$rec->room = $room ["workroom"] ["id"];
			$rec->project = $room ["workroom"] ["project_id"];
			$rec->total = 0;
			$tot = $this->query ( "SELECT COUNT(*) as c FROM  workroom_chat WHERE room_id = '{$room['workroom']["id"]}'    " );
			$rec->total = $tot [0] [0] ["c"];
			
			if ($last [0] ["workroom_chat"] ["user_id"] != $user)
				$username = $user_model->find ( "first", array (
						"conditions" => array (
								"id" => $last [0] ["workroom_chat"] ["user_id"] 
						),
						'fields'=>array('id','first_name','last_name','username','email','status','role_id','created','modified')
				) );
			else
				$username = $user_model->find ( "first", array (
						"conditions" => array (
								"id" => $room ['workroom'] ["to_user"] 
						), 
						'fields'=>array('id','first_name','last_name','username','email','status','role_id','created','modified')
				) );
			
			//print_r($username );
			$userstring = $username ["User"] ["username"];
			
			$usermy=$username ["User"] ["first_name"];
			$user_role=$username ["User"] ["role_id"];
			
			if ($rec->type == 0) {
				$rec->chat = 1;
				$userstring = $userstring . "@chat";
				 $rec->chatroom = Workroom::getChatroomByid ( $rec->room, $user );
			} else {
				
				if ($room ["workroom"] ["private"] == 1)
					$rec->private = 1;
				$jobname = "";
				$project = "";
				
				if (! empty ( $room ["workroom"] ["job_id"] ) && $room ["workroom"] ["to_user"] != 0) {
					$rec->private_room = 1;
					$job = $job_model->find ( "first", array (
							"conditions" => array (
									"id" => $room ["workroom"] ["job_id"] 
							) 
					) );
					$userstring .= "@" . $job ["Job"] ["title"];
				}
				
				
				
			
				if (! empty ( $room ["workroom"] ["project_id"] ) &&  empty ( $room ["workroom"] ["job_id"] ) ) {
					$rec->private = 1;
					if (! empty ( $room ["workroom"] ["job_id"] )) {
						$job = $job_model->find ( "first", array (
								"conditions" => array (
										"id" => $room ["workroom"] ["job_id"] 
								) 
						) );
						$userstring .= "@" . $job ["Job"] ["title"];
					}
					$job = $project_model->find ( "first", array (
							"conditions" => array (
									"id" => $room ["workroom"] ["project_id"] 
							) 
					) );
					$userstring .= "@" . $job ["Project"] ["title"];
				}
				
				
				
				
				
				
			} 
			
			
			// get   User name   
			$rec->user_name = $userstring;
			$rec->user_f_name= $usermy;
			$rec->user_role=$user_role;
			$result [] = $rec;
		
		}
		
		// Load App Stack for our needs Stack :
		App::import ( "model", "SystemInbox" );
		App::import ( "model", "Workroom" );
		$room = new Workroom ();
		
		$inbox = new SystemInbox ();
		$systems = $inbox->find ( "all", array (
				"conditions" => array (
						"to_user" => $user 
				) 
		) );
		
		// System as as
		// SysteM  Reserverd
		foreach ( $systems as $s ) {
			$multi ++ ;
			$rec = new stdClass ();
			$rec->time = $this->caltime(strftime ( "%Y-%m-%d ", strtotime($s ["SystemInbox"] ["date"])));
			$rec->text = $s ["SystemInbox"] ["text"];
			$rec->attach = "";
			$rec->user_id = "";
			$rec->to_user = "";
			$rec->counter = 0;
			$rec->chat = 0;
			$rec->private = 0;
			$rec->raw = 1;
			$rec->private_room = 0;
			$rec->order   =    strtotime($s ["SystemInbox"] ["date"])  +  $multi;
			$rec->room = "";
			$rec->project = "";
			$rec->total = 0;
			$tot = "";
			$rec->total = "";
			$rec->chat = "";
			$rec->user_name = "System";
			$rec->job_id = $s ["SystemInbox"] ["job_id"];

			$s = $room->query ( "SELECT * FROM workroom WHERE job_id='{$rec->job_id}'  AND   (to_user='{$user}'  OR leader='{$user}' OR user_id='{$user}' ) ORDER BY id DESC LIMIT 1 " );
			if (! empty ( $s [0] ["workroom"] ["type"] ))
				$rec->type = $s [0] ["workroom"] ["type"];
			
			if (isset ( $s [0] ["workroom"] ["id"] ))
				$rec->room = $s [0] ["workroom"] ["id"];
			else
				$rec->room = 0;
			
			$result [] = $rec;
		}




        // Sort   Inbox    Messages :

		/*uasort ( $result, function ($a, $b) {
            $a1 =  ( $a->order );
			$b1 =  ( $b->order );
			if ($a1 == $b1) {
				return 0;
			}
			return ($a1 < $b1) ? 1 : 0;
		} );*/



		return $result;
	}


	public function caltime($time){
			$date1 = strtotime($time);
			$date2 = time();
			$subTime = $date2 - $date1;
			$y = ($subTime/(60*60*24*365));
			$d = ($subTime/(60*60*24))%365;
			$h = ($subTime/(60*60))%24;
			$m = ($subTime/60)%60;
			$s = ($subTime)%60%60;
			//echo "Difference between ".date('Y-m-d H:i:s',$date1)." and ".date('Y-m-d H:i:s',$date2)." is:\n";
			
			if($d==0){
				if($h>0){
					$timeago=$h." hrs";
				}else if($m>0){
					$timeago=$m." min";
				}else{
					$timeago=$s." sec";
				}
				$timeago.=", ago";	
			}
			
			
			if($d>0){
				$timeago=date("F jS, Y", strtotime($time));
			}
			
			return $timeago;
	
	}
}