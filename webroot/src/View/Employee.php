<?php
namespace src\Controller;

use src\Model\Admin;
use src\Repository\AdminRepository;

class AdminController extends BaseController {

    private AdminRepository $adminRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    /**
     * Run the controller
     *
     * @return void
     */
    public function run() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['action'] == 'updatePermissions') {
                $this->updatePermissions($_POST['permissions']);
            } else if ($_POST['action'] == 'addRole') {
                $this->addRole($_POST['newRoleName']);
            } else if ($_POST['action'] == 'deleteRole') {
                $this->deleteRole($_POST['roleId']);
            }
        }

        $roles = $this->adminRepository->fetchAllRoles();
        $this->loadView('Admin', $roles, true);
    }

    private function updatePermissions($permissions) {
        foreach ($permissions as $roleId => $perms) {
            foreach ($perms as $permission => $value) {
                $this->adminRepository->updatePermission($roleId, $permission, 1);
            }
            $this->resetUncheckedPermissions($roleId, $perms);
        }
    }

    private function resetUncheckedPermissions($roleId, $perms) {
        $allPermissions = ['usermanagement', 'invoices', 'quote', 'projects', 'agenda', 'jobs', 'certificates', 'admin'];
        foreach ($allPermissions as $permission) {
            if (!isset($perms[$permission])) {
                $this->adminRepository->updatePermission($roleId, $permission, 0);
            }
        }
    }

    private function addRole($roleName) {
        $newRole = new Admin(0, $roleName, 0, 0, 0, 0, 0, 0, 0, 0);
        $this->adminRepository->insertRole($newRole);
    }

    private function deleteRole($roleId) {
        $this->adminRepository->deleteRole($roleId);
    }
}
