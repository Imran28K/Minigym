<?php require("NavBar.php");
include_once("staffLoginSQL.php");
$errorid = $errorPassword = "";
$allFields = "yes";

if (isset($_POST['submit'])) {
    if (!isset($_POST['id'])) {
        $errorUsername = "User ID is mandatory";
        $allFields = "no";
    }
    if (!isset($_POST['pwd'])) {
        $errorPassword = "Password is mandatory";
        $allFields = "no";
    }
    if ($allFields == "yes") {
        $loginResult = login($_POST['id'], $_POST['pwd']);
        if ($loginResult) {

            session_start();
            $_SESSION['id'] = $_POST['id'];
            
            header('Location: staffmanagerProfile.php');
        } else {
            $errorUsername = "Invalid username or password";
            $errorPassword = "Invalid username or password";
        }
    }
}

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"> <strong>Staff or Manager Login</strong> </h2>

        <div class="row">
            <div class="mx-auto" style="width: 190px;">
                <form method="post">
                    <div class="form-group col-md-14">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" type="text" name="id">
                        <span class="text-danger"><?php echo $errorid; ?></span>
                    </div>

                    <div class="form-group col-md-14">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="password" name="pwd">
                        <span class="text-danger"><?php echo $errorPassword; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
                <a href="customerLogin.php">A Customer?</a>
            </div>
        </div>


    </main>
</div>

<?php require("Footer.php"); ?>