<?php
  class Pages extends Controller {

    public function __construct(){
     
    }

    public function index(){
      $this->view('pages/index');
    }
    
    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }

    public function prohibit(){
      $this->view('error/error1');
    }

    public function error_page(){
      $this->view('error/error' , ['error_message' => 'Invalid URL']);
    }
  }