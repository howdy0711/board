<div align=center>
<form action="boardAddAcction.php" method="post"
   enctype="multipart/form-data" name="boardform">
   <meta charset="utf-8">

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
         <div align="center">글쓴이</div>
      </td>
      <td>
         <input name="b_id" type="text" size="10" maxlength="10"
            value="" id="b_id"/>
      </td>
   </tr>
   <tr>
      <td style="font-family:돋음; font-size:13" height="16">
         <div align="center">비밀번호</div>
      </td>
      <td>
         <input name="b_password" type="password" size="10" maxlength="10"
            value="" id="b_password"/>
      </td>
   </tr>
   <tr>
      <td style="font-family:돋음; font-size:13" height="16">
         <div align="center">제 목</div>
      </td>
      <td>
         <input name="b_title" type="text" size="25" maxlength="100"
            value="" id="b_title"/>
      </td>
   </tr>
   <tr>
      <td style="font-family:돋음; font-size:13">
         <div align="center">내 용</div>
      </td>
      <td>
         <textarea name="b_content" cols="30" rows="15"id="b_content"></textarea>
      </td>
   </tr>
   <tr bgcolor="cccccc">
      <td colspan="2" style="height:1px;">
      </td>
   </tr>
   <tr><td colspan="2">&nbsp;</td></tr>
   <tr align="center" valign="middle">
      <td colspan="5">
         <a href="javascript:addboard()">[등록]</a>&nbsp;&nbsp;

         <a href="javascript:history.go(-1)">[뒤로]</a>
      </td>
   </tr>
</table>
</form>


<script language="javascript">
   function addboard()
   {
      var form = document.boardform;

      if( !form.b_id.value )
      {
         alert( "이름을 적어주세요" );
         form.b_id.focus();
         return;
      }

      if( !form.b_password.value )
       {
         alert( "비밀번호를 적어주세요" );
         form.b_password.focus();
         return;
      }

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
      boardform.submit();
      }

   </script>
