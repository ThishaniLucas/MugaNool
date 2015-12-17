<?php 
$text = "rose is a rose is rose is a rose is rose";
$arrr = explode("rose",$text);

foreach($arrr as $times){
	echo $times.'<br />';
	}
?>