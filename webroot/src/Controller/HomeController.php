<?php
namespace src\Controller;

use src\Repository\HomeRepository;

class HomeController extends BaseController {
    public function run() {
        $homeRepository = new HomeRepository();
        $projectStatusCounts = $homeRepository->getProjectStatusCounts();

        $data = [
            'statusCounts' => $projectStatusCounts,
        ];

        $this->loadView('Home', $data, false);
    }
}
