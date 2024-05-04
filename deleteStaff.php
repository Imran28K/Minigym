<?php require("NavBar.php");

if (isset($_POST['delete'])){

    $db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

    $stmt = "DELETE FROM staff WHERE id = :id";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':id', $_POST['id'], SQLITE3_TEXT);

    $sql->execute();
    header("Location:viewStaff.php?deleted=true");
}

$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');
$sql = "SELECT id, fname, lname, email FROM staff WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], SQLITE3_TEXT);
$result= $stmt->execute();

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}


?>
<div class="container bgColor">
    	<main role="main" class="pb-3">
        <h2>Delete User for <?php echo $_GET['id'];?></h2><br>
    <h4 style="color: red;">Are you sure want to delete this user?</h4><br>
    
    <div class="row">
        <div class="col-md-2">
            <label style="font-size: 20px; color:blue; font-weight: bold;">ID</label>
        </div>
        <div class="col-md-6">
            <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
        </div>
        <div class="col-md-6">
            <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
        </div>
        <div class="col-md-6">
            <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label style="font-size: 20px; color:blue; font-weight: bold;">Email</label>
        </div>
        <div class="col-md-6">
            <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
        </div>
    </div>

    <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="id" value = "<?php echo $_GET['id'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="viewStaff.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>

		
		</main>
	</div>

<?php require("Footer.php");?>