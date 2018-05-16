<?php
function dir_search($dir, $handle, $i){
  while(($file[] = readdir($handle)) !== false);
    rsort($file);
    foreach ($file as $file_name) {
      if(filetype($path = $dir . $file_name) == "file" || "dir" and $file_name != ".." and $file_name != "." and $file_name != ""){
        echo "<li>";
        echo "<tr>";
        echo "<td style=\"padding: 0px 20px\"><span style=\"margin-left:${i}em\"><a href=\"download.php?key=${path}\"a>" . $file_name . "</a></td>";
        $size = filesize("./archive/" . $file_name);
        if($size < 1000){
          echo "<td style=\"padding: 0px 20px\" align=\"right\">" . $size . "B</td>";
        }
        elseif($size < 1000000){
          echo "<td style=\"padding: 0px 20px\" align=\"right\">" . round($size/1000, 1) . "KB</td>";
        }
        elseif($size < 1000000000){
          echo "<td style=\"padding: 0px 20px\" align=\"right\">" . round($size/1000000, 1) . "MB</td>";
        }
        echo "</tr>";
        echo "</li>";
        if(filetype($path) == "dir"){
          $i += 1;
          $i = dir_search($path . "/", opendir($path . "/"), $i);
        }
      }
    }
  $i -= 1;
  return($i);
}
?>
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
    <h1>過去の記事</h1>

    <?php
      $dir = "./archive/";
      if(is_dir($dir) && $handle = opendir($dir)){
        echo "<ul>";
        $i = 0;
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th style=\"padding: 0px 20px\">ファイル名</th>";
        echo "<th style=\"padding: 0px 20px\">ファイルサイズ</th>";
        echo "</tr>";
        dir_search($dir, $handle, $i);
        echo "</table>";
        echo "</ul>";
      }
    ?>
    <p id="topgo"><a href="#container">このページの先頭へ</a></p>
  </div><!-- #content -->
  <?php include "template/sidebar.php"; ?><!-- sidebar -->
  </div><!-- #main -->
</div><!-- #container -->
<?php include "template/footer.php"; ?><!-- footer -->
</body>
</html>
