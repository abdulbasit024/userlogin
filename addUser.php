<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_POST['btnAdd'])) {
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $pass = $_POST['txtPass'];
    $confirmPass = $_POST['txtConfirmPass'];

    if ($pass == $confirmPass) {
        $addUserQuery = "INSERT INTO users (ID, Name, Email, Password) Values ('$id', '$name', '$email', '$pass')";
        $userAdded = mysqli_query($conn, $addUserQuery);

        if ($userAdded) {
            header('location: index.php');
        } else {
            echo "Error";
        }
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
            <div class="tab" id="editTab">Add New User</div>
        </div>
        <div class="content" id="editContent">
            <form method="POST" class="editForm">
                <label for="txtName">ID</label>
                <input type="text" name="txtID" value="" /><br>
                <label for="txtName">Name</label>
                <input type="text" name="txtName" value="" /><br>
                <label for="txtEmail">Email</label>
                <input type="text" name="txtEmail" value="" /><br>
                <label for="txtPass">Password</label>
                <input type="password" name="txtPass" value="" /><br>
                <label for="txtPass">Confirm Password</label>
                <input type="password" name="txtConfirmPass" value="" /><br>
                <div class="buttons">
                    <input class="btn" type="submit" name="btnAdd" value="Add">
                    <input class="btn" type="submit" name="btnCancel" value="Cancel">
                </div>
        </div>
    </div>
    </form>
</body>

</html>