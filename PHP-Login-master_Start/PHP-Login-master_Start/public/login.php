<?php require_once ('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>

<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>






    <?php

    /* Check if login form has been submitted */
    /* isset — Determine if a variable is declared and is different than NULL*/
    if(isset($_POST['Submit']))
    {
        try {
            require_once('config.php');
            $connection = new PDO($dsn, $username, $password, $options);
            $sql = "SELECT firstname, password from users where firstname = :USER";
            $stmt = $connection->prepare($sql);
            $tmpUser = $_POST["Username"];
            $tmpPassword = $_POST["Password"];
            $stmt->bindParam(':USER', $tmpUser, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row => $rows) {
                $fname_db = $rows["firstname"];
                $pwd_db = $rows["password"];

                if (($_POST['Username'] == $fname_db) && ($_POST['Password'] == $pwd_db)) {
                    $_SESSION["username"] = $fname_db;
                    $_SESSION["Active"] = true;
                    header("Location: index.php");
                    exit;
                } else
                    echo 'Incorrect Username or Password';
            }
            }
            catch(PDOException $e){
            echo $e->getMessage();
            }
        }
    ?>

</div>
</body>
</html>



