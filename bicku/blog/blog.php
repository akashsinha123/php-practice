<?php namespace Blog\DB;
require 'functions.php';
require 'db.php';
use Blog\DB;
$conn = connect($config);

if (!$conn ) die('Unable to connect to the db');