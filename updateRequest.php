<?php

require("NavBarAccount.php");
session_start();
$username = $_SESSION['username'];
// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\web coursework\\miniGym.db');

// Select the customer record to be updated
$sql = "SELECT * FROM customer WHERE username = :username LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE customer SET request = :request WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':request', $_POST['request'], SQLITE3_TEXT);

    $stmt->execute();

    header('Location: customerProfile.php?submit=true');
}





?>
<style>
    .membership-container {
        display: flex;
        position: relative;
        top: -130px;
        float: right;
    }

    .membership-type {
        width: 100%;
        border: 6px solid gray;
        border-radius: 10px;
        background-color: #333333;
        color: white;
        padding: 20px;
        font-family: sans-serif;
        margin: 20px;
    }

    .membership-type h2 {
        color: #00FF00;
    }
</style>

<div class="container bgColor">
    <main role="main" class="pb-5">
        <h2>Select Option to Buy</h2>
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Request</label>
                        <select name="request" class="form-control">
                            <option value="None" <?php echo ($arrayResult[0][9] == "None") ? "selected" : ""; ?>>None</option>
                            <option value="DayPasses" <?php echo ($arrayResult[0][9] == "DayPasses") ? "selected" : ""; ?>>DayPasses</option>
                            <option value="Monthly" <?php echo ($arrayResult[0][9] == "Monthly") ? "selected" : ""; ?>>Monthly</option>
                        </select>
                    </div>

                    <input class="btn btn-primary" type="submit" name="submit" value="Buy">

                </form>
            </div>
        </div>

        <div class="membership-container">
            <div class="membership-type">
                <h2>Day Passes</h2>
                <p>£5.50</p>
                <ul>
                    <li>One-off visit</li>
                    <li>Multi-gym access with one pass</li>
                    <li>Good for newcomers</li>
                    <li>Only valid within 1 week of purchasing</li>
                </ul>
                

            </div>
            <div class="membership-type">
                <h2>Monthly</h2>
                <p>£13.50</p>
                <ul>
                    <li>Unlimited access to gym every month</li>
                    <li>Extra reward for a year of subscription</li>
                    <li>High value</li>
                    <li>Free drinks every post workout</li>
                </ul>

            </div>
        </div>

    </main>
</div>

<?php require("Footer.php"); ?>