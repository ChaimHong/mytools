<?php

$inittotal = 100000;
$total = $inittotal;
$perout = 4482.93;
$per = $total / 24;
$interest = $perout - $per;
$yearrate = 0.040;
$rate = $yearrate/12;
$totalout = $interest*24;
echo ( $rate . " " . $per . " ". $interest. "\n");
$earn = 0;
for($i=0;$i<24;$i++)
{
	$earn += $total * $rate;
	echo ( $i.":".$earn . " " . $total . "\n");
	$total -= $per;
}
var_dump ($earn, intval($inittotal*$yearrate*2), $totalout);
