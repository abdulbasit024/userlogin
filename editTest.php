<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_GET['tid'])) {
    $id = $_GET['tid'];
    $editTestQuery = "SELECT * FROM Testing WHERE TestingID = $id";
    $editTestResult = mysqli_query($conn, $editTestQuery);
    $editTestRow = mysqli_fetch_array($editTestResult);
}
if (isset($_POST['btnUpdate'])) {
    $id = $_GET['tid'];
    $ProductID = $_POST['txtPID'];
    $testType = $_POST['txtTestType'];
    $testDate = $_POST['txtTestDate'];
    $testStatus = $_POST['txtTestStatus'];
    $testRemarks = $_POST['txtTestRemarks'];
    $updateTestQuery = "UPDATE testing SET ProductID = '$ProductID', TestType = '$testType', TestDate = '$testDate', TestStatus = '$testStatus', Remarks = '$testRemarks' WHERE testingID = $id";
    $TestUpdated = mysqli_query($conn, $updateTestQuery);

    if ($TestUpdated) {
        header('location: index.php');
    } else {
        echo "Error";
    }
};

if (isset($_POST['btnDelete'])) {
    $deleteTestQuery = "DELETE FROM Testing WHERE TestingID = $id";
    $TestDeleted = mysqli_query($conn, $deleteTestQuery);
    if (!$TestDeleted) {
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

    <div class="container" >
        <div class="tabs">
            <div class="tab" id="editTab">Edit Test</div>
        </div>
        <div class="content" id="editContent" >
            <form method="POST" class="editForm">
                <label for="txtPID">Product ID</label>
                <input type="text" name="txtPID" value="<?php echo $editTestRow[1] ?>" /><br>
                <label for="txtTestType">Test Type</label>
                <input type="text" name="txtTestType" value="<?php echo $editTestRow[2] ?>" /><br>
                <label for="txtTestDate">Test Date</label>
                <input type="date" name="txtTestDate" value="<?php echo $editTestRow[3] ?>" /><br>
                <label for="txtTestStatus">Test Status</label>
                <input type="text" name="txtTestStatus" value="<?php echo $editTestRow[5] ?>" /><br>
                <label for="txtTestRemarks">Remarks</label>
                <input type="text" name="txtTestRemarks" value="<?php echo $editTestRow[6] ?>" /><br>
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