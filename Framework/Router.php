<?php
// $routers = require base_path("routes.php");

// if (array_key_exists($uri, $routers)) {
//   require base_path($routers[$uri]);
// } else {
//   http_response_code(404);
//   require base_path($routers['404']);
// }

class Router
{
  protected $routes = [];

  public function registerRoute($method, $uri, $controller)
  {
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller
    ];


  }

  /**
   * Add GET request
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function get($uri, $controller)
  {
    // $this->routes = [
    //   'method' => 'GET',
    //   'uri' => $uri,
    //   'controller' => $controller
    // ];
    $this->registerRoute('GET', $uri, $controller);
  }


  /**
   * Add POST request
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function post($uri, $controller)
  {
    // $this->routes = [
    //   'method' => 'POST',
    //   'uri' => $uri,
    //   'controller' => $controller
    // ];

    $this->registerRoute('POST', $uri, $controller);
  }


  /**
   * Add PUT request
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function put($uri, $controller)
  {
    // $this->routes = [
    //   'method' => 'PUT',
    //   'uri' => $uri,
    //   'controller' => $controller
    // ];

    $this->registerRoute('PUT', $uri, $controller);
  }

  /**
   * Add DELETE request
   * @param string $uri
   * @param string $controller
   * @return void
   */

  public function delete($uri, $controller)
  {
    // $this->routes = [
    //   'method' => 'DELETE',
    //   'uri' => $uri,
    //   'controller' => $controller
    // ];

    $this->registerRoute('DELETE', $uri, $controller);
  }


  /**
   * Load error 404 page
   * @param int http_response_code
   * @return void
   */

  public function error404($httpCode=404)
  {
    http_response_code($httpCode);
    load_view("error/{$httpCode}");
    exit;
  }



  /**
   * Route the request
   * @param string $method
   * @param string $uri
   * @return void
   */

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
      require base_path('App/'. $route['controller']);
      return;
      }
    }

    $this->error404();

  }
}
