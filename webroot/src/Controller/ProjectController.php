<?php
namespace src\Controller;

use src\Repository\ProjectRepository;
use src\Model\Project;

class ProjectController extends BaseController {
    private ProjectRepository $projectRepository;

    public function __construct() {
        $this->projectRepository = new ProjectRepository();
    }

    public function run(): void {
        $url = explode('?', $_SERVER['REQUEST_URI'])[0];

        if ($url === '/create-project') {
            $this->createProject();
        } elseif (preg_match('/^\/project\/(\d+)$/', $url, $matches)) {
            $this->detail((int)$matches[1]);
        } else {
            $this->overview();
        }
    }

    private function overview(): void {
        $projects = $this->projectRepository->getAllProjects();
        $this->loadView('ProjectOverview', ['projects' => $projects], true);
    }

    private function createProject(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectName = $_POST['project_name'] ?? 'Default Project Name';
            $projectStreet = $_POST['project_street'] ?? 'Default Street';
            $projectHousenumber = $_POST['project_housenumber'] ?? 'Default Housenumber';
            $projectCity = $_POST['project_city'] ?? 'Default City';
            $client = $_POST['client'] ?? 'Default Client';
            $projectLeader = $_POST['project_leader'] ?? 'Default Project Leader';
            $priority = $_POST['priority'] ?? 'medium';
            $maxHours = (int) ($_POST['max_hours'] ?? 0);
            $status = $_POST['status'] ?? 'new';
            $projectFase = $_POST['project_fase'] ?? 'initial';
            $description = $_POST['description'] ?? 'No description provided.';
            $spentHours = (int) ($_POST['spent_hours'] ?? 0);


            $project = new Project(
                $projectName,
                $projectStreet,
                $projectHousenumber,
                $projectCity,
                $client,
                $priority,
                $projectFase,
                $maxHours,
                $description,
                $status,
                $projectLeader,
                $spentHours
            );

            $this->projectRepository->insertProject($project);
            header('Location: /projects');
            exit;
        }

        $this->loadView('CreateProject', null);
    }

    public function updateProject(int $projectId): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectName = $_POST['project_name'] ?? 'Default Project Name';
            $projectStreet = $_POST['project_street'] ?? 'Default Street';
            $projectHousenumber = $_POST['project_housenumber'] ?? 'Default Housenumber';
            $projectCity = $_POST['project_city'] ?? 'Default City';
            $client = $_POST['client'] ?? 'Default Client';
            $projectLeader = $_POST['project_leader'] ?? 'Default Project Leader';
            $priority = $_POST['priority'] ?? 'medium';
            $maxHours = (int) ($_POST['max_hours'] ?? 0);
            $status = $_POST['status'] ?? 'new';
            $projectFase = $_POST['project_fase'] ?? 'initial';
            $description = $_POST['description'] ?? 'No description provided.';
            $spentHours = (int) ($_POST['spent_hours'] ?? 0);

            $project = new Project(
                $projectName,
                $projectStreet,
                $projectHousenumber,
                $projectCity,
                $client,
                $priority,
                $projectFase,
                $maxHours,
                $description,
                $status,
                $projectLeader,
                $spentHours
            );

            $this->projectRepository->updateProject($projectId, $project);
            header('Location: /projects');
            exit;
        }

        $project = $this->projectRepository->getProjectById($projectId);
        if ($project !== null) {
            $this->loadView('UpdateProject', ['project' => $project], true);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo "Project niet gevonden.";
            exit;
        }
    }

    public function detail(int $projectId): void {
        $project = $this->projectRepository->getProjectById($projectId);
        if ($project !== null) {
            $this->loadView('ProjectDetail', ['project' => $project], true);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo "Project niet gevonden.";
            exit;
        }
    }
}
