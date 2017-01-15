<?php// include_once('main.php'); ?>
<?php include dirname(__FILE__).'/php/main.php'; ?>


<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8">

<noscript><meta http-equiv="refresh" content="0; url=error.php?error_code=2"></noscript>

<!-----blogs------->
<link href="css/blogs.css" rel="stylesheet"  media="all" type="text/css">	  
	  
	  
	  
<script type="text/javascript" src="./blogs/shCore.js"></script>
<script type="text/javascript" src="./blogs/shBrushCpp.js"></script>
<script type="text/javascript" src="./blogs/shBrushJava.js"></script>
<script type="text/javascript" src="./blogs/shBrushPhp.js"></script>






<!--end blogs--->


<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-cookies.js" type="text/javascript"></script>
<script src="js/jquery-base64.js" type="text/javascript"></script>
<?php include('js/header-js.php'); ?>
<script src="js/main.js" type="text/javascript"></script>

<link href="css/style.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="img/favicon.ico">

<title><?php echo global_title . ' - ' . global_organization; ?></title>

</head>

<body>
<!--
<div id="notification_div"><div id="notification_inner_div"><div id="notification_inner_cell_div"></div></div></div>-->



<div id="wrapper">
<div id="header_div"><?php include('header.php'); ?></div>
<div id="content_div"></div>
<div id="footer_div"><?php include('footer.php'); ?></div>
</div>

<div id="preload_div">
<img src="img/loading.gif" alt="Loading" />
</div>

</body>

</html>
