<?php require("NavBar.php");
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $datebirth = $_POST['datebirth'];
    $email = $_POST['email'];
    $postcode = $_POST['postcode'];
    $password = $_POST['password'];
    

    // Validate the form data
    $errors = array();
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    if (empty($datebirth)) {
        $errors[] = "Date of birth is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($postcode)) {
        $errors[] = "Postcode is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, redirect to the database insertion file, passing the form data as query parameters
    if (empty($errors)) {
        // Generate a username using the first 3 letters of the first name, the last 2 letters of the last name, and 2 random digits
        $username = substr($fname, 0, 3) . substr($lname, -2) . rand(10, 99);

        $membership = "Unavailable";

        $status = "Pending";

        $request = "None";
        

        header("Location: customerCreateSQL.php?username=$username&fname=$fname&lname=$lname&datebirth=$datebirth&email=$email&postcode=$postcode&password=$password&membership=$membership&status=$status&request=$request");
        exit;
    }
}


?>

<div class="container bgColor">
	<main role="main" class="pb-3">
		<style>
			.form-wrapper{
				width: 200px;
				margin: 0 auto;
			}

		</style>
		<h2 style="font-family: 'Trebuchet MS', sans-serif;"><strong>Create Account</strong></h2>
		<div class="form-wrapper">
			<form method="post" action="customerCreate.php">
				First Name: <input type="text" name="fname"><br>
				Last Name: <input type="text" name="lname"><br>
				Date of Birth: <input type="date" name="datebirth"><br>
				Email: <input type="email" name="email"><br>
				Postcode: <input type="text" name="postcode"><br>
				Password: <input type="password" name="password"><br>
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
    
}

?>






<?php require("Footer.php"); ?>