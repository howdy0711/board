<?php
require_once("./dbconfig.php");


$b_id = $_POST['b_id'];
$b_password = $_POST['b_password'];
$b_title = $_POST['b_title'];
$b_content = $_POST['b_content'];
$date = date('Y-m-d H:i:s');


$sql = "select max(b_re_ref) from board_free";
$result = $db->query($sql);
$row=$result->fetch_row();
$b_re_ref= $row[0];
$b_re_ref= $b_re_ref +1;


$sql = 'insert into board_free
(b_no, b_title, b_content, b_date, b_hit, b_id, b_password, b_re_ref)
values(null, "' . $b_title . '", "' . $b_content . '", "' . $date . '", 0, "' . $b_id . '", "' . $b_password . '","'.$b_re_ref.'")';

$result = $db->query($sql);
if($result){
  $msg = "글이 등록 되었습니다. ";
}
else{
  $msg = "글이 등록 되지 않았습니다";
}
 ?>

<script>
alert("<?php echo $msg?>");
location.replace("./boardlist.php?num=0");
</script>
