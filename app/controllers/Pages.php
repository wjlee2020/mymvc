<?php

// since it extends from the Controller, we're able to use its methods
class Pages extends Controller
{
    public function __construct()
    {
        // $this->postModel = $this->model('Post'); | used for testing
    }

    public function index()
    {
        // $posts = $this->postModel->grabPosts(); used for testing
        $data = [
            'title' => 'Welcome'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }
}
