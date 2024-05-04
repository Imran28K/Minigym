<?php require("NavBar.php");

?>


<div class="container bgColor">
    <main role="main" class="pb-3">
        <style>
            .membership-container {
                display: flex;
                
            }

            .membership-type {
                width: 50%;
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

            .middle {
                text-align: center;
                font-family: 'Trebuchet MS', sans-serif;

            }

            
        </style>


        <h1 class="middle"><strong>Mini Gym</strong></h1>
        <h2 class="middle">The Mini Gym is a network of gyms, pools, spas and health and fitness apps. With one pass, you can access fitness in exactly the way you want.</h2>


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
                <form action="customerLogin.php">
                    <input type="submit" value="Sign in to buy">
                </form>
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
                <form action="customerLogin.php">
                    <input type="submit" value="Sign in to buy">
                </form>
            </div>
        </div>


    </main>
</div>

<?php require("Footer.php"); ?>