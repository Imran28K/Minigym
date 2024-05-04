<?php require("NavBar.php");
include_once("customerLoginSQL.php");
$errorUsername = $errorPassword = "";
$allFields = "yes";

if (isset($_POST['submit'])) {
    if (!isset($_POST['username'])) {
        $errorUsername = "Username is mandatory";
        $allFields = "no";
    }
    if (!isset($_POST['password'])) {
        $errorPassword = "Password is mandatory";
        $allFields = "no";
    }
    if ($allFields == "yes") {
        $loginResult = login($_POST['username'], $_POST['password']);
        if ($loginResult) {

            session_start();
            $_SESSION['username'] = $_POST['username'];

            header('Location: customerProfile.php');
        } else {
            $errorUsername = "Invalid username or password";
            $errorPassword = "Invalid username or password";
        }
    }
}
if (isset($_GET['forgotPassword.php'])) {
    session_destroy();
}

?>


<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"><strong>Customer Login</strong></h2>

        
        <div class="row">
            <div class="mx-auto" style="width: 190px;">
                <form method="post">
                    <div class="form-group col-md-14">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name="username">
                        <span class="text-danger"><?php echo $errorUsername; ?></span>
                    </div>

                    <div class="form-group col-md-14">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="password" name="password">
                        <span class="text-danger"><?php echo $errorPassword; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
        
                <a href="customerCreate.php">Create Account?</a><br>
                <a href="forgotPassword.php">Forgot Password?</a>
            </div>
        </div>
        
        



    </main>
</div>

<?php require("Footer.php"); ?>