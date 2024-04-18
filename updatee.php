<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITMB NIN/BVN UPDATE</title>
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
                    <h5 class="text-center mb-4 navy-blue-color">Update Credit Information</h5>
                    <form method="post">
                        <div class="form-group">
                            <label for="creditID">Credit ID:</label>
                            <input type="text" class="form-control" id="creditID" name="creditID" required>
                        </div>
                        <div class="form-group">
                            <label for="forcedSaleValue">New Forced Sale Value:</label>
                            <input type="text" class="form-control" id="forcedSaleValue" name="forcedSaleValue" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </form>
                    <hr>
                    <?php
                    // Database connection
                    include 'connection.php';

                    // Check if form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve form data
                        $creditID = $_POST['creditID'];
                        $newForcedSaleValue = $_POST['forcedSaleValue'];

                        // Prepare and execute update query
                        $updateQuery = "UPDATE CreditSecurities SET ForcedSaleValue = ? WHERE creditID = ?";
                        $params = array($newForcedSaleValue, $creditID);
                        $stmt = sqlsrv_query($conn, $updateQuery, $params);

                        // Check if update was successful
                        if ($stmt === false) {
                            echo "<div class='alert alert-danger' role='alert'>Error updating record.</div>";
                        } else {
                            echo "<div class='alert alert-success' role='alert'>Record updated successfully.</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
