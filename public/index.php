<?php
require "../helper.php";
// load_view("home");

$routers = [
  '/' => "controllers/home.php",
  '/listings' => "controllers/listings/index.php",
  '/listings/show' => "controllers/listings/show.php",
  '/listings/create' => "controllers/listings/create.php",
  '/listings/store' => "controllers/listings/store.php",
  '/listings/edit' => "controllers/listings/edit.php",
  '/listings/update' => "controllers/listings/update.php",
  '/listings/delete' => "controllers/listings/delete.php",
  '/listings/search' => "controllers/listings/search.php",
  '404' => "controllers/error/404.php"

];

$uri= $_SERVER['REQUEST_URI'];
if(array_key_exists($uri, $routers)){
  require base_path($routers[$uri]);
}else{
  require base_path($routers['404']);
}
