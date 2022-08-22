<?php

require_once 'Model/subreddit.php';

class SubredditController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Subreddit();
    }

    public function Index(){
        //$this->model->Registrar();
        require_once 'View/subreddit.php';
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idblog']);
        header('Location: index.php');
    }
}