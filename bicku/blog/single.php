<?php namespace Blog\DB;

require 'blog.php';

//fetch data from posts
$post = get_by_id((int)$_GET['id'], $conn);

if ( $post ) {
	$post = $post[0];
	
	view('single', array(
	'post' => $post
	));


} else {
	header('location:./');
}


