<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Appliance Inventory - Registration Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Confirmation</h2>
        <?php
        // Define an empty array to store error messages
        $errors = array();

        // Function to sanitize input
        function sanitizeInput($data) {
            return htmlspecialchars(trim($data));
        }

        // Validate Eircode
        $eircodePattern = "/^[A-Za-z0-9]{7}$/";
        $eircode = sanitizeInput($_POST["eircode"]);
        if (!preg_match($eircodePattern, $eircode)) {
            $errors[] = "Invalid Eircode format.";
        }

        // Validate Appliance Type
        $applianceType = sanitizeInput($_POST["applianceType"]);
        if (empty($applianceType)) {
            $errors[] = "Please select an appliance type.";
        }

        // Validate Brand
        $brand = sanitizeInput($_POST["brand"]);
        if (empty($brand)) {
            $errors[] = "Brand is required.";
        }

        // Validate Model Number
        $modelNumberPattern = "/^[A-Za-z0-9]+$/";
        $modelNumber = sanitizeInput($_POST["modelNumber"]);
        if (!preg_match($modelNumberPattern, $modelNumber)) {
            $errors[] = "Invalid model number format.";
        }

        // Validate Serial Number
        $serialNumberPattern = "/^[A-Za-z0-9]+$/";
        $serialNumber = sanitizeInput($_POST["serialNumber"]);
        if (!preg_match($serialNumberPattern, $serialNumber)) {
            $errors[] = "Invalid serial number format.";
        }

        // Validate Dates
        $purchaseDate = $_POST["purchaseDate"];
        $warrantyExpirationDate = $_POST["warrantyExpirationDate"];
        if (strtotime($warrantyExpirationDate) < strtotime($purchaseDate)) {
            $errors[] = "Warranty expiration date cannot be earlier than purchase date.";
        }

        // Display error messages if any
        if (!empty($errors)) {
            echo "<div class='alert alert-danger'>";
            foreach ($errors as $error) {
                echo "<p>" . htmlentities($error) . "</p>";
            }
            echo "</div>";
        } else {
            // If no errors, display confirmation message and add details to inventory list
            echo "<div class='alert alert-success'>";
            echo "<p>Registration successful!</p>";
            echo "<p>Eircode: " . htmlentities($eircode) . "</p>";
            echo "<p>Appliance Type: " . htmlentities($applianceType) . "</p>";
            echo "<p>Brand: " . htmlentities($brand) . "</p>";
            echo "<p>Model Number: " . htmlentities($modelNumber) . "</p>";
            echo "<p>Serial Number: " . htmlentities($serialNumber) . "</p>";
            echo "<p>Purchase Date: " . htmlentities($purchaseDate) . "</p>";
            echo "<p>Warranty Expiration Date: " . htmlentities($warrantyExpirationDate) . "</p>";
            echo "</div>";
            // You can add the details to your inventory list (e.g., database) here
        }
        ?>
        <p><a href="house.html" class="btn btn-primary">Go Back</a></p>
    </div>
</body>
</html>
