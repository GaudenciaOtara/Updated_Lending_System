<?php
session_start();
Require '../Functions/connect.php';
Require 'checksession.php';
// check_session();
if (isset($_SESSION['user'])){
    
$var_session=$_SESSION["user"];

$user_query = mysqli_query($conn,"select * from lender_reg where email='$var_session'");
$user_data = mysqli_fetch_assoc($user_query);
$lender_id=$user_data['id'];
$lender_transactions = mysqli_query($conn,"select * from lender_transactions where id='$lender_id'");
$lender_trans = mysqli_fetch_assoc($lender_transactions);
$updated_details = mysqli_query($conn, "SELECT * FROM lender_transactions WHERE lender_id={$user_data['id']}");
$updated_commision = mysqli_query($conn, "SELECT * FROM agent_commision WHERE lender_id={$user_data['id']}");
$sum = 0;
while ($row = mysqli_fetch_assoc($updated_details)) {
    $sum += $row['lent_amount'];
}
$comm = 0;
while ($row = mysqli_fetch_assoc($updated_commision)) {
    $comm += $row['commision'];
}
$updated_returns = mysqli_query($conn, "SELECT * FROM agent_returns WHERE lender_id={$user_data['id']}");
$returns = 0;
while ($rowss= mysqli_fetch_assoc($updated_returns)) {
    $returns += $rowss['total_amount'];
}
$lender_id = $user_data['id'];

$sql = "SELECT SUM(amount) AS balance
        FROM top_up
        WHERE lender_id = '$lender_id'";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $balance = $row['balance'];
} else {
    echo "Error executing query: " . $conn->error;
}

$updated_balance = $balance - $sum+$returns-$comm;

$updates = "UPDATE lender_reg
            SET updated_balance = $updated_balance
            WHERE id = '$lender_id'";

if ($conn->query($updates) === TRUE) {
     
} else {
    echo "Error updating table: " . $conn->error;
}


if (isset($_POST['commision_send'])){
  $lender_id=$_POST['lender_id'];
  $agent_acc_no = $_POST['agent_account_number'];
  $unique_code = $_POST['unique_code'];
  $commision = $_POST['commision'];
  // $ID = $_POST['customer_id'];
  echo $commision;
echo $agent_acc_no;
echo $unique_code;
  $statement= $conn->prepare("INSERT into agent_commision (agent_account_number,unique_code,commision,lender_id) VALUES (?,?,?,?)");
  $statement->bind_param("isdi",$agent_acc_no,$unique_code,$commision,$lender_id);
  $statement->execute();
  $statement->close();
  header("Location: ./index.php");
  exit();
}
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

    <title>Lender Panel</title>
</head>
<body>
    
    <div class="side-menu">
        <div class="brand-name">
            <h1>LENDER</h1>
        </div>
        <ul>
            <li><img src="./Images/dashboard.png" alt="#" >&nbsp; <span>Dashboard</span></li>
            <li><a href="details.php"><img src="./Images/circle-user.png" alt="#" >&nbsp; <span>Details</span> </a></li>
            <li><img src="./Images/users-alt.png" alt="#" >&nbsp;<span>Agents</span> </li>
            <li> <img src="./Images/earnings.png" alt="#" > &nbsp;<span>Profit</span></li>
            <li><img src="./Images/notes-medical.png" alt="#" > &nbsp;<span>Reports</span></li>
            <li><a href="settings.php"><img src="./Images/dashboard.png" alt="#" > &nbsp;<span>Settings</span></a></li>
        </ul>
    </div>
    <div class="container">
      
        <div class="header">
            <div class="nav">
                <div class="search">
                    
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="./Images/search.png"alt=""></button>
                    
                    
                </div>
                <div class="user">
                    <a href="#" class="btn">Add New</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="cards">
                <div class="cards">
                    <div class="box">

                    <div class="icon-class">
                        <img src="./Images/sack-dollar.png" alt="">
                    </div>

                    <div class="Balance">
                        <input type="text" placeholder="<?php echo $user_data['updated_balance'];?>" value="<?php echo $user_data['updated_balance'];?>" readonly>
                        <h3> Account Balance</h3>
                        </div>
                       

                    </div>
                </div>
                <div class="cards">
                    <div class="box">

                    <div class="icon-class">
                        <img src="./Images/address-book.png" color= "blue" alt="">
                    </div>

                    <div class="Balance">
                        <input type="text" placeholder="+254 7...">
                        <h3> Agent's Mpesa No</h3>
                        </div>
                       

                    </div>
                </div>
                
                <div class="cards">
                    <div class="box">

                    <div class="icon-class">
                        <img src="./Images/sort-amount-down-alt.png" alt="">
                    </div>

                    <div class="Balance">
                        <input type="text" placeholder="Ksh. ..">
                        <h3> Amount to Lend</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="cards">
                    <div class="box">

                    <div class="icon-class-1">
                    <button id="topUpButton" data-toggle="modal" data-target="#topUpModal" class="btn">Top Up</button>
                    </div><br>

