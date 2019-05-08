<?php

class View {
  /*
   * Se a rota for válida, crie a visualização e o controlador de visualização.
   * Se a rota é inválida, não faça nada e se algo der errado
   * verificar o retorno da rota 0;
  */
  public static function build($viewName) {

      if (Route::isRouteValid()) {
          // criar as views e os controllers

          $dirs = array(
              '../app/view/pages/',
              '../app/view/pages/admin/',
              '../app/view/errors/',
              '../app/controller/'
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