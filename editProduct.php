<?php
include('conn.inc.php');

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: auth.php");
};

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    $editProductQuery = "SELECT * FROM products WHERE productID = $id";
    $editProductResult = mysqli_query($conn, $editProductQuery);
    $editProductRow = mysqli_fetch_array($editProductResult);
}
if (isset($_POST['btnUpdate'])) {
    $id = $_GET['pid'];
    $pName = $_POST['txtPname'];
    $pCode = $_POST['txtPcode'];
    $Revision = $_POST['txtPrevision'];
    $mfgNum = $_POST['txtMfgNum'];
    $mfgDate = $_POST['txtMfgDate'];
    $description = $_POST['txtPdescription'];
    $updateProductQuery = "UPDATE Products SET ProductName = '$pName', ProductCode = '$pCode', Revision = '$Revision', MfgNumber = '$mfgNum', MfgDate = '$mfgDate', Description = '$description' WHERE ProductID = $id";
    $ProductUpdated = mysqli_query($conn, $updateProductQuery);

    if ($ProductUpdated) {
        header('location: index.php');
    } else {
        echo "Error";
    }
};

if (isset($_POST['btnDelete'])) {
    $deleteProductQuery = "DELETE FROM products WHERE ProductID = $id";
    $ProductDeleted = mysqli_query($conn, $deleteProductQuery);
    if (!$ProductDeleted) {
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
            <div class="tab" id="editTab">Edit Product</div>
        </div>
        <div class="content" id="editContent" >
            <form method="POST" class="editForm">
                <label for="txtName">Product Name</label>
                <input type="text" name="txtPname" value="<?php echo $editProductRow[1] ?>" /><br>
                <label for="txtEmail">Product Code</label>
                <input type="text" name="txtPcode" value="<?php echo $editProductRow[2] ?>" /><br>
                <label for="txtPass">Revision</label>
                <input type="text" name="txtPrevision" value="<?php echo $editProductRow[3] ?>" /><br>
                <label for="txtPass">MFG NUMBER</label>
                <input type="text" name="txtMfgNum" value="<?php echo $editProductRow[4] ?>" /><br>
                <label for="txtPass">MFG Date</label>
                <input type="date" name="txtMfgDate" value="<?php echo $editProductRow[5] ?>" /><br>
                <label for="txtPass">Description</label>
                <input type="text" name="txtPdescription" value="<?php echo $editProductRow[6] ?>" /><br>
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