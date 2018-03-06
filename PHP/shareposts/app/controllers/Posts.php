<?php
    class Posts extends Controller
    {
        public function __construct()
        {
            if(!isLoggedIn())
                redirect('users/login');

            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $posts = $this->postModel->getPosts();

            $data = ['posts' => $posts];

            $this->view('posts/index', $data);
        }

        public function add()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];

                // Validate title
                if(empty($data['title']))
                {
                    $data['title_error'] = 'Please enter title';
                }

                // Validate body
                if(empty($data['body']))
                {
                    $data['body_error'] = 'Please enter body';
                }

                // Make sure no errors
                if(empty($data['title_error']) && empty($data['body_error']))
                {
                    if($this->postModel->addPost($data))
                    {
                        flash('Post Added', 'Post Added');
                        redirect('posts');
                    }
                    else
                    {
                        die('Somethig went wrong');
                    }
                }
            }
            else
            {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
            }

            $this->view('posts/add', $data);
        }
    }
