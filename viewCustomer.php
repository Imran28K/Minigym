<?php require("NavBar.php");
include_once("viewCustomerSQL.php");
$user = getUsers();



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
        <h2 style="font-family: 'Trebuchet MS', sans-serif;"> <strong>View Customer</strong> </h2>
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
                        <td>Username</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>DOB</td>
                        <td>Email</td>
                        <td>Postcode</td>
                        <td>Password</td>
                        <td>Membership</td>
                        <td>Status</td>
                        <td>Request</td>
                        <td>Actions</td>
                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['username']; ?></td>
                            <td><?php echo $user[$i]['fname'] ?></td>
                            <td><?php echo $user[$i]['lname'] ?></td>
                            <td><?php echo $user[$i]['datebirth'] ?></td>
                            <td><?php echo $user[$i]['email'] ?></td>
                            <td><?php echo $user[$i]['postcode'] ?></td>
                            <td><?php echo $user[$i]['password'] ?></td>
                            <td><?php echo $user[$i]['membership'] ?></td>
                            <td><?php echo $user[$i]['status'] ?></td>
                            <td><?php echo $user[$i]['request'] ?></td>
                            <td>
                                <form action="updateCustomer.php" method="get">
                                    <input type="hidden" name="username" value="<?php echo $user[$i]['username']; ?>">
                                    <button type="submit" class="buttonfortable">Update</button>
                                </form>

                                <form action="deleteCustomer.php" method="get">
                                    <input type="hidden" name="username" value="<?php echo $user[$i]['username']; ?>">
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