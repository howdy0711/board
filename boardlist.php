<html>
<head>
  <title>My Board</title>
</head>
<table>

</table>
</html>
<form action ="boardView.php" method="get">

<?php
require_once("./dbconfig.php");
$count = 3;
$index = 0;



echo "<table width = \"100%\" border=\"0.5\" align = \"center\" cellpadding
=\"5\"rules =\"cols,rows\" frame = \"hsides\">";
echo"<thead>My Board</thead>";

echo "<tbody> <tr>
  <td width= \"10%\" align = \"center\">번호</td>
  <td width= \"40%\" align = \"center\">제목</td>
  <td width= \"20%\" align = \"center\">작성자</td>
  <td width= \"10%\" align = \"center\">조회수</td>
  <td width= \"20%\" align = \"center\">날짜</td>
</tr>
</tbody>"
;


$page = $_GET['num'];
if($page == null)
$page = 0;

$pagesize = 10;

$sql = "select * from board_free order by b_re_ref desc, b_re_seq asc limit ".$page."," .$pagesize;
$result = $db->query($sql);

	while($row = $result->fetch_assoc()){
    $b_re_lev = $row['b_re_lev'];


    $datetime = explode(' ', $row['b_date']);
    $date = $datetime[0];
    $time = $datetime[1];
    if($date == Date('Y-m-d'))
      $row['b_date'] = $time;
    else
      $row['b_date'] = $date;

$b_no = $row['b_no'];
$b_title = $row['b_title'];
$b_id = $row['b_id'];
$b_hit = $row['b_hit'];
$b_date = $row['b_date'];

if($b_re_lev !=0){
  $b_title = "▶".$b_title;
for($i=0;$i<=$b_re_lev*2;$i++){
  $b_title = '&nbsp'.$b_title;
  }
}

  echo"<tr>
   <td align = \"center\">$b_no</td>
   <td><a href=\"./boardView.php?b_no=$b_no\">$b_title</td>
   <td align = \"center\">$b_id</td>
   <td align = \"center\">$b_hit</td>
   <td align = \"center\">$b_date</td>
   </tr>";
}


?>



<tr align =center>
<td colspan=5 style=font-family:Tahoma;font-size:12pt;>
<a href= ./boardlist.php?num=0>1</a>
<a href= ./boardlist.php?num=10>2</a>
<a href= ./boardlist.php?num=20>3</a>
<a href= ./boardlist.php?num=30>4</a>
<a href= ./boardlist.php?num=40>5</a></td>

</tr>
   <tr align=right>
      <td colspan=5>
            <a href=./boardwrite.php>[글쓰기]</a>
      </td>
   </tr>
</table>
</form>
