<?php

require("NavBarAccount.php");

// Define the login() function
function login($id)
{
    $db = new sqlite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');
    $query = "SELECT * FROM staff WHERE id = '$id'";
    $result = $db->query($query);


    while ($row = $result->fetchArray()) {
        // Print out the data for the specific row
        // Replace the table row element with a div element
        echo "<div class='content'>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>ID</div>";
        echo "<div class='profile-value'>" . $row['id'] . "</div>";
        echo "</div>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>First Name</div>";
        echo "<div class='profile-value'>" . $row['fname'] . "</div>";
        echo "</div>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>Last Name</div>";
        echo "<div class='profile-value'>" . $row['lname'] . "</div>";
        echo "</div>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>Email</div>";
        echo "<div class='profile-value'>" . $row['email'] . "</div>";
        echo "</div>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>Status</div>";
        echo "<div class='profile-value'>" . $row['status'] . "</div>";
        echo "</div>";
        echo "<div class='profile-row'>";
        echo "<div class='profile-label'>Role</div>";
        echo "<div class='profile-value'>" . $row['role'] . "</div>";
        echo "</div>";

        if ($row['status'] == "Active") {

            if ($row['role'] == "Staff") {
                
                echo "<div class='buttonposition1'>";
                echo "<form action='customerCreate.php'>";
                echo "<button class='createcustomersbutton'>Create Customer</button>";
                echo "</form>";
                echo "</div>";

                echo "<div class='buttonposition'>";
                echo "<form action='viewCustomer.php'>";
                echo "<button class='managecustomersbutton'>Manage Customers</button>";
                echo "</form>";
                echo "</div>";
            } else {
                
                echo "<div class='buttonposition1'>";
                echo "<form action='staffCreate.php'>";
                echo "<button class='createcustomersbutton'>Create<br> Staff</button>";
                echo "</form>";
                echo "</div>";

                echo "<div class='buttonposition'>";
                echo "<form action='viewStaff.php'>";
                echo "<button class='managecustomersbutton'>Manage Staff</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<div class='info-box'>";
            echo "<p style='color: red;'>";
            echo "<strong>Your account is currently closed.<br> Please speak with your manager.</strong>";
            echo "</p>";
            echo "</div>";
        }
    }
}

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$id = $_SESSION['id'];

?>
<style>
    .profile-row {
        display: flex;
        flex-wrap: wrap;
    }

    .profile-label {
        width: 30%;
        font-weight: bold;
        font-family: 'Trebuchet MS', sans-serif;
        font-size: 20px;
        color: lightgreen;
        padding-left: 20px;
    }

    .profile-value {
        width: 70%;
        font-size: 20px;
        color: lightgreen;
        padding-left: 20px;
    }

    .content {
        border: 8px solid lightskyblue;
        width: 500px;
        background-color: darkslategray;
    }

    .button {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
    }

    .button:hover {
        background-color: darkslategray;
        color: white;
    }

    .space {
        margin: 10px;
    }

    .buttonposition {
        position: absolute;
        right: 250px;
        top: 10px;
    }

    .buttonposition1 {
        position: absolute;
        right: 400px;
        top: 10px;
    }

    .managecustomersbutton {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
        display: inline-block;
        width: 100px;
        height: 100px;

    }

    .managecustomersbutton:hover {
        background-color: darkslategray;
        color: lightgreen;
    }

    .info-box {
        color: red;
        background-color: yellow;
        position: relative;
        right: -100px;
        width: 230px;
        height: 100px;
    }

    .createcustomersbutton {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
        display: inline-block;
        width: 100px;
        height: 100px;
    }

    .createcustomersbutton:hover {
        background-color: darkslategray;
        color: lightgreen;
    }
</style>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"><strong>Welcome <?php echo $id ?>!</strong></h2>

        <div class="row">
            <div class="col-12">
        
                <?php login($id); ?>
            </div>
        </div>
    </main>
</div>

<?php

// Close the session
session_write_close();

require("Footer.php");

?>