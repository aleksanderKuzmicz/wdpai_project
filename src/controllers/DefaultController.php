<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        // TODO display login.php
        $this->render('login');
    }

    public function reviews() {
        // TODO display projects.html
        $this->render('reviews');
    }

    public function people() {
        $this->render('people');
    }
}