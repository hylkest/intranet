<?php 

namespace src\Controller;

use src\Model\User;
use src\Repository\UserRepository;

class RegisterController extends BaseController{

    private UserRepository $userRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Run the controller
     *
     * @return void
     */
    public function run() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'register') {
            if ($_POST['action'] == 'register' && $_POST['password'] == $_POST['password-repeat']) {
                $this->registerUser($_POST);
            } else {
                echo 'Passwords do not match';
            }
        }

        $this->loadView('Register', []);
    }

    /**
     * Register a user
     *
     * @param array $data
     * @return void
     */
    private function registerUser(array $data) {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $user = new User(0, $data['username'], $hashedPassword, $data['email'], $data['role']);
        $this->userRepository->insert($user);
    }
}