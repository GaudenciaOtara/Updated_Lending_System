<?php
session_start();
Require '../Functions/connect.php';
Require 'checksession.php';
 
if (isset($_SESSION['user'])){
$var_session=$_SESSION["user"];

$user_query = mysqli_query($conn,"select * from lender_reg where email='$var_session'");
$user_data = mysqli_fetch_assoc($user_query);
 

?>


 

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="agentdetails.css">

    <title>Lender Panel</title>
</head>
<body>
    
    <div class="side-menu">
        <div class="brand-name">
            <h1>LENDER</h1>
        </div>
        <ul>
        <li><a href="lender.php"><img src="./Images/dashboard.png" alt="#" >&nbsp; <span>Dashboard</span></a></li>
            <li><a href="details.php"><img src="./Images/circle-user.png" alt="#" >&nbsp; <span>Details</span> </a></li>
            <li><a href="agentdetails.php"><img src="./Images/users-alt.png" alt="#" >&nbsp;<span>Agents</span></a> </li>
            <li> <a href="profit.php"><img src="./Images/earnings.png" alt="#" > &nbsp;<span>Profit</span></a></li>
            <li><a href="reports.php"><img src="./Images/notes-medical.png" alt="#" > &nbsp;<span>Reports</span></a></li>
            <li><a href="settings.php"><img src="./Images/dashboard.png" alt="#" > &nbsp;<span>Settings</span></a></li>
        </ul>
    </div>
    <div class="container">
      
        <div class="header">
            <div class="nav">
                <div class="search">
                 
                    <img src="./images/dashboard.png" alt="">
                    <h2>Profit</h2>
                
                </div>
                
            </div>
        </div>
     
        <table>
        <thead>
            <td>ID</td>
            <td>Lent Amount</td>
            <td>Unique Code</td>
            <td>Time Allocated</td>
            <td>Profit Returned</td>
        </thead>
        <?php
        $id_count = 1; 
 $state = $conn->prepare("SELECT * FROM lender_transactions WHERE lender_id={$user_data['id']}");
 $state->execute();
 $res= $state->get_result();

    

while ($rows = $res->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $id_count; ?></td>
            <td><?php echo $rows['lent_amount']; ?></td>
            <td><?php echo $rows['unique_code']; ?></td>
            <td><?php echo $rows['time_allocated']; ?></td>
           <td> <button class="view-button btn btn-primary" data-toggle="modal" data-target="#detailsModal" data-unique-code="<?php echo $rows['unique_code']; ?>">View</button></td>

        </tr>
        <?php

$id_count++; 
}
?>

<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Modal content will be loaded here dynamically -->
            </div>
        </div>
    </div>
</div>

<script>
    var viewButtons = document.getElementsByClassName("view-button");
    for (var i = 0; i < viewButtons.length; i++) {
        viewButtons[i].addEventListener("click", function () {
            var uniqueCode = this.getAttribute("data-unique-code");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("modalBody").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_details.php?unique_code=" + uniqueCode, true);
            xhttp.send();
        });
    }
</script>

    </table> 
 
</body>
</html>
<?php
    }
    else {
        echo "<script>
                location.replace('login.php');
            </script>";
    }
 
 ?>