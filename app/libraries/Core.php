<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    // if($_SERVER['REQUEST_URI'] == '/'){
    //   echo 'paw';
    // }
    public function __construct(){
      // print_r($this->getUrl());
      // echo 'ks';
      // die();
      $url = $this->getUrl();
      // var_dump($url);

      // var_dump($url[2]);
      // $cam = explode('.',$url[2]);
      // var_dump($cam[0]);
      // if($cam[0] == 'download'){
      //   var_dump(parse_url($_SERVER['REQUEST_URI']));        
      // }
      // die();
      // Look in BLL for first value
      if(file_exists(APPROOT.'/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

      // if(isset($url[3])){
      //   $cam = explode('.',$url[3]);
      //   // var_dump($cam[0]);
      //   if(file_exists(APPROOT.'/controllers/' . ucwords($url[2]). '.php')){
      //     // If exists, set as controller
      //     $this->currentController = ucwords($url[2]);
      //     // Unset 0 Index
      //     unset($url[2]);
      //   }
      // }

      if(isset($url[2])){
        $cam = explode('.',$url[2]);
        // var_dump($cam[0]);
        if(file_exists(APPROOT.'/controllers/' . ucwords($url[1]). '.php')){
          // If exists, set as controller
          $this->currentController = ucwords($url[1]);
          // Unset 0 Index
          unset($url[1]);
        }
      }
      if(isset($url[1])){
        $cam = explode('.',$url[1]);
        // var_dump($cam[0]);
        if(file_exists(APPROOT.'/controllers/' . ucwords($url[0]). '.php')){
          // If exists, set as controller
          $this->currentController = ucwords($url[0]);
          // Unset 0 Index
          unset($url[0]);
        }
      }
      
      // Require the controller
      require_once APPROOT.'/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;
      if(isset($url[0])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[0])){
          $this->currentMethod = $url[0];
          // Unset 1 index
          unset($url[0]);
        }
      }
      // echo $com[0];
      // die();
      // Check for second part of url
      if(isset($cam[0])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $cam[0])){
          $this->currentMethod = $cam[0];
          // Unset 1 index
          unset($cam[0]);
        }
      }

      if (isset($url[1])) {
        if (method_exists($this->currentController, $url[1])) {
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }
      if (isset($url[2])) {
        if (method_exists($this->currentController, $url[2])) {
          $this->currentMethod = $url[2];
          unset($url[2]);
        }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      // echo $_GET['url'];
      // echo $_SERVER['HTTP_HOST'];
      // // echo '<br>';
      // echo $_SERVER['REQUEST_URI'];
      // die();
      if(isset($_SERVER['REQUEST_URI'])){
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }


