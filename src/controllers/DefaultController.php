<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index(){
        $this->render('homepage');
    }

    public function hub(){
        $this->render('hub');
    }
}