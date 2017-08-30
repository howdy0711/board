<?php
require_once("./dbconfig.php");

$num = $_GET['b_no'];
$b_title;
$b_content;

$sql = 'UPDATE board_free SET b_hit = b_hit+1 WHERE b_no ='.$num;
$rs = $db->query($sql);

	$sql = 'select b_title, b_content , b_password from board_free where b_no = ' . $num;
  $rs = $db->query($sql);
$row = $rs->fetch_assoc();
$b_password = $row['b_password'];
$b_title = $row['b_title'];
$b_content = $row['b_content'];



 ?>

<form action="CommentAddAction.php?b_no=<?php echo $num?>" method="post" name = "comment">
<div align=center>
<table cellpadding="0" cellspacing="0">

   <tr>
      <td style="font-family:돋음; font-size:14" height="22">
         <div align="center">제 목&nbsp;&nbsp;</div>
      </td>

      <td style="font-family:돋음; font-size:12">
        <?php echo $b_title ?>
      </td>
   </tr>

   <tr bgcolor="000000">
      <td colspan="2" style="height:3px;">
      </td>
   </tr>

   <tr>
      <td style="font-family:돋음; font-size:14">
         <div align="center">내 용</div>
      </td>
      <td style="font-family:돋음; font-size:14">
         <table border=0 width=350 height=220 style="table-layout:fixed">
            <tr>
               <td valign=top style="font-family:돋음; font-size:12">
                 <?php echo $b_content ?>
               </td>
            </tr>
         </table>
      </td>


   <tr bgcolor="000000">
      <td colspan="2" style="height:2px;"></td>
   </tr>

	 <?php
	 $sql = "select * from comment where c_seq=$num.order by c_no";
	 $result = $db->query($sql);
	 while($row = $result->fetch_assoc()){

	 	    $datetime = explode(' ', $row['c_date']);
	 	    $date = $datetime[0];
	 	    $time = $datetime[1];
	 	    if($date == Date('Y-m-d'))
	 	      $row['c_date'] = $time;
	 	    else
	 	      $row['c_date'] = $date;

	 	$c_id = $row['c_id'];
	 	$c_context= $row['c_context'];
	 	$c_seq = $row['c_seq'];
	 	$c_date = $row['c_date'];

	echo "<tr>
	<td colspan= \"2\" td style=\"font-family:돋음 font-size:12\">
 	 <br> <font face=\"돋음\"size=\"1\">$c_id $c_date </font><br>
	 <font face=\"돋음\"size=\"2\" >$c_context</font>
 </td>
 </tr>
";
	 }
	 ?>

<table>
<tr align="left" valign ="middle">

		<td colspan="3" >
		<input name="c_id" type="text" size="10" maxlength="100"
	 id="c_id" placeholder="작성자"
	 </td>

	<td colspan="2" >
	<input name="c_context" type="text" size="32" maxlength="100"
	placeholder="댓글내용입력" id="c_context"/></td>
	 <td style="font-family:돋음; font-size:12">
		 <a href="javascript:commentAdd()">
		 <div align="center">댓글등록</div>
			 </a>
	 </td>

 </tr>
</table>
<tr><td colspan="2">&nbsp;</td></tr>
   <tr align="center" valign="middle">
      <td colspan="5">
         <font size=2>
         <a href="./ReplyView.php?b_no=<?php echo $num?>">
         [답변]
         </a>&nbsp;&nbsp;
         <a href="javascript:revisionboard()">
         [수정]
         </a>&nbsp;&nbsp;
         <a href="javascript:deleteboard()">
         [삭제]
         </a>&nbsp;&nbsp;
         <a href="./boardlist.php?num=0">[목록]</a>&nbsp;&nbsp;
         </font>
      </td>
   </tr>
</table>
</form>

<script type="text/javascript">

function commentAdd(){
 var form = document.comment;
 form.submit();

}

function deleteboard()
{
	var form = document.comment
  var password = "<?php echo($b_password);?>";
  var data = prompt("비밀번호를 입력하세요","");
	if(data == password)
	location.href="./boardDeleteAction.php?b_no=<?php echo $num?>";
	else {
		var data = prompt("비밀번호가 올바르지 않습니다 비밀번호를 다시 입력하세요","");
		document.location.href="./boardView.php?b_no=<?php echo $num?>";
	}
}

function revisionboard()
{
  var password = "<?php echo($b_password);?>";
  var data = prompt("비밀번호를 입력하세요","");
	if(data == password)
	location.href="./boardRevisionView.php?b_no=<?php echo $num?>";
else {
	var data = prompt("비밀번호가 올바르지 않습니다 비밀번호를 다시 입력하세요","");
	document.location.href="./boardView.php?b_no=<?php echo $num?>";
}
    }
</script>
