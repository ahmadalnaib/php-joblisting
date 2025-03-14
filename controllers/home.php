<?php
$config = require base_path('config/db.php');
$db = new Database($config);
$listings = $db->query('SELECT * FROM listings LIMIT 6');
$listings = $listings->fetchAll();
$listings = json_encode($listings);
echo $listings;
load_view('home');