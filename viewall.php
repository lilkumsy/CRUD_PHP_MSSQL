<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-VIEW ALL</title>
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
                    <h5 class="text-center mb-4 navy-blue-color">Credit Information</h5>
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
                        include 'connection.php';
                        $query = "SELECT TOP 5 creditID, Description, ForcedSaleValue FROM CreditSecurities";
                        $result = sqlsrv_query($conn, $query);
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
