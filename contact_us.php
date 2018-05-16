<!DOCTYPE html>
<html lang="ja">
  <?php include "template/header.php"; ?><!-- header -->
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0">

<div id="container">  
  
  <div id="header">
  </div><!-- #header -->
  
  <div id="main">
  <?php include "template/menu.php"; ?><!-- menu -->
  <div id="content">
    <h1>お問い合わせ</h1>

    <form action="send_mail.php" method="post" style="margin: 30px 0 0 0;font-size: 20px;">
      <label for="name_id">名前<span style="color: red; margin-left: 0.5em;">*</span></label><br>
      <input type="text" name="name" id="name_id" placeholder="名前を入力してください" required><br>
      <label for="email_id">メールアドレス<span style="color: red; margin-left: 0.5em;">*</span></label><br>
      <input type="email" name="email" id="email_id" size="40" placeholder="メールアドレスを入力してください" required><br>
      <label for="message_id">お問い合わせ内容<span style="color: red; margin-left: 0.5em;">*</span></label><br>
      <textarea rows="10" cols="60" ="60" name="message" required></textarea><br>
      <button type="submit" value="SEND MESSAGE" style="width: 80px;height: 40px; font-size: 20px;">送信</button>
    </form>


    <p id="topgo"><a href="#container">このページの先頭へ</a></p>
  </div><!-- #content -->
    <?php include "template/sidebar.php"; ?><!-- sidebar -->
  </div><!-- #main -->
</div><!-- #container -->
<?php include "template/footer.php"; ?><!-- footer -->
</body>
</html>