<!-- TOP UP Bootstrap Modal -->
<div class="modal fade" id="topUpModal" tabindex="-1" role="dialog" aria-labelledby="topUpModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="topUpModalLabel">Top Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="topUpForm" action="../PAYMENT/process_topup.php" method="POST">
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" class="form-control" id="amount" name="amount" required>
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" required>
          </div>
           
            <input type="hidden" class="form-control" id="lender_id" name="lender_id" value="<?php echo $user_data['id'];?>" required>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

                    <div class="icon-class">
                        <a href="#" class="btn"> LEND  MONEY  </a>
                       
                        </div>
                    </div>
                    
                </div>
               
                
            </div>
            <div class="content-2">
                <div class="money-returned">
                    <div class="title">
                        <h2> Transactions</h2>
                        <a href="#" class="btn">View All </a>
                    </div>
                    <table>
                        <tr>
                            <th>Agent</th>
                            <th>Loan</th>
                            <th>Profit</th>
                            <th>Amount Returned</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        <tr>
                            <td>Jose</td>
                            <td>22,000.00</td>
                            <td>1400</td>
                            <td>23,400.00</td>
                            <td>Approved</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Erick</td>
                            <td>5,000.00</td>
                            <td>400</td>
                            <td>5,400.00</td>
                            <td>Approved</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Pascalia</td>
                            <td>10,000.00</td>
                            <td>1,000</td>
                            <td>11,000.00</td>
                            <td>Approved</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <var><tr>
                            <td>Mary</td>
                            <td>14,000.00</td>
                            <td>1200</td>
                            <td>15,200.00</td>
                            <td>Pending</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr></var>
                    </table>
                </div>
                <div class="profit">
                    <div class="title">
                        <h2> Agents Details</h2>
                        <a href="#" class="btn">View All </a>
                    </div>
                    <table>
                        <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>M-Pesa No.</th>
                        <th>Report</th>
                    </tr>
                    <tr>
                        <td><img src="./Images/user.png" alt=""></td>
                        <td>Jose</td>
                        <td>+245 7..</td>
                        <td><a href="#" class="btn"> GENERATE</a></td>
                    </tr>
                    <tr>
                        <td><img src="./Images/user.png" alt=""></td>
                        <td>Erick</td>
                        <td>+245 7..</td>
                        <td><a href="#" class="btn"> GENERATE</a></td>
                    </tr>
                    <tr>
                        <td><img src="./Images/user.png" alt=""></td>
                        <td>Pascalia</td>
                        <td>+245 7..</td>
                        <td><a href="#" class="btn"> GENERATE</a></td>
                    </tr>
                    <tr>
                        <td><img src="./Images/user.png" alt=""></td>
                        <td>Mary</td>
                        <td>+245 7..</td>
                        <td><a href="#" class="btn"> GENERATE</a></td>
                    </tr>
                    </table>
                </div>
                </div>
            </div>
       
          
    </div>
    
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