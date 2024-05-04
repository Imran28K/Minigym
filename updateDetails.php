<?php

require("NavBar.php");
session_start();
$username = $_SESSION['username'];
// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

// Select the customer record to be updated
$sql = "SELECT * FROM customer WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while($row = $result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit'])){
    // Update the customer record with the new values
    $sql = "UPDATE customer SET fname = :fname, lname = :lname, datebirth = :datebirth, email = :email, postcode = :postcode, password = :password WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':datebirth', $_POST['datebirth'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    

    $stmt->execute();

    header('Location: customerProfile.php?updated=1');
}

?>

<div class="container bgColor">
    <main role="main" class="pb-5">
        <h2>Update Info</h2>
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $arrayResult[0][0]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name="fname" value="<?php echo $arrayResult[0][1]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname" value="<?php echo $arrayResult[0][2]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Date Of Birth</label>
                        <input class="form-control" type="text" name = "datebirth" value="<?php echo $arrayResult[0][3]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Email</label>
                        <input class="form-control" type="text" name = "email" value="<?php echo $arrayResult[0][4]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode" value="<?php echo $arrayResult[0][5]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="text" name = "password" value="<?php echo $arrayResult[0][6]; ?>">
                   </div>

                   

                   
                   

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="customerProfile.php">Back</a></div>
                </form>
            </div>
        </div>

		
		</main>
	</div>

<?php require("Footer.php");?>