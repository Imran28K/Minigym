<?php require("NavBar.php");


// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

session_start();
$username = $_SESSION['username'];


// Select the customer record to be updated
$sql = "SELECT * FROM customer WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE customer SET password = :password WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

    $stmt->execute();

    header('Location: successpwdChange.php');
}

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Update User Info</h2>
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">New Password</label>
                        <input class="form-control" type="text" name="password" value="<?php echo $arrayResult[0][6]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <form action="successpwdChange.php">
                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>

                </form>


    </main>
</div>

<?php require("Footer.php"); ?>