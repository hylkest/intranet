<?php

namespace src\Controller;
use src\Repository\UserRepository;
use src\Model\User;

class LoginController extends BaseController {

        private UserRepository $userRepository;

        /**
         * Constructor
         */
        public function __construct() {
            $this->userRepository = new UserRepository();
        }

        /**
         * Run the controller
         *
         * @return void
         */
        public function run() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login') {
                $this->loginUser($_POST);
            }
            $this->loadView('Login', []);
        }
        
        /**
         * Process user login and send to homepage.
         *
         * @param array $data
         * @return void
         */
        private function loginUser(array $data) {
            $user = $this->userRepository->getUser($data['username']);
            if (password_verify($data['password'], $user->getPassword())) {
                $_SESSION['user'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                header('Location: /');
            } else {
                echo 'Invalid username or password';
            }
        }
}