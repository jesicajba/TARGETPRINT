  <!-- JavaScript at the bottom for fast page loading -->

  <script src="js/admin/libs/gumby.min.js"></script>
  <script src="js/admin/plugins.js"></script>
  <script src="js/admin/main.js"></script>
  <!-- end scripts-->

	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	
  <!-- Prompt IE 6 users to install Chrome Frame. We suggest that you not support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
  <!-- Social Widget Rendering Javascript /-->
  <script src="http://platform.twitter.com/widgets.js"></script>
  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
  <script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>
  <!-- End Social Widget Rendering Javascript /-->

<script>
$(document).ready(function($){
	//
});

function confirma( ruta){
	if ( confirm( "Confirma eliminacion de registro?" ))
		location.href=ruta;
	
};
</script>
