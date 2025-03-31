<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../src/DBconnect.php';
        $new_user = array(
            "firstname" => escape($_POST['firstname']),
            "email" => escape($_POST['email']),
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
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
require "templates/header.php";
if (isset($_POST['submit']) && $statement){
    echo $new_user['firstname']. ' successfully added';
}
?>

<h2>Add a user</h2>
<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
