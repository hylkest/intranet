<?php
namespace src\Repository;

use src\Model\Home;
class HomeRepository extends AbstractRepository {

    /**
     * Fetch all projects from the database
     *
     * @return array
     */
    public function getProjectStatusCounts(): array {
        $this->connect();

        $stmt = $this->connection->prepare("
            SELECT status, COUNT(*) as count
            FROM projects
            WHERE status IN ('In uitvoering', 'On hold')
            GROUP BY status
        ");
        
        $stmt->execute();
        $results = $stmt->fetchAll();

        $statusCounts = [
            'In uitvoering' => 0,
            'On hold' => 0,
        ];

        foreach ($results as $row) {
            $statusCounts[$row['status']] = $row['count'];
        }

        return $statusCounts;
    }
}
