<?php
require_once('Widget.php');
class Message extends Widget
{
    function run($visible = FALSE) {
        
	//test : module name ,, test_view: widget view php file
        if($visible) {
        	$this->render('message','message_view');
        }
        
    }
} 

?>