<?php require_once '../template/guestHeader.php';?>
<title>Guest page</title>
</head>


<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="freePage.php">Free</a></li>
                <li><a href="./registration.php">register</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">GUEST PAGE</h3>
    </div>

    <div class="mainarea">
        <h1>Do you Wish to Login?</h1>
        <p class="lead">Login to get full access to the website</p>

        <form action="login.php" method="post" name="Logout_Form" class="form-signin">
            <button name="Submit" value="Logout" class="button" type="submit">Login</button>
        </form>
    </div>


    <div class="row marketing">
        <div>
            <h4>Guest Page</h4>
            <p>Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. </p>

        </div>

        <?php require_once '../template/footer.php';?>
