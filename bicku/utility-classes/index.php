<?php 

require 'classes/html.php';

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>

 	<?php echo HTML::anchor('about/index.php', 'About Us'); ?>

 	<?= HTML::items(array('item1', 'item2', 'item3', 'item4')); ?>

 	<?php echo HTML::image('http://www.avrupabulteni.com/d/news/109887.jpg', 'Fb Pic'); ?>
 	
 </body>
 </html>