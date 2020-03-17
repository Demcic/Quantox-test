<?php 
//imao sam za ideju da uporedim da li je koriscenje switch/case naredbe brze od if naredbi
//rezultati na mom lokalnom hostu kazu da je switch/case malo brze od if naredbi

$time_start = microtime_float();
for ($i=1; $i <= 100; $i++) { 
	if ($i%3 == 0) {
		echo $i . ": drink";
	}
	if ($i%5 == 0) {
		echo $i . ": coffie";
	}
	echo "<br/>";
}
$time_end = microtime_float();
echo $time_end - $time_start . "<br/>";


$time_start = microtime_float();
for ($i=1; $i <= 100; $i++) { 
	switch (true) {
		case ($i%3 == 0):
			echo $i . ": drink";
			break;
		
		case ($i%5 == 0):
			echo $i . ": coffie";
			break;

		default:
			break;
	}
	echo "<br/>";
}
$time_end = microtime_float();
echo $time_end - $time_start;

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>