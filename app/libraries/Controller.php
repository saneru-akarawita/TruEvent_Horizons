<?php
    class Controller {
        //to load the model
        public function model($model) {
            require_once '../app/models/'.$model.'.php';

            //instentiate the model and pass it to the controller member variable 
            return new $model();
        }

        //to load the view
        public function view($view, $data =[]) {
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
            }
            else
            {
                //Page not found
                redirect('pages/notFound');
            }
        }

        public function notFound()
        {
            redirect('pages/notFound');
        }
    }
?>