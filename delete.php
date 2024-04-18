<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-DELETE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="itmb-logo.jpg" />
    <style>
        body {
            background-color: #001F3F; /* Navy Blue */
            color: white; /* Text color */
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .navy-blue-color {
            color: #001F3F !important;
        }
        .navy-blue-bg {
            background-color: #001F3F !important;
            border-color: #001F3F !important;
        }
        .logo {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <img src="itmb-logo.jpg" height='120' width='120' alt="Logo" class="logo">
                    <h5 class="text-center mb-4 navy-blue-color"></h5>
                    <form method="post">
                        <div class="form-group">
                            <label for="accountNumber">Enter Account Number to Delete:</label>
                            <input type="text" class="form-control" id="accountNumber" name="accountNumber" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Delete Record</button>
                    </form>
                    <hr>
                    <table class="table table-bordered">
                      <thead class="navy-blue-bg navy-blue-color">
                        <tr>
                            <th>CREDIT ID</th>
                            <th>DESCRIPTION</th>
                            <th>FORCED SALE VALUE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Database connection
                        include 'connection.php';

                        // Check if form is submitted
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve account number from form
                            $accountNumber = $_POST['accountNumber'];

                            // Prepare and execute deletion query
                            $deleteQuery = "DELETE FROM CreditSecurities WHERE creditID = ?";
                            $params = array($accountNumber);
                            $stmt = sqlsrv_query($conn, $deleteQuery, $params);

                            // Check if deletion was successful
                            if ($stmt === false) {
                                echo "<tr><td colspan='3'>Error deleting record.</td></tr>";
                            } else {
                                echo "<tr><td colspan='3'>Record deleted successfully.</td></tr>";
                            }
                        }

                        // Retrieve and display remaining records
                        $selectQuery = "SELECT TOP 4 creditID, Description, ForcedSaleValue FROM CreditSecurities";
                        $result = sqlsrv_query($conn, $selectQuery);
                        if ($result !== false) {
                            while ($row = sqlsrv_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["creditID"] . "</td>";
                                echo "<td>" . $row["Description"] . "</td>";
                                echo "<td>" . $row["ForcedSaleValue"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Error fetching data.</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
