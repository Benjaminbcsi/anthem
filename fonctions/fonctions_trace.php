
<?php
function Trace($event)
{	
	$date = date("d-M-Y");
    $time = date("D,d-M-Y H:i:s");
    $time = "[".$time."] ";
    $debug = debug_backtrace();
    $line = $debug[0]["line"];
 	$file= $debug[0]["file"];
 	$event = $time."En ligne : ".$line." From : ".$file." ".$event."\n";
    file_put_contents(__DIR__."/../logs/".$date."-fichier.log",$event, FILE_APPEND);
}
?>