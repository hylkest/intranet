// AJAX call to update permissions
function updatePermission(roleId, permission, isChecked) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "path/to/your/controller", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Permission updated successfully");
        } else {
            console.error("Failed to update permission");
        }
    };
    xhr.send(`action=updatePermission&roleId=${roleId}&permission=${permission}&value=${isChecked ? 1 : 0}`);
}


function addRole() {
    const roleName = document.getElementById('newRoleName').value;
    if (roleName.trim()) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../../src/Controller/AdminController.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert("Role added successfully");
                location.reload();
            } else {
                console.error("Failed to add role");
            }
        };
        xhr.send(`action=addRole&roleName=${encodeURIComponent(roleName)}`);
    } else {
        alert("Please enter a role name");
    }
}
