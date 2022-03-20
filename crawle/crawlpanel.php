<!DOCTYPE html>
<html>
<head>
	<title>Crawl Panel</title>
</head>
<body>
	<center><h1>Crawl panel</h1></center>
	<form action="crawlpanel.php" method="get">
	<input type="submit" class="btn btn-secondary" name="search_btn" value="Main Crawler" id="btnstyle2">
	<input type="submit" class="btn btn-secondary" name="search_btn" value="Image verifying crawler" id="btnstyle2">
</form>
	<?php
    if( isset( $_GET[ 'search_btn' ]  ) ) {
	$cmd = shell_exec( 'php crawle2.php');
    }
    if( isset( $_GET[ 'search_btn2' ]  ) ) {
	$cmd = shell_exec( 'php crawleimg.php');
    }
	?>
</body>
</html>