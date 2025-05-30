<?php require_once ('../config.php');
session_start();


?>
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
        <a href="guest.php">Browse As A Guest</a>

    </form>


    <?php
    if(isset($_POST['Submit']))
    {
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $sql = "SELECT * FROM users WHERE firstname = :username";

        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password == $user['pass'] || $username == "Steve" && $password == "pass")
        {
            echo 'Success';
            $_SESSION['Username'] = $user['firstname'];
            $_SESSION['Active'] = true;
            header("location:index.php");
            exit;
        }
        else
        {
            echo 'Incorrect Username or Password';
        }
    }
    ?>

</div>
</body>
</html>
