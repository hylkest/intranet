<?php
namespace src\Controller;

use src\Model\Livegang;
use src\Repository\LiveRepository;

class LiveController extends BaseController{

    private LiveRepository $liveRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liveRepository = new LiveRepository();
    }

    /**
     * Run the controller
     *
     * @return void
     */
    public function run() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
             if ($_POST['action'] == 'add') {
                $this->addLivegang($_POST);
            } else {
                echo 'error';
            }
        }

        $livegangs = $this->liveRepository->fetchAll();
        $this->loadView('Livegang', $livegangs, true);
    }

    /**
     * Add a livegang
     *
     * @param array $data
     * @return void
     */
    private function addLivegang(array $data) {
        $livegang = new Livegang(0, $data['website'], $data['date']);
        $this->liveRepository->insert($livegang);
    }
}