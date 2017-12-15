<?php
echo '<H2><a href="../../index.php">--VOLVER--</a></H2>';
	 include("./includes/top_page.php");
	?>
  <div id="main">
    <div id="header">
    	<? include("./includes/header.php"); ?>
    </div>
    <div id="site_content">
            <div id="content">
       		<? include("./includes/controler.php") ?>
      </div>
    </div>
    <div id="footer">
      <? include("./includes/footer.php"); ?>
    </div>
  </div>
<? include("./includes/bottom.php"); ?>
