# Updated_Lending_System

# Lending System

Welcome to the Lending System! This system facilitates lending activities between a lender, an agent, and customers. In this system, a lender provides money to an agent who, in turn, loans the money to customers at an annual interest rate of 12%. The agent receives a commission of 3% on every loan made to a customer. The system is developed using PHP, HTML, CSS, and JavaScript and hosted locally using XAMPP.

## Features

The Lending System includes the following features:

1. Signup: Users can create an account as a lender, agent, or customer.

2. Login: Users can securely log into their accounts using their credentials.

3. Lender Dashboard:
   - View a summary of all agents associated with the lender.
   - Generate a report of agents and their performance.

4. Agent Dashboard:
   - View a summary of all customers associated with the agent.
   - Create loans for customers, specifying loan details.
   - Generate transaction reports of the agent's customers.

5. Customer Dashboard:
   - View loan details and payment information.
   - Make loan payments and view payment history.

6. Loan Calculation:
   - The system automatically calculates interest on loans at an annual rate of 12%.
   - The system calculates agent commissions at 3% of the loan amount.

7. Data Management:
   - The system securely stores lender, agent, and customer information.
   - All loan transactions and payment details are stored for reference and reporting.

## Getting Started

To use the Lending System, follow these steps:

1. Install XAMPP: Download and install XAMPP from the official website (https://www.apachefriends.org/index.html) based on your operating system.

2. Clone the Repository: Clone the Lending System repository to your local machine.

3. Start XAMPP: Launch XAMPP and start the Apache and MySQL services.

4. Import Database: Import the provided database schema file (`lending_system.sql`) into your local MySQL database using phpMyAdmin or any other MySQL client.

5. Configure Database Connection: Update the database connection settings in the configuration file (`config.php`) with your local database credentials.

6. Run the System: Open a web browser and enter the URL `http://localhost/lending-system` to access the Lending System.

7. Sign up: Create an account as a lender, agent, or customer.

8. Log in: Log into the system using your credentials.

9. Access Dashboards: After logging in, you will be redirected to the corresponding dashboard based on your role (lender, agent, or customer). From there, you can access the system's features.

## Directory Structure

The directory structure of the Lending System is as follows:

```
lending-system/
├── css/
│   ├── style.css
├── js/
│   ├── script.js
├── config.php
├── index.php
├── signup.php
├── login.php
├── lender_dashboard.php
├── agent_dashboard.php
├── customer_dashboard.php
├── agent_report.php
├── customer_report.php
├── loan_create.php
├── loan_details.php
├── payment_history.php
├── README.md
```

- `css/`: Contains the CSS files for styling the web pages.
- `js/`: Contains the JavaScript files for client-side functionality.
- `config.php`: Configuration file for the database connection.
- `index.php`: Home page of the system.
- `signup.php`: Page for user registration.
- `login.php`: Page for user login.
- `lender_dashboard.php`: Dashboard page for the lender
- `agent_dashboard.php`: Dashboard page for the agent.
- `customer_dashboard.php`: Dashboard page for the customer.
- `agent_report.php`: Page for generating an agent report.
- `customer_report.php`: Page for generating a customer transaction report.
- `loan_create.php`: Page for creating a new loan.
- `loan_details.php`: Page for displaying loan details.
- `payment_history.php`: Page for viewing payment history.
- `README.md`: This file.

## Contribution

If you would like to contribute to the Lending System, please follow these steps:

1. Fork the repository and clone it to your local machine.

2. Create a new branch for your feature or bug fix.

3. Implement your changes and test thoroughly.

4. Commit your changes and push the branch to your forked repository.

5. Submit a pull request, detailing the changes you have made and their purpose.

We appreciate your contributions and will review your pull request as soon as possible.

## License

The Lending System is open-source software licensed under the [MIT License](LICENSE). You are free to use, modify, and distribute the software as per the terms and conditions of the license.

## Contact

If you have any questions, suggestions, or concerns regarding the Lending System, please feel free to contact us at [josephogachi27@gmail.com]

Thank you for using the Lending System! We hope it meets your lending needs effectively.
