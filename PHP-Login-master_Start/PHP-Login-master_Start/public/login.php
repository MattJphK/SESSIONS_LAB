<?php require_once('../template/header.php'); ?>
<?php require_once('config.php'); //were the username and password are stored ?>
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
    /*if(isset($_POST['Submit']))
    {

        /* Check if the form's username and password matches */
        /* these currently check against variable values stored in config.php but later we will see how these can be checked against information in a database*/
        /*if( ($_POST['Username'] == $Username) && ($_POST['Password'] == $Password) )
        {
            echo 'Success';
        }
        else
            echo 'Incorrect Username or Password';
    }*/

    if( ($_POST['Username'] == $Username) && ($_POST['Password'] == $Password) )
    {
        echo 'Success';
        /* Success: Set session variables and redirect to protected page */
        $_SESSION['Username'] = $Username;
        $_SESSION['Active'] = true; //remember we can call a session what we like e.g. $_SESSION["newsession"]=$value;
        header("location:index.php"); /* 'header() is used to redirect the browser */
        exit; //weve just used header() to redirect to another page but we must terminate all current code so that it doesnt reun when we redirect
    }
    else
        echo 'Incorrect Username or Password';

    ?>

</div>
</body>
</html>
