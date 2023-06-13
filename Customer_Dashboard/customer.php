<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Lender Panel</title>
</head>

<body>

  <div class="side-menu">
    <div class="brand-name">
      <h1>CUSTOMER</h1>
    </div>
    <ul>
      <li><img src="assets/dashboard.png" alt="#">&nbsp; <span>Dashboard</span></li>
      <li><img src="assets/circle-user.png" alt="#">&nbsp; <span>Details</span> </li>
      <li><img src="assets/earnings.png" alt="#">&nbsp;<span>Interest</span></li>
      <li><img src="assets/dashboard.png" alt="#">&nbsp;<span>Settings</span></li>
    </ul>
  </div>

  <div class="container">

    <div class="header">
      <div class="nav">
        <div class="search"></div>
      </div>
    </div>

    <div class="content">
      <div class="cards">
        <div class="box">
          <div class="icon-class">
            <img src="assets/sack-dollar.png" alt="">
          </div>
          <div class="Balance">
            <input type="text" placeholder="500,000.00">
            <h3>Loan</h3>
          </div>
        </div>
      </div>

      <div class="cards">
        <div class="box">
          <div class="icon-class">
            <img src="assets/sack-dollar.png" color="blue" alt="">
          </div>
          <div class="Balance">
            <input type="text" placeholder="Enter Amount">
            <h3>Amount</h3>
          </div>
        </div>
      </div>

      <div class="cards">
        <div class="box">
          <div class="icon-class">
            <img src="assets/earnings.png" alt="">
          </div>
          <div class="Balance">
            <input type="text" placeholder="Ksh. ..">
            <h3>Interest</h3>
          </div>
        </div>
      </div>

      <div class="cards">
        <div class="box">
          <div class="icon-class-1">
            <a href="#" class="btn">Withdraw</a>
          </div>
        </div>
      </div>

     

      <div class="money-returned">
        <div class="title">
          <h2>Transactions</h2>
          <a href="#" class="btn">View All</a>
        </div>
        <table>
          <tr>
            <th>No</th>
            <th>Loan</th>
            <th>Interest</th>
            <th>Amount Returned</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Report</th>
          </tr>
          <tr>
            <td>1</td>
            <td>22,000.00</td>
            <td>1400</td>
            <td>23,400.00</td>
            <td>0.00</td>
            <td>Paid</td>
            <td><a href="#" class="btn">GENERATE</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>5,000.00</td>
            <td>400</td>
            <td>0.00</td>
            <td>5,400</td>
            <td>Unpaid</td>
            <td><a href="#" class="btn">GENERATE</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>10,000.00</td>
            <td>1,000</td>
            <td>6,000.00</td>
            <td>5,000</td>
            <td>Partial</td>
            <td><a href="#" class="btn">GENERATE</a></td>
          </tr>
          <tr>
            <td>4</td>
            <td>14,000.00</td>
            <td>1200</td>
            <td>10,00.00</td>
            <td>5,200</td>
            <td>Partial</td>
            <td><a href="#" class="btn">GENERATE</a></td>
          </tr>
        </table>
        
        <div class="cards">
            <div class="box">
              
              <div class="Balance">
                <input type="text" placeholder="Account No">
                <h3>Agent's Account</h3>
            </div>
          </div>
      </div>

      <div class="cards">
        <div class="box">
            <div class="icon-class">
                <img src="assets/sack-dollar.png" color="blue" alt="">
              </div>
          <div class="amount-input">
            <input type="text" placeholder="Enter amount">
            <h3>Amount</h3>
          </div>
        </div>
      </div>
      
      <div class="cards">
        <div class="box">
          <div class="send-button">
            <button>Send</button>
          </div>
        </div>
      </div>




    </div>
  </div>

</body>

</html>
