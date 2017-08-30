<?php
require_once("./dbconfig.php");

$num =  $_GET['b_no'];
$c_id = $_POST['c_id'];
$c_context = $_POST['c_context'];

$sql="insert into comment (c_seq,c_id,c_context)
values('.$num.','".$c_id."','".$c_context."')";
$result = $db->query($sql);

echo "<script> document.location.href='./boardView.php?b_no=$num';</script>";
 ?>
