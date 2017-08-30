<?php
require_once("./dbconfig.php");

$num = $_GET['b_no'];
echo $num;
$b_title = $_POST['b_title'];
$b_content = $_POST['b_content'];
$date = date('Y-m-d H:i:s');

$sql = "UPDATE board_free SET b_title = '".$b_title."', b_content ='".$b_content."'
         WHERE b_no=" .$num;

$result = $db->query($sql);
if($result){
  $msg = "글이 수정 되었습니다. ";
}
else{
  $msg = "글을 수정 되지 않았습니다";
}
 ?>

<script>
alert("<?php echo $msg?>");
location.replace("./boardlist.php?num=0");
</script>
