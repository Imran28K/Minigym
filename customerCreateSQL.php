<?php require("NavBar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\web coursework\\miniGym.db";

// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$username = $_GET['username'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$datebirth = $_GET['datebirth'];
$email = $_GET['email'];
$postcode = $_GET['postcode'];
$password = $_GET['password'];
$membership = $_GET['membership'];
$status = $_GET['status'];
$request = $_GET['request'];

// Insert the data into the customer table
$sql = "INSERT INTO customer (username, fname, lname, datebirth, email, postcode, password, membership, status, request) VALUES ('$username', '$fname', '$lname', '$datebirth', '$email', '$postcode', '$password', '$membership', '$status', '$request')";
$conn->exec($sql);

// Close the connection
$conn->close();

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have sucessfully created an account</h1>
        <h2>Your username is <?php echo $username ?> </h2>

        <?php echo '<form action="customerLogin.php" method="post">' ?> 
        <?php echo '<input type="submit" value="Login to your new account">' ?>
        <?php echo '</form>'?>

    </main>
</div>

<?php require("Footer.php"); ?>