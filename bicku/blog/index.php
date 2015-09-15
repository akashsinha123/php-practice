<?php namespace Blog\DB;

require 'blog.php';

//fetch data from posts
$posts = get('posts', $conn);


view('index', array(
	'posts' => $posts
	));





 ?>