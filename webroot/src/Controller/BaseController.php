<?php

namespace src\Controller;

class BaseController {
    /**
     * Load the view
     *
     * @param string $viewName
     * @param $urlData
     * @param boolean $protected
     * @return void
     */
    public function loadView(string $viewName, $urlData, bool $protected = false) {
        if ($protected) {
            require_once BASE_DIR . '/src/View/session.php';
        }
        
        require_once BASE_DIR . '/src/View/Header.php';
        require_once BASE_DIR . '/src/View/' . $viewName . '.php';
        require_once BASE_DIR . '/src/View/Footer.php';

        
    }
}