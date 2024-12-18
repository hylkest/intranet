<script src="../../assets/js/script.js"></script>
<div class="container">
    <h2>Roles Management</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <input type="text" name="newRoleName" id="newRoleName" class="form-control" placeholder="Enter new role name" required>
            <button type="submit" name="action" value="addRole" class="btn btn-primary mt-2">Add Role</button>
        </div>
    </form>

    <form method="POST" action="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Role Naam</th>
                    <th>Gebruikersbeheer</th>
                    <th>Facturen</th>
                    <th>Offerte's</th>
                    <th>Projecten</th>
                    <th>Agenda</th>
                    <th>Taken</th>
                    <th>Certificaten</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($urlData as $role): ?>
                <tr>
                    <td><?php echo htmlspecialchars($role->getRoleName()); ?></td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][usermanagement]" <?php echo ($role->getRoleUsermanagement() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][invoices]" <?php echo ($role->getRoleInvoices() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][quote]" <?php echo ($role->getRoleQuote() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][projects]" <?php echo ($role->getRoleProjects() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][agenda]" <?php echo ($role->getRoleAgenda() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][jobs]" <?php echo ($role->getRoleJobs() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][certificates]" <?php echo ($role->getRoleCertificates() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="permissions[<?php echo $role->getId(); ?>][admin]" <?php echo ($role->getRoleAdmin() == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <button class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <small><i>*Admin permissie heeft standaard alle rechten</i></small><br>
        <button type="submit" name="action" value="updatePermissions" class="btn btn-success mt-2">Update Permissions</button>
    </form>
</div>
