<?php
//format should be mm-dd-yyyy
function dateFormat($date,$dateFormat='Y-m-d') 
{	
    if($date){
        return date($dateFormat,strtotime($date));
    }
	
}

