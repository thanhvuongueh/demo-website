<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Vương Nguyễn - Demo Project</title>
<base href="{{asset('')}}">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="user/css/bootstrap.css" rel="stylesheet">
<link href="user/css/bootstrap-responsive.css" rel="stylesheet">
<link href="user/css/style.css" rel="stylesheet">
<link href="user/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="user/css/jquery.fancybox.css" rel="stylesheet">
<link href="user/css/cloud-zoom.css" rel="stylesheet">
<link href="user/css/portfolio.css" rel="stylesheet">
<link rel="stylesheet" href="user/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="user/assets/ico/favicon.ico">
</head>
<body>
<!-- Header Start -->
@include("user.blocks.header")
<!-- Header End -->

@yield("content")

<!-- Footer -->
@include("user.blocks.footer")


<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="user/js/jquery.js"></script> 
<script src="user/js/bootstrap.js"></script> 
<script src="user/js/respond.min.js"></script> 
<script src="user/js/application.js"></script> 
<script src="user/js/bootstrap-tooltip.js"></script> 
<script defer src="user/js/jquery.fancybox.js"></script> 
<script defer src="user/js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="user/js/jquery.tweet.js"></script> 
<script  src="user/js/cloud-zoom.1.0.2.js"></script> 
<script  type="text/javascript" src="user/js/jquery.validate.js"></script> 
<script type="text/javascript"  src="user/js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script type="text/javascript"  src="user/js/jquery.mousewheel.min.js"></script> 
<script type="text/javascript"  src="user/js/jquery.touchSwipe.min.js"></script> 
<script type="text/javascript"  src="user/js/jquery.ba-throttle-debounce.min.js"></script> 
<script src="user/js/jquery.isotope.min.js"></script> 
<script defer src="user/js/custom.js"></script>

@yield("script")
<script type="text/javascript"  src="user/js/my-js.js"></script> 


</body>
</html>