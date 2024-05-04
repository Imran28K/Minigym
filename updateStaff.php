<?php

require("NavBar.php");

// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

// Select the customer record to be updated
$sql = "SELECT * FROM staff WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while($row = $result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit'])){
    // Update the customer record with the new values
    $sql = "UPDATE staff SET fname = :fname, lname = :lname, email = :email, status = :status, role = :role WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['id'], SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':status', $_POST['status'], SQLITE3_TEXT);
    $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);
    

    $stmt->execute();

    header('Location: viewStaff.php?updated=1');
}

?>

<div class="container bgColor">
    <main role="main" class="pb-5">
        <h2>Update Staff info</h2>
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">ID</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $arrayResult[0][0]; ?>">
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
                        <label class="control-label labelFont">Email</label>
                        <input class="form-control" type="text" name = "email" value="<?php echo $arrayResult[0][3]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Status</label>
                        <select name="status" class="form-control">
                           <option value="Active" <?php echo ($arrayResult[0][4]=="Active") ? "selected" : ""; ?>>Active</option>
                           <option value="Closed" <?php echo ($arrayResult[0][4]=="Closed") ? "selected" : ""; ?>>Closed</option>
                        </select>
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Role</label>
                        <select name="role" class="form-control">
                           <option value="Manager" <?php echo ($arrayResult[0][5]=="Manager") ? "selected" : ""; ?>>Manager</option>
                           <option value="Staff" <?php echo ($arrayResult[0][5]=="Staff") ? "selected" : ""; ?>>Staff</option>
                           
                        </select>
                   </div>

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="viewStaff.php">Back</a></div>
                </form>
            </div>
        </div>

		
		</main>
	</div>

<?php require("Footer.php");?>