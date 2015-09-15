<?php 

require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg) {
	$cfg->set_model_directory('models');
	$cfg->set_connections(array(
			'development' => 'mysql://root:@localhost/blog'
		));
});


#fetching all the data from the table;
//$posts = Post::all();


#creating a new row;
// Post::create(array(
// 	'title' => 'I should put more afforts',
// 	'body'	=> 'Yes Asshole, you should!'
// ));

#updating any row;
$post = Post::find(5);
$post->title = "Updated Title";
$post->save();


 ?>
