<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_POST['btnAdd'])) {
    $pName = $_POST['txtPname'];
    $pCode = $_POST['txtPcode'];
    $Revision = $_POST['txtPrevision'];
    $mfgNum = $_POST['txtMfgNum'];
    $mfgDate = $_POST['txtMfgDate'];
    $description = $_POST['txtPdescription'];
    $AddProductQuery = "INSERT INTO Products (ProductID, ProductName, ProductCode, Revision, MfgNumber, MfgDate, Description) 
    VALUES  ('', '$pName', '$pCode', '$Revision', '$mfgNum', '$mfgDate', '$description')";
    $ProductAdded = mysqli_query($conn, $AddProductQuery);

    if ($ProductAdded) {
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
            <div class="tab" id="editTab">Add New product</div>
        </div>
        <div class="content" id="editContent">
        <form method="POST" class="editForm">
                <label for="txtPname">Product Name</label>
                <input type="text" name="txtPname" value="" /><br>
                <label for="txtPcode">Product Code</label>
                <input type="text" name="txtPcode" value="" /><br>
                <label for="txtPrevision">Revision</label>
                <input type="text" name="txtPrevision" value="" /><br>
                <label for="txtMfgNum">MFG NUMBER</label>
                <input type="text" name="txtMfgNum" value="" /><br>
                <label for="txtMfgDate">MFG Date</label>
                <input type="date" name="txtMfgDate" value="" /><br>
                <label for="txtPdescription">Description</label>
                <input type="text" name="txtPdescription" value="" /><br>
                <div class="buttons">
                <input class="btn" type="submit" name="btnAdd" value="Add">
                <input class="btn" type="submit" name="btnCancel" value="Cancel">
                </div>
        </div>
    </div>
    </form>
</body>

</html>