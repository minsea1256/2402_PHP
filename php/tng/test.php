<?php

// for($i = 0; $i <= 100; $i++) {
//     for($j=0; $j<=100; $j+=3) {
//         continue;
//     }
//     echo $i."\n";
// }


// $count = 0;
// for($i = 1; $i <= 100; $i++) {
//     if ($i % 3)
// 		{
// 			echo "$i ";
// 			$count++;
// 		}
// 		$i++;
// }

$i = 1;
$count = 0;
while ($i<=100) {
		if ($i % 3 != 0)
		{
			echo "$i ";
			$count++;
		}      
		$i++;
}
