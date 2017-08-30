<?php
require_once("./dbconfig.php");

$num = $_GET['b_no'];
$sql = 'select b_re_ref from board_free where b_no='.$num;
$rs = $db->query($sql);
$row = $rs->fetch_row();
$b_re_ref = $row[0];


$sql = 'delete from board_free where b_no = ' . $num; //원글삭제
$rs = $db->query($sql);
$sql = 'delete from comment where c_seq = '.$num; // 한줄덧글 삭제
$rs = $db->query($sql);

echo $b_re_ref;
echo $num;
$sql ='delete from board_free where b_re_ref= '.$b_re_ref;
$rs = $db->query($sql);


if($rs)
  $msg = "글이 삭제 되었습니다";
else
  $msg = "글이 삭제 되지 않았습니다 관리자에게 문의하세요";
?>
<script>
		alert("<?php echo $msg?>");
	   location.replace("./boardlist.php?num=0");
	</script>
