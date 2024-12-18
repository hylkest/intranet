<?php

namespace src\Controller;

use src\Repository\UserRepository;
use src\Model\User;

class ProfileController extends BaseController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Run the profile view
     *
     * @return void
     */
    public function run(): void
{

    $username = $_SESSION['username'];
    $user = $this->userRepository->getUserWithRole($username);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user = new User($user->getId(), $user->getUsername(), $password, $email, $user->getRole());

        if ($this->userRepository->updateUser($user)) {
            echo "Profiel succesvol bijgewerkt.";
        } else {
            echo "Error";
        }
    }

    $this->loadView('Profile', ['user' => $user], true);
}

}
