<?php
    class Core {
        // URL format --> localhost/filename/controller/method/parameters
        protected $currentController = 'pages';
        protected $currentMethod = 'home';
        protected $params = [];

        public function __construct()
        {
            $url = $this->getURL();

            // Look in controllers for the first value
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
            {
                // Set the controller if exists
                $this->currentController = ucwords($url[0]);
                // Unset the 0th value
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            // Instantiate controller class
            $this->currentController = new $this->currentController;

            if (isset($url[1]))
            {
                if (method_exists($this->currentController, $url[1]))
                {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            if (!(method_exists($this->currentController, $this->currentMethod)))
            {
                // if home method doesnt exist redirected to not-found
                http_response_code(404);
                $this->currentMethod = 'notFound';
            }

            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getURL()
        {
            if (isset($_GET['url']))
            {
                $url = rtrim($_GET['url'], '/');
                // $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>