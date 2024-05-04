<?php
require("NavBar.php");

$result = $_GET['createCustomer']; //you can also use $_REQUEST[''] do reseach whats the difference!
?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>User Creation Result</h2><br>

        <div>
            <?php
            if ($result) {
                echo "A user successfully created";
            } else {
                echo "Error";
            }
            ?>
            <div><a href="customerCreate.php">Back</a></div>
        </div>
</div>

<?php


require("Footer.php");

?>