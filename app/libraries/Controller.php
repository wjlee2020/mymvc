<?php
/*
base controller
loads the models and views
*/

class Controller
{
    // load model 
    public function model($model)
    {
        // require model file
        require_once '../app/models/' . $model . '.php';
        // instantiate the model
        return new $model(); /* ex: if it's post model = return new Post();*/
    }

    // load view
    public function view($view, $data = [])
    {
        // check for the view file. if exists, require_once
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
