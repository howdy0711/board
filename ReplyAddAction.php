<?php
require_once("./dbconfig.php");

$b_id = $_POST['b_id'];
$b_password = $_POST['b_password'];
$b_title = $_POST['b_title'];
$b_content = $_POST['b_content'];
$date = date('Y-m-d H:i:s');
$num = $_GET['b_no']; // 현재 접속한 글번호
echo $num;
$b_noMAx = 0; // 보드 넘버 최댓값 담는 변수
$sql = "select max(b_no) from board_free";
$result = $db->query($sql);
//////////////////////////////////////////////


$row=$result->fetch_row();
$b_noMax = $row[0];
$sql = "select b_re_ref, b_re_lev , b_re_seq from board_free where b_no =".$num;
$result = $db->query($sql);

$row=$result->fetch_row();

$b_re_ref = $row[0];
$b_re_lev = $row[1];
$b_re_seq = $row[2];


$sql ="UPDATE board_free SET b_re_seq = b_re_seq +1 WHERE b_re_ref =.$b_re_ref.,
and b_re_seq >" .$b_re_seq;
$resut = $db->query($sql);

$b_re_seq = $b_re_seq +1;
$b_re_lev = $b_re_lev +1;




$sql = 'insert into board_free
(b_no, b_title, b_content, b_date, b_hit, b_id, b_password,b_re_ref,b_re_lev,b_re_seq)
values(null, "' . $b_title . '", "' . $b_content . '", "' . $date . '", 0, "' . $b_id . '", "' . $b_password . '"
,'.$b_re_ref.','.$b_re_lev.','.$b_re_lev.')';

$result = $db->query($sql);
if($result){
  $msg = "답글이 등록 되었습니다. ";
}
else{
  $msg = "답글이 등록 되지 않았습니다";
}
 ?>

<script>
alert("<?php echo $msg?>");
location.replace("./boardlist.php?num=0");
</script>
