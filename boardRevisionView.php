<?php
require_once("./dbconfig.php");

$num = $_GET['b_no'];
 ?>

 <div align=center>
 <form action="boardRevisionAction.php?b_no=<?php echo $num?>" method="post"
    enctype="multipart/form-data" name="boardform">
 <table  cellpadding="0" cellspacing="0" rules = none>
    <tr align="center" >
       <td colspan="5">게시판</td>
    </tr>
    <tr>
      <td colspan="5"> &nbsp &nbsp </td>
    </tr>
    <tr>
      <td colspan="5"> &nbsp &nbsp </td>
    </tr>

    <tr>
       <td style="font-family:돋음; font-size:13" height="16">
          <div align="center">제 목</div>
       </td>
       <td>
          <input name="board_title" type="text" size="25" maxlength="100"
             value="" />
       </td>
    </tr>
    <tr>
       <td style="font-family:돋음; font-size:13">
          <div align="center">내 용</div>
       </td>
       <td>
          <textarea name="board_content" cols="100" rows="150"id="b_content"></textarea>
       </td>
    </tr>
    <tr bgcolor="cccccc">
       <td colspan="2" style="height:1px;">
       </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr align="center" valign="middle">
       <td colspan="5">
          <a href="javascript:revision()">[등록]</a>&nbsp;&nbsp;

          <a href="javascript:history.go(-1)">[뒤로]</a>
       </td>
    </tr>
 </table>
 </form>

 <script language="javascript">
    function revision()
    {
       var form = document.boardform;

       if( !form.b_title.value )
       {
          alert( "제목을 적어주세요" );
          form.b_title.focus();
          return;
       }

       if( !form.b_content.value )
         {
          alert( "내용을 적어주세요" );
          form.b_content.focus();
          return;
        }
				location.href="./boardRevisionAction.php?b_no=<?php echo $num?>";
       boardform.submit();
       }

    </script>
