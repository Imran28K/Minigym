<?php require("NavBar.php");

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Password Changed Successfully!</h2>
        <style>
            .backtologinbutton {
                background-color: transparent;
                color: darkslategrey;
                padding: 6px;
                border: 2px solid darkslategray;
                display: inline-block;
                width: 300px;
                height: 100px;

            }

            .backtologinbutton:hover {
                background-color: darkslategray;
                color: lightgreen;
            }
        </style>

        <form action="customerLogin.php">
            <button class="backtologinbutton">Back to Login</button>
        </form>

    </main>
</div>

<?php require("Footer.php"); ?>