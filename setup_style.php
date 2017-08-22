<?php

include("connect.php");

$link=Connection();

$styleNumber = isset($_POST['styleNumber']) ? $_POST['styleNumber'] : null;

$A_x = isset($_POST['A_x']) ? $_POST['A_x'] : null;
$A_y = isset($_POST['A_y']) ? $_POST['A_y'] : null;

$styleName =  basename($_FILES["myFileSelect"]["name"]);




echo $styleName;


?>