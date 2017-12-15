<?php
  if (!isset($_GET['page'])) {
      include("./includes/pageIndex.php");
  } else{
      include("./includes/".$_GET['page'].".php");
  }
?>
