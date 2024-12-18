<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

use src\Controller\LighthouseController;
use src\Controller\NewsController;
use src\Controller\LiveController;
use src\Controller\RegisterController;
use src\Controller\LoginController;
use src\Controller\HomeController;
use src\Controller\LogoutController;
use src\Controller\AdminController;
use src\Controller\ProjectController;
use Dotenv\Dotenv;
use src\Controller\ProfileController;
use src\Controller\EmployeeController;

require_once './vendor/autoload.php';

const BASE_DIR = __DIR__;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Router
{
    private $slugs;

    public function __construct() {
        $this->slugs = [
            '/' => new HomeController(),
            '/login' => new LoginController(),
            '/logout' => new LogoutController(),
            '/livegang' => new LiveController(),
            '/nieuws' => new NewsController(),
            '/lighthouse' => new LighthouseController($_ENV['LIGHTHOUSE_API_KEY']),
            '/registreren' => new RegisterController(),
            '/profiel' => new ProfileController(),
            '/admin' => new AdminController(),
            '/projects' => new ProjectController(),
            '/create-project' => new ProjectController(),
            '/werknemers' => new EmployeeController()
        ];
    }

    public function run(): void {
        $url = explode('?', $_SERVER['REQUEST_URI'])[0];

        // Controleer op dynamische URL voor projectdetailpagina
        if (preg_match('#^/project/(\d+)$#', $url, $matches)) {
            $projectId = (int)$matches[1];
            $controller = new ProjectController();
            $controller->detail($projectId);
            return;
        }

        // Standaard URL's
        if (isset($this->slugs[$url])) {
            $this->slugs[$url]->run();
        } elseif ($url === '/create-project') {
            $controller = new ProjectController();
            $controller->create();
        }
    }
}

$router1 = new Router();
$router1->run();
