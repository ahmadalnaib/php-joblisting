<?php

/**
 *  Get the base path of the project
 * 
 * @param string $path
 * @return string
 */

function base_path($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load view
 * 
 * @param string $name
 * @return void
 */

function load_view($name)
{
  $viewBath = base_path("views/{$name}.view.php");
  if (file_exists($viewBath)) {
    require $viewBath;
  } else {
    echo "View '{$name} not found' ";
  }
}


/**
 * Load partials
 * 
 * @param string $name
 * @return void
 */

function load_partial($name)
{
  $partialBath = base_path("views/partials/{$name}.php");
  if (file_exists($partialBath)) {
    require $partialBath;
  } else {
    echo "Partial '{$name} not found' ";
  }
}



/**
 * Inspact the value
 * @param mixed $value
 * @return void
 */
function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}

/**
 * Inspact the value and die
 * @param mixed $value
 * @return void
 */

function ddd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}
