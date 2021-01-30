<?php
define ("SERVER","127.0.0.1");
define ("USER","root");
define("DATABASE","coursefull");
define ("PASSWORD","");

$Link = mysqli_connect(SERVER, USER, PASSWORD, DATABASE)
			or die(mysqli_connect_error() );


 ?>
