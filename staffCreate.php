<?php require("NavBar.php");
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $fnamestaff = $_POST['fname'];
    $lnamestaff = $_POST['lname'];
    $emailstaff = $_POST['email'];
    $pwd = $_POST['pwd'];



    // Validate the form data
    $errors = array();
    if (empty($fnamestaff)) {
        $errors[] = "First name is required";
    }
    if (empty($lnamestaff)) {
        $errors[] = "Last name is required";
    }
    if (empty($emailstaff)) {
        $errors[] = "Email is required";
    }
    if (empty($pwd)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, redirect to the database insertion file, passing the form data as query parameters
    if (empty($errors)) {
        // Generate a username using the first 3 letters of the first name, the last 2 letters of the last name, and 2 random digits
        $id = substr($fnamestaff, 0, 1) . substr($lnamestaff, -1) . rand(10, 99);

        $statusstaff = "Closed";

        $role = "Staff";




        header("Location: staffCreateSQL.php?id=$id&fname=$fnamestaff&lname=$lnamestaff&email=$emailstaff&pwd=$pwd&status=$statusstaff&role=$role");
        exit;
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
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"> <strong>Create Staff Account</strong> </h2>
        <div class="form-wrapper">
            <form method="post" action="staffCreate.php">
                First Name: <input type="text" name="fname"><br>
                Last Name: <input type="text" name="lname"><br>
                Email: <input type="email" name="email"><br>
                Password: <input type="password" name="pwd"><br>
                <input type="submit" name="submit" value="Create Account">
            </form>
            <a href="customerLogin.php">Already have an account?</a>
        </div>


    </main>
</div>

<?php

// If there are errors, display them
if (!empty($errors)) {
    echo "<script>alert('Please fill in all information');</script>";
    echo "<span style='color:red;'>Please fill in all information</span>";
}

?>






<?php require("Footer.php"); ?>