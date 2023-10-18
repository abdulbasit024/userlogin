<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $editUserQuery = "SELECT * FROM users WHERE ID = $id";
    $editUserResult = mysqli_query($conn, $editUserQuery);
    $editUserRow = mysqli_fetch_array($editUserResult);
}
if (isset($_POST['btnUpdate'])) {
    $id = $_GET['id'];
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $pass = $_POST['txtPass'];
    $updateUserQuery = "UPDATE users SET Name = '$name', Email = '$email', Password = '$pass' WHERE ID = $id";
    $userUpdated = mysqli_query($conn, $updateUserQuery);

    if ($userUpdated) {
        header('location: index.php');
    } else {
        echo "Error";
    }
};

if (isset($_POST['btnDelete'])) {
    $deleteUserQuery = "DELETE FROM users WHERE id = $id";
    $userDeleted = mysqli_query($conn, $deleteUserQuery);
    if (!$userDeleted) {
        echo "Not Deleted";
    } else {
        header('location: index.php');
    }
};

if (isset($_POST['btnCancel'])) {
    header('location: index.php');
};

if (isset($_POST['logOut'])) {
    header('location: logout.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/edit.css?<?php echo time(); ?>" />
    <title>User Management</title>
    
</head>
<body>
<header>
        <div class="headerCon">
            <h1>Lab Automation</h1>
            <form method='POST'>
                <input class="logoutBtn" type='submit' value='Logout' name='logOut'>
            </form>
        </div>
    </header>

    <div class="container">
        <div class="tabs">
            <div class="tab" id="editTab">Edit User</div>
        </div>
        <div class="content" id="editContent">
            <form method="POST" class="editForm">
                <label for="txtName">Name</label>
                <input type="text" name="txtName" value="<?php echo $editUserRow[1] ?>" /><br>
                <label for="txtEmail">Email</label>
                <input type="text" name="txtEmail" value="<?php echo $editUserRow[2] ?>" /><br>
                <label for="txtPass">Password</label>
                <input type="password" name="txtPass" value="<?php echo $editUserRow[3] ?>" /><br>
                <div class="buttons">
                <input class="btn" type="submit" name="btnUpdate" value="Update">
                <input class="btn" type="submit" name="btnDelete" value="Delete">
                <input class="btn" type="submit" name="btnCancel" value="Cancel">
                </div>
        </div>
    </div>
    </form>
</body>

</html>