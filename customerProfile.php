<?php

require("NavBarAccount.php");

// Define the login() function
function login($username)
{
  $db = new sqlite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');
  $query = "SELECT * FROM Customer WHERE username = '$username'";
  $result = $db->query($query);


  while ($row = $result->fetchArray()) {
    // Print out the data for the specific row
    // Replace the table row element with a div element
    echo "<div class='content'>";
    echo "<div class='profile-row'>";
    echo "<div class='profile-label'>Username</div>";
    echo "<div class='profile-value'>" . $row['username'] . "</div>";
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
    echo "<div class='profile-label'>Date Of Birth</div>";
    echo "<div class='profile-value'>" . $row['datebirth'] . "</div>";
    echo "</div>";
    echo "<div class='profile-row'>";
    echo "<div class='profile-label'>Email</div>";
    echo "<div class='profile-value'>" . $row['email'] . "</div>";
    echo "</div>";
    echo "<div class='profile-row'>";
    echo "<div class='profile-label'>Postcode</div>";
    echo "<div class='profile-value'>" . $row['postcode'] . "</div>";
    echo "</div>";
    echo "<div class='profile-row'>";
    echo "<div class='profile-label'>Membership</div>";
    echo "<div class='profile-value'>" . $row['membership'] . "</div>";
    echo "</div>";
    echo "<div class='profile-row'>";
    echo "<div class='profile-label'>Status</div>";
    echo "<div class='profile-value'>" . $row['status'] . "</div>";
    echo "</div>";
    echo "</div>";
  }
  echo "<h1></h1>";
  echo "<div style='display: flex'>";
  echo "<form action='updateRequest.php'>";
  echo "<button class='button'>Buy Membership</button>";
  echo "</form>";

  echo "<form action='updateDetails.php'>";
  echo "<button class='button'>Update Info</button>";
  echo "</form>";
  echo "</div>";
}

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];

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
    border: 6px solid gray;
    width: 500px;
    background-color: darkslategray;

  }

  .button {
    background-color: transparent;
    color: darkslategrey;
    padding: 6px;
    border: 2px solid darkslategray;
    width: 150px;
    height: 50px;
  }

  .button:hover {
    background-color: darkslategray;
    color: white;
  }

  .space {
    margin: 10px;
  }
</style>

<div class="container bgColor">
  <main role="main" class="pb-3">

    <?php if (isset($_GET['submit'])) : ?>
      <div class="alert alert-success col-15" role="alert" style="font-weight: bold;">
        Purchase was succesful, please wait for at least 24 hours for your membership status to be updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <h2 style="font-family: 'Trebuchet MS', sans-serif;"><strong> Welcome <?php echo $username ?>!</strong> </h2>


    <div class="row">
      <div class="col-12">
        <!-- Replace the table element with a series of div elements -->
        <?php login($username); ?>
      </div>
    </div>
  </main>
</div>

<?php

// Close the session
session_write_close();

require("Footer.php");

?>