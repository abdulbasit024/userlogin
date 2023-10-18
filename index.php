<?php
include 'conn.inc.php';

session_start();

if (! isset($_SESSION['email'])) {
    header("Location: auth.php");
};

$selectAllProducts = "SELECT * FROM Products";
$executeSAP = mysqli_query($conn, $selectAllProducts);
$selectAllTests = "SELECT * FROM testing";
$executeSAL = mysqli_query($conn, $selectAllTests);
$selectAllUsers = "SELECT * FROM users";
$executeUsers = mysqli_query($conn, $selectAllUsers);


if (isset($_POST['logOut'])) {
    header('location: logout.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/style.css?<?php echo time(); ?>" />

    <title>Lab Automation System</title>
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

    <?php
    
    if($_SESSION["role"] == "admin"){
        include "admin.php";
    }else if($_SESSION["role"] == "tester"){
        include "tester.php";
    }

    ?>

    <script src="script.js"></script>
</body>

</html>