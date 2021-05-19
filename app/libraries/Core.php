<?php

// App core class. Creates URL & loads core controller
// basic function: mapping url to controllers 
// URL Format = /controller/method/params

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        // print_r($this->getUrl());
        $url = $this->getUrl();
        // look in controllers for first value
        if ((isset($url[0])) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // if exists, set as controller
            $this->currentController = ucwords($url[0]);
            //unset 0 index
            unset($url[0]);
        }
        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // instantiate the controller class
        // Pages = new Pages() example;
        $this->currentController = new $this->currentController;

        // check for second part of url (/pages/about)
        if (isset($url[1])) {
            // check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset 1 index
                unset($url[1]);
            }
        }
        // get leftover params. or keep it as empty array
        $this->params = $url ? array_values($url) : [];

        // Call a callback w/ array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // cut the last forward slash of the url (if any)
            $url = rtrim($_GET['url'], '/');
            // filter variables as URL format (no illegal characters that do not belong in a URL)
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // string split (in js), returns array of strings
            $url = explode('/', $url);
            return $url;
        }
    }
}
