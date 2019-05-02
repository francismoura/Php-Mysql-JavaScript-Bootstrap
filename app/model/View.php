<?php

class View {
  /*
   * If the route is valid create the view and the view controller.
   * If the route is invalid do nothing and if something goes wrong
   * checking the route return 0;
  */
  public static function make($viewName) {

      if (Route::isRouteValid()) {
          // Create the view and the view controller.

          $dirs = array(
              '../app/view/pages/',
              '../app/view/admin/',
              '../app/view/user/',
              '../app/view/error/'
          );

          foreach ($dirs as $dir) {
              if (file_exists($dir . $viewName . '.php')) {
                  require_once $dir . $viewName . '.php';
                  break;
              }
          }
          return 1;
      }
      return 0;
  }
}