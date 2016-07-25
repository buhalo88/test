<?php
include "/get_data.php";
include "/sql.php";
include "/txt.php";
include "/logger.php";

////////
$class = new logger('data');
$class2 = new logger('data1');


$class->write_sql();
$class2->write_sql();


$class->write_txt();
$class2->write_txt();

$class->write_stdout();
$class2->write_stdout();

 

?>