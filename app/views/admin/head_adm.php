<?php header('Content-Type: text/html; charset=utf-8'); ?> 
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en" itemscope itemtype="http://schema.org/Product"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<!-- Use the .htaccess and remove these lines to avoid edge case issues.
     More info: h5bp.com/b/378 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Panel de administracion del sitio." />
<meta name="description" content="SisNOB - area de aplicaciones web" />
<meta name="Language" CONTENT="Spanish" />
<meta name="robots" CONTENT="INDEX,FOLLOW" />

<title>Panel de administracion</title>
<base href="<?php echo base_url();?>assets/" />

<!-- Mobile viewport optimized: j.mp/bplateviewport -->
<meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <!-- <link rel="stylesheet" href="css/minified.css"> -->
  
  <!-- CSS imports non-minified for staging, minify before moving to production-->
  <link rel="stylesheet" href="css/admin/imports.css">
  <!-- end CSS-->

  <script src="js/admin/libs/modernizr-2.0.6.min.js"></script>
</head>
