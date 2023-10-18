<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_POST['btnAdd'])) {
    $testerID = $_SESSION['id'];
    $ProductID = $_POST['txtPid'];
    $testType = $_POST['txtTestType'];
    $testDate = $_POST['testDate'];
    $testStatus = $_POST['testStatus'];
    $testRemarks = $_POST['testRemarks'];
    $addTestQuery = "INSERT INTO testing (testingID, ProductID, testType, testDate, testerid, testStatus, Remarks) 
    VALUES  ('', '$ProductID', '$testType', '$testDate', '$testerID', '$testStatus', '$testRemarks')";
    $TestAdded = mysqli_query($conn, $addTestQuery);

    if ($TestAdded) {
        header('location: index.php');
    } else {
        echo "Error";
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
            <div class="tab" id="editTab">Add New Test</div>
        </div>
        <div class="content" id="editContent">
        <form method="POST" class="editForm">
                <label for="txtPid">Product ID</label>
                <input type="text" name="txtPid" value="" /><br>
                <label for="txtTestType">Test Type</label>
                <input type="text" name="txtTestType" value="" /><br>
                <label for="testDate">Test Date</label>
                <input type="date" name="testDate" value="" /><br>
                <label for="testStatus">Test Status</label>
                <input type="text" name="testStatus" value="" /><br>
                <label for="testRemarks">Remarks</label>
                <input type="text" name="testRemarks" value="" /><br>
                <div class="buttons">
                <input class="btn" type="submit" name="btnAdd" value="Add">
                <input class="btn" type="submit" name="btnCancel" value="Cancel">
                </div>
        </div>
    </div>
    </form>
</body>

</html>