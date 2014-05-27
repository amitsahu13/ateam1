<?php
$name='';
$email='';
if($this->Session->check('Auth.User.id'))
{
	$name = $this->Session->read('Auth.User.first_name')." ".$this->Session->read('Auth.User.last_name');
	$email = $this->Session->read('Auth.User.email');
}
?>
<script>
feedback_name = '<?php echo $name;?>';
feedback_email = '<?php echo $email;?>';
</script>
<div class="clear"></div>


<div id="footer_wrp" style="margin-top: 35px;">
<footer style="height:0%;padding-top: 10px;margin: 0px auto; ">
                    <div class="our row-fluid">
                        <div class="span4" style="padding-left: 97px; margin-top: 5px;"><img src="img/ftr_logo.png"></div>  
                        <div class="span4" style="margin-left: 202px; width: 289px" >
                            <a href="https://www.facebook.com/ATeam4ADream" target="_blank" style="text-decoration:none;"  >
                                <img src="img/FB.jpg" title="Share to Facebook" alt="Share to Facebook">
                            </a>

                            <a href="https://twitter.com/ATeam4ADream" target="_blank"><img src="img/twitter.jpg" alt="twitter"></a>
                            <a href="https://plus.google.com/+Ateam4adream/about" target="_blank"><img src="img/g+.jpg" title="Share on Google+" alt="Share on Google+" class="mygoogle"></a>
                            <!-- Place this tag where you want the share button to render. -->
                        </div>  	
                        <div class="span4" style="font-size:13px; color:#fff; font-weight:lighter; width: 341px;margin-left: 0px;">
                            &nbsp;&nbsp; © 2014 A Team 4 A Dream, Inc. &nbsp;&nbsp;&nbsp; U.S. Patent Pending
                        </div>    
                    </div>

            </footer>
	
</div>
<!--Feedback form start from here -->
<script>
$(function(){$('#contactable').contactable({userid:'user_id'})});
$(document).ready(function(){
    $(".contactform").click(function(){
          $("#contactable_inner").click(); //opens contact form
       
    });
});
</script>
<div id="contactable"><!-- contactable html placeholder --></div>
<!--Feedback form end from here -->
            
 

<div class="share_lnk">
	<ul style="padding-top: 15px;">
    	<!--<li><a href="#" class="hrt"></a></li>-->
        <li><a href="#" class="fb"></a></li>
        <li><a href="#" class="twtr"></a></li>
        <li><a href="#" class="rss"></a></li>
    </ul>
</div>

