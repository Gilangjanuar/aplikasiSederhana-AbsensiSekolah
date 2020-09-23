<?php
$host = "localhost" ;
$user = "root" ;
$pass = "" ;
$name = "ta" ;

$link = mysqli_connect($host,$user,$pass,$name) ;


if(!$link){
	echo "Database tidak terhubung" ;
}

?>
