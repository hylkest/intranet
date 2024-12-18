<?php

namespace src\Controller;

class LogoutController {
    /**
     * Run the controller
     *
     * @return void
     */
    public function run() {
        session_start();

        $_SESSION = array();

        session_destroy();
        header('Location: /');
        exit;
    }
}