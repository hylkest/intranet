<?php
namespace src\Repository;

use src\Model\Employee;

class EmployeeRepository extends AbstractRepository {
    /**
     * Fetch all roles from the database
     *
     * @return array
     */
    public function fetchAllRoles(): array
    {
        $this->connect();
        $query = $this->connection->query("SELECT * FROM roles ORDER BY `id` DESC");
        $results = $query->fetchAll();

        $roles = [];
        foreach ($results as $result) {
            $roles[] = new Employee(
                $result['id'],
                $result['role_name'],
                $result['role_usermanagement'],
                $result['role_invoices'],
                $result['role_quote'],
                $result['role_projects'],
                $result['role_agenda'],
                $result['role_jobs'],
                $result['role_certificates'],
                $result['role_admin']
            );
        }

        return $roles;
    }

    /**
     * Add a new role to the database
     *
     * @param Admin $role
     * @return boolean
     */
    public function insertRole(Employee $role): bool
    {
        $this->connect();

        $query = $this->connection->prepare(
            "INSERT INTO roles (role_name, role_usermanagement, role_invoices, role_quote, role_projects, role_agenda, role_jobs, role_certificates, role_admin) 
            VALUES (:role_name, :role_usermanagement, :role_invoices, :role_quote, :role_projects, :role_agenda, :role_jobs, :role_certificates, :role_admin)"
        );

        // Alle parameters met de waardes connecten.
        $query->execute([
            'role_name' => $role->getRoleName(),
            'role_usermanagement' => $role->getRoleUsermanagement(),
            'role_invoices' => $role->getRoleInvoices(),
            'role_quote' => $role->getRoleQuote(),
            'role_projects' => $role->getRoleProjects(),
            'role_agenda' => $role->getRoleAgenda(),
            'role_jobs' => $role->getRoleJobs(),
            'role_certificates' => $role->getRoleCertificates(),
            'role_admin' => $role->getRoleAdmin()
        ]);
        
        return $query->rowCount() > 0;
    }

    /**
     * Update a role permission in the database
     *
     * @param int $roleId
     * @param string $permission
     * @param int $value
     */
    public function updatePermission($roleId, $permission, $value)
    {
        $this->connect();
        $query = $this->connection->prepare("UPDATE roles SET role_$permission = :value WHERE id = :roleId");
        $query->execute(['value' => $value, 'roleId' => $roleId]);
    }

    /**
     * Deletes a role from the database
     *
     * @param [type] $roleId
     * @return void
     */
    public function deleteRole($roleId)
    {
        $this->connect();
        $query = $this->connection->prepare("DELETE FROM roles WHERE id = :roleId");
        $query->execute(['roleId' => $roleId]);
    }
}
