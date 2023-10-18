<?php
include 'conn.inc.php';
session_start();

if(isset($_SESSION["email"])){
    header("location: index.php");
}

if(isset($_POST['loginBtn']))
{
    $uemail = $_POST['txtEmail'];
    $pass = $_POST['txtPass'];
    $query = "select count(*) from users where Email = '$uemail' AND Password = '$pass'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_array($result);
    if($count[0]==1){
        $sql = "SELECT * FROM USERS WHERE EMAIL = '$uemail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        $_SESSION["email"] = $row["Email"];
        $_SESSION["id"] = $row["ID"];
        $_SESSION["role"] = $row["Role"];
        header('location: index.php');
    }
    else{
        echo "Invalid Credientals";
    }
};
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/auth.css?<?php echo time(); ?>" />
    <title>Sign In | Lab Automation</title>
</head>
<body>
<header>
        <div class="headerCon">
            <h1>Lab Automation</h1>
        </div>
    </header>

    <div class="container">
        <div class="tabs">
            <div class="tab" id="signInTab">Lab Automation</div>
        </div>
            <div class="content" id="signInContent">
                <h3>Welcome Back!</h3>
                <form class="loginPageForm" method="POST" id="form" onsubmit="validatee()">
                    <label for="email">Email</label>
                    <input type="text" name="txtEmail">
                    <label for="password">Password</label>
                    <input type="text" name="txtPass">
                    <input name="loginBtn" id="submit" class="submit" type="submit" value="Sign In">
                </form>
            </div>
    </div>


    <script>
        // Sign In & Sign Up Tab Functionality

        function clearFunc() {
            document.getElementById('form').reset();
        };
    </script>
</body>
</html>