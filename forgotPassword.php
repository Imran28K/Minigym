<?php require("NavBar.php");


// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $postcode = $_POST['postcode'];
    $email = $_POST['email'];
    $datebirth = $_POST['datebirth'];

    // Check if the record exists in the database
    $query = "SELECT * FROM customer WHERE username='$username' AND postcode='$postcode' AND email='$email' AND datebirth='$datebirth'";
    $result = $db->query($query);
    if ($result->fetchArray()) {
        // Record exists, redirect to the success page
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("Location: changePassword.php");
        exit;
    } else {
        // Record does not exist, show an error message
        echo "Invalid record. Please try again.";
    }
}

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <style>
            .form-wrapper {
                width: 200px;
                margin: 0 auto;
            }
        </style>

        <h2 style="font-family: 'Trebuchet MS', sans-serif;"> <strong>Verification</strong> </h2>

        <div class="form-wrapper">
            <form method="post" action="">
                Username: <input type="text" name="username"><br>
                Postcode: <input type="text" name="postcode"><br>
                Email: <input type="text" name="email"><br>
                Date of Birth: <input type="date" name="datebirth"><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

    </main>
</div>

<?php require("Footer.php"); ?>