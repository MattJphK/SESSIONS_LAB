<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../src/DBconnect.php';
        $new_user = array(
            "firstname" => escape($_POST['firstname']),
            "pass" => escape($_POST['pass']),
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit']) && $statement){
    echo $new_user['firstname']. ' successfully added';
}
?>
<link rel="stylesheet" type="text/css" href="../css/signin.css">
<h2>Add a user</h2>
<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <label for="pass">Password</label>
    <input type="text" name="pass" id="pass">
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>

