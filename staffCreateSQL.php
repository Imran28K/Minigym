<?php require("NavBar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\web coursework\\miniGym.db";

// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$id = $_GET['id'];
$fnamestaff = $_GET['fname'];
$lnamestaff = $_GET['lname'];
$emailstaff = $_GET['email'];
$statusstaff = $_GET['status'];
$role = $_GET['role'];
$pwd = $_GET['pwd'];


// Insert the data into the customer table
$sql = "INSERT INTO staff (id, fname, lname, email, status, role, pwd) VALUES ('$id', '$fnamestaff', '$lnamestaff', '$emailstaff', '$statusstaff', '$role', '$pwd')";
$conn->exec($sql);

// Close the connection
$conn->close();

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have sucessfully created an account for staff</h1>
        <h2>Staff username is <?php echo $id ?> </h2>

        <?php echo '<form action="staffLogin.php" method="post">' ?> 
        <?php echo '<input type="submit" value="Login to your new account">' ?>
        <?php echo '</form>'?>

    </main>
</div>

<?php require("Footer.php"); ?>