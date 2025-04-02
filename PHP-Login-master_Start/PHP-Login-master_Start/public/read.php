<?php
require_once '../template/guestHeader.php';

if (isset($_POST['submit'])) {
    try {
        require "../common.php";
        require_once '../src/DBconnect.php';
        $firstname = $_POST['firstname'];
        $sql = "SELECT * FROM users WHERE firstname= :firstname";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}

if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) {
        ?>
        <h2>Results</h2>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["id"]); ?></td>
                    <td><?php echo escape($row["firstname"]); ?></td>
                    <td><?php echo escape($row["pass"]); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No users found with the username: <?php echo escape($firstname); ?>.</p>
    <?php }
} ?>


    <h2>Show Users</h2>
    <form method="post">
        <label for="firstname">Search Users by Firstname</label>
        <input type="text" name="firstname" id="firstname" value="">
        <input type="submit" name="submit" value="View">
    </form>
    <a href="guest.php">Back to home</a>
<?php require "../template/footer.php"; ?>