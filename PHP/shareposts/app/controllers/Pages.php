<?php
    class Pages extends Controller
    {
        public function __construct(){}

        public function index()
        {
            $data = [
                'title' => 'Share Posts',
                'description' => 'Simple social network build on my own PHP Framework'
            ];

            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = [
                'title' => 'About Us',
                'description' => 'App to share posts with other users'
            ];

            $this->view('pages/about', $data);
        }
    }
