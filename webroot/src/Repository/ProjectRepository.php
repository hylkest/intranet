<?php
namespace src\Repository;

use src\Model\Project;

class ProjectRepository extends AbstractRepository {
    public function __construct() {
        parent::__construct();
        $this->connect();
    }

    /**
     * Insert a project into the database
     *
     * @param Project $project
     * @return void
     */
    public function insertProject(Project $project): void {
        $query = "INSERT INTO projects 
                  (project_name, client, max_hours, project_street, project_housenumber, project_city, description, project_leader, status, project_fase, priority, spent_hours) 
                  VALUES 
                  (:project_name, :client, :max_hours, :project_street, :project_housenumber, :project_city, :description, :project_leader, :status, :project_fase, :priority, :spent_hours)";
        $stmt = $this->connection->prepare($query);
    
        $stmt->execute([
            'project_name' => $project->getProjectName(),
            'client' => $project->getClient(),
            'max_hours' => $project->getMaxHours(),
            'project_street' => $project->getProjectStreet(),
            'project_housenumber' => $project->getProjectHouseNumber(),
            'project_city' => $project->getProjectCity(),
            'description' => $project->getDescription(),
            'project_leader' => $project->getLeader(),
            'status' => $project->getStatus(),
            'project_fase' => $project->getProjectFase(),
            'priority' => $project->getPriority(),
            'spent_hours' => $project->getSpentHours()
        ]);
    }
    
    /**
     * Get all projects from the database
     *
     * @return array
     */
    public function getAllProjects(): array {
        $query = "SELECT * FROM projects";
        $stmt = $this->connection->query($query);
        $projectsData = $stmt->fetchAll();
        
        $projects = [];
        foreach ($projectsData as $data) {
            $projects[] = new Project(
                $data['project_name'],
                $data['project_street'],
                $data['project_housenumber'],
                $data['project_city'],
                $data['client'],
                $data['priority'],
                $data['project_fase'],
                (int)$data['max_hours'],
                $data['description'],
                $data['status'],
                $data['project_leader'],
                (int)$data['id'],
                (int)$data['spent_hours']
            );
        }
        return $projects;
    }

    /**
     * Get a project by id
     *
     * @param integer $id
     * @return Project|null
     */
    public function getProjectById(int $id): ?Project {
        $query = "SELECT * FROM projects WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
    
        $data = $stmt->fetch();
        if ($data) {
            return new Project(
                $data['project_name'],
                $data['project_street'],
                $data['project_housenumber'],
                $data['project_city'],
                $data['client'],
                $data['priority'],
                $data['project_fase'],
                (int)$data['max_hours'],
                $data['description'],
                $data['status'],
                $data['project_leader'],
                (int)$data['id'],
                (int)$data['spent_hours']
            );
        }
        return null;
    }

    /**
     * Update a project in the database
     *
     * @param integer $id
     * @param Project $project
     * @return void
     */
    public function updateProject(int $id, Project $project): void {
        $query = "UPDATE projects 
                  SET project_name = :project_name, 
                      client = :client, 
                      max_hours = :max_hours, 
                      project_street = :project_street, 
                      project_housenumber = :project_housenumber, 
                      project_city = :project_city, 
                      description = :description, 
                      project_leader = :project_leader, 
                      status = :status, 
                      project_fase = :project_fase, 
                      priority = :priority, 
                      spent_hours = :spent_hours 
                  WHERE id = :id";
        $stmt = $this->connection->prepare($query);
    
        $stmt->execute([
            'project_name' => $project->getProjectName(),
            'client' => $project->getClient(),
            'max_hours' => $project->getMaxHours(),
            'project_street' => $project->getProjectStreet(),
            'project_housenumber' => $project->getProjectHouseNumber(),
            'project_city' => $project->getProjectCity(),
            'description' => $project->getDescription(),
            'project_leader' => $project->getLeader(),
            'status' => $project->getStatus(),
            'project_fase' => $project->getProjectFase(),
            'priority' => $project->getPriority(),
            'spent_hours' => $project->getSpentHours(),
            'id' => $id
        ]);
    }
}
