<?php
// $i = 1;
// $count = 0;
// while ($i<=100) {
// 		if ($i % 3 != 0)
// 		{
// 			echo "$i ";
// 			$count++;
// 		}      
// 		$i++;
// }

$arr = range(1, 100);

foreach($arr as $val) {
	if(($val %  3) === 0) {
		continue;
	}
	echo $val."입니다.\n";
}