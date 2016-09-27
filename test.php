<?php 
function foo_1()
 {
	$array = array(1, "z", "3");
	print_r($array);
}
 foo_1();


function foo_3()
 {
	$array = array(1, "z", 500);
	print_r($array[2]);
	print_r($array[1]);
	print_r($array[0]);
}
 foo_3();
 
 echo "\n";

 function foo_4()
 {
	$array = array(1, 1, 1, 2, 2, 2, 3, 3, 3);
	foreach ($array as $value) {
	echo $value;
	}
}
 foo_4();
 
 echo "\n";