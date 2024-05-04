<?php require("NavBar.php");
include_once("viewStaffSQL.php");
$user = getStaff();



?>

<style>
    .buttonfortable {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
        display: inline-block;
        width: 100px;
        height: 40px;
    }

    .buttonfortable:hover {
        background-color: darkslategray;
        color: lightgreen;
    }
</style>




<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"> <strong>Manage Staff</strong> </h2>
        <br>

        <?php if (isset($_GET['deleted'])) : ?>
            <div class="alert alert-success col-15" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>



        <div class="row">
            <div class="col-14">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>Role</td>
                        <td>Password</td>
                        <td>Actions</td>
                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['id']; ?></td>
                            <td><?php echo $user[$i]['fname'] ?></td>
                            <td><?php echo $user[$i]['lname'] ?></td>
                            <td><?php echo $user[$i]['email'] ?></td>
                            <td><?php echo $user[$i]['status'] ?></td>
                            <td><?php echo $user[$i]['role'] ?></td>
                            <td><?php echo $user[$i]['pwd'] ?></td>
                            <td>
                                <form action="updateStaff.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $user[$i]['id']; ?>">
                                    <button type="submit" class="buttonfortable">Update</button>
                                </form>

                                <form action="deleteStaff.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $user[$i]['id']; ?>">
                                    <button type="submit" class="buttonfortable">Delete</button>
                                </form>


                            </td>


                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>
    </main>
</div>

<?php require("Footer.php"); ?>