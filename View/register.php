<?php ob_start();
require_once('facebook.php');
require_once('db_config.php');
//error_reporting(0);
  $config = array(
    'appId' => '780779305267208',
    'secret' => 'aeeaa4da37e0daf4331a16e7f3e6772c',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration | ATeam4ADream</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="spirito.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="jquery.selectbox.css" />
	<link rel="stylesheet" type="text/css" href="jquery.selectbox.css" />
        <script type="text/javascript" src="jquery-1.6.2.min.js"></script>  
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>              
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <style>
            .reg_table{

                margin: auto;
                width: 58%;

            }

            .reg_table tr{
                margin-top:20px;
            }

            .reg_table td{
                margin-left:10px;
            }

        </style>
        <script type="text/javascript">
		jQuery(document).ready(function($){		
			$(".custom_dropdown").selectbox();
		});
        </script>
        <script>
			function setCookie(cname,cvalue,exdays)
			{
				var d = new Date();
				d.setTime(d.getTime()+(exdays*24*60*60*1000));
				var expires = "expires="+d.toGMTString();
				document.cookie = cname+"="+cvalue+"; "+expires;
			}
			
			function getCookie(cname)
			{
				var name = cname + "=";
				var ca = document.cookie.split(';');
				for(var i=0; i<ca.length; i++) 
				  {
				  var c = ca[i].trim();
				  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
				  }
				return "";
			}
			
			</script>
    </head>
    <body data-color="turquoise">
            <nav>
                <div class="row-fluid">
                   <div class="span4"></div>
                    <div class="span4">	
                        <div class="logo">
                            <img src="img/logo.png">
                        </div>
                    </div>
                     <div class="span4"></div>
               
            </nav>
             <div id="wrapper">
            <div id="container">		
                <div id = "login_box" >	
                    <div class="left_sidebar">
                        <h2><a href="#" style="text-decoration:none;">&nbsp;</a></h2>
                        <div class="aside_left" style="margin-top:-23%;margin-left: -2%;">
                            <p>
                                Welcome,<br/>
                                You are seconds from joining a <br/>vibrant community of people<br/>with creative minds,skills and <br/>enthusiasm who wish to <br/>collaborate online,realize<br/>dreams and share sucess<br/>Good luck in your journeys <br/>(you can shout wee hee <br/>right now...)
                            </p>
                            <p style="color: #F60D53; text-align:right;">AT4AD Team</p>
                        </div>    
                    </div>
                    <div class="right_sidebar">
                        <div class="product_dscrpBOX" style="width:100%;height:560px;">
                            <h3>Create a Free Account</h3>
                            <div class="compensation_frmDV">		
                                <form action="users_db_data.php" name="frm" id="UserRegisterForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/><input type="hidden" name="data[_Token][key]" value="614e6f8d9e938a4c864605c50fd927b06ca44f84" id="Token1067702619"/></div>          
                                    <ul class="RegFrmFild">
                                        <li>
                                            <label style="padding-top:4px;">Register As</label>
                                            <div class="compensation_frmrow_R register-page" style="padding: 6px 0 0;">
                                                <input type="radio" name="registeras" id="UserRoleId3" class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="Leader" required=""  /><span style="color:#333">Leader</span>
                                                <input type="radio" name="registeras" id="UserRoleId4" class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="Expert" required=""  /><span style="color:#333">Expert</span>
                                                <input type="radio" name="registeras" id="UserRoleId5" class="chckBX chkbx user_type" style="margin:0 6px 0 16px" value="Both" required=""  /><span style="color:#333">Both</span>				
                                            </div>
                                        </li>
                                        <li>    
                                        <?php	$file_c = 'countrylist.json';
						// Open the file to get existing content
						$country = json_decode(file_get_contents($file_c));
	
					//echo "<pre>"; print_r($current);
	
					?>
			                    <label>Country*</label>				
			                    <span class="slct_rwndInPut">
			                        <select name="country" class="slct_rwndInPutRi with_sml1 custom_dropdown" id="UserDetailRegionId">
			                        	<option selcted="">Select Country</option>
							<?php foreach($country as $key=>$value){ ?> 
								<option value="<?php echo $value; ?>"> 
							<?php echo $value; ?> </option> <?php } ?>  
			                        </select>               
			                    </span>
               				 </li>
                                        <li>
                                            <label>&nbsp;&nbsp;</label>
                                            <div class="socialnet">
                                                <h4>Using social networks sign up</h4>
                                                <div class="socialnetIcon">
                                                    <p>
                                                        <?php
                                                        if ($user_id) {
                                                            try {

                                                                $user_profile = $facebook->api('/me', 'GET');
                                                                $fname = $user_profile['first_name'];
                                                                $lname = $user_profile['last_name'];
                                                                $uname = $user_profile['username'];
                                                                $country = $user_profile['work'][0]['location']['name'];
                                                                $email = $user_profile['email']; 
                                                                $data = $_COOKIE['data'];
                                                                $data = explode("=",$data);
                                                                $registeredas = $data[0];
                                                                $country = $data[1];
                                                                //$data = $registeras."," . $first_name . "," . $last_name . "," . $user_name . "," . $email . "," . $country . ",".date('Y-m-d').",". date('H:i:s'). "\n";
                                                               	setcookie("data", "", time()-3600);
                                                                /*$file = fopen("user_data.txt", "a");
                                                                fwrite($file, $data);*/
                                                                 $query = "insert into Users(registered_as,country,first_name,last_name,user_name,email) 
    									values('{$registeredas}','{$country}','{$fname}','{$lname}','{$uname}','{$email}')";
   								 mysqli_query($con,$query);
                                                                header('Location:confirmation.html');
                                                            } catch (FacebookApiException $e) {

								$params = array(
							            'scope' => 'email',
							        );
                                                                $login_url = $facebook->getLoginUrl($params);
                                                                echo '<a href="' . $login_url . '" ><img src="assets/img/facebook.jpg" border="0" style="padding-left:20px;"  />';
                                                                error_log($e->getType());
                                                                error_log($e->getMessage());
                                                            }
                                                        } else {
                                                        $params = array(
							            'scope' => 'email',
							        );
                                                            $login_url = $facebook->getLoginUrl($params);
                                                            echo '<a id="fb_link" style="text-decoration: none;" href="'.$login_url.'"`><img src="img/facebook.jpg" border="0" style="padding-left:20px;"  /> </a>';
                                                        }
                                                        ?>
                                                        <span>Or</span><a href="javascript:void(0);" style="text-decoration: none;" class="linkdin_login">
                                                            <a id="ln_link" href="login_with_linkedin.php"><img src="img/in.jpg" alt="linkedin" /></a>			
                                                        </a></p>
                                                </div>
                                                <div class="OrBotm"><span>Or Using Email Registration</span></div>
                                            </div>

                                        </li>
                                        <li>
                                            <label>First Name*</label>
                                            <input name="fname" required="" class="TxtFildReg" maxlength="255" type="text" id="UserFirstName"/> 
                                        </li>
                                        <li>
                                            <label>Last Name*</label>
                                            <input name="lname" required="" class="TxtFildReg" maxlength="255" type="text" id="UserLastName"/> 
                                        </li>
                                        <li>
                                            <label>User Name*</label>
                                            <input name="uname" required="" class="TxtFildReg" maxlength="255" type="text" id="UserUsername"/> 
                                        </li>
                                        <li>
                                            <label>Email*</label>
                                            <input name="email" required="" class="TxtFildReg" maxlength="255" type="email" id="UserEmail"/> 
                                        </li>
                                        <li>
                                        <label>&nbsp;</label>
                                        <span class="search_btn_blu btn_marin_0">
                                            <input type="submit" class="search_btn_blu_ri" value="Submit" name="submit"/>
                                        </span>

                                        </li>
                                    </ul>
                                    <div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="7feb47b5322b84e20668bfca5b0bd8c036086d5e%3A" id="TokenFields464896733"/><input type="hidden" name="data[_Token][unlocked]" value="" id="TokenUnlocked87308784"/></div></form>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Clear"></div>
            <!--Main Wraper End here-->
        </div>
        <footer style="height:0%">
                    <div class="our row-fluid" style="height:40px;">
                        <div class="span4"><img src="img/ftr_logo.png"></div>  
                        <div class="span4">
                            <a href="#" style="text-decoration:none;" onclick="
                                    window.open(
                                            'https://www.facebook.com/sharer/sharer.php?u=http://www.ATeam4ADream.com',
                                            'facebook-share-dialog',
                                            'width=626,height=436');
                                    return false;">
                                <img src="img/FB.jpg" title="Share to Facebook" alt="Share to Facebook">
                            </a>

                            <a href="https://twitter.com/share?url=http://www.ateam4adream.com" target="_blank"><img src="img/twitter.jpg" alt="twitter"></a>
                            <a href="https://plus.google.com/share?url=http://www.ateam4adream.com" target="_blank"><img src="img/g+.jpg" title="Share on Google+" alt="Share on Google+" class="mygoogle"></a>
                            <!-- Place this tag where you want the share button to render. -->
                        </div>  	
                        <div class="span4" style="font-size:13px; color:#fff; font-weight:lighter;">
                            &nbsp;&nbsp; © 2014 A Team 4 A Dream, Inc. &nbsp;&nbsp;&nbsp; U.S. Patent Pending
                        </div>    
                    </div>

            </footer>
		<script type="text/javascript" src="jquery.selectbox-0.2.js">				
		</script>				
			<script>
				$("#fb_link").live("click",function(e){
					if($('input[name=registeras]:checked').length<=0)
					{
					 	alert("Please select Registered As option");
					 	e.preventDefault();
					}
					else if($("#UserDetailRegionId option:selected").text() == "Select Country")
					{
						alert("Please select country");
						e.preventDefault();
					}
					else
					{
						var register = $("input:checked").next().text();
						var country = $("#UserDetailRegionId option:selected").text();
						var cnt = (country.trim());
						var val = register+"="+cnt;
						document.cookie = "data=" + val;
					}
				});
				$("#ln_link").live("click",function(e){
					if($('input[name=registeras]:checked').length<=0)
					{
					 	alert("Please select Registered As option");
					 	e.preventDefault();
					}
					else if($("#UserDetailRegionId option:selected").text() == "Select Country")
					{
						alert("Please select country");
						e.preventDefault();
					}
					else
					{
						var register = $("input:checked").next().text();
						var country = $("#UserDetailRegionId option:selected").text();
						var cnt = (country.trim());
						var val = register+"="+cnt;
						document.cookie = "data=" + val;
					}
				});
			</script>
    </body>
</html>