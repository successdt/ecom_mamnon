<?php
//if(isset($_POST['action'])){
//	call_user_func($_POST['action']);
//} else {
//	echo json_encode(array('status' => 0));
//}
function bookTicket(){
        $to = 'success.ddt@gmail.com';
        $subject = 'test cái';
        $message = 'test';
        
        try
        {
                $result = wp_mail($to,$subject,$message);
        }
        catch(phpmailerException $e)
        {
                $failed = 1;
                $exceptionmsg = $e->errorMessage();
                echo $exceptionmsg;
        }
	sleep(1);
}
add_action( 'wp_ajax_nopriv_bookTicket', 'bookTicket' );

