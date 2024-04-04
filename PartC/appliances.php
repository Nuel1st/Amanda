<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Appliance Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>House Appliance Inventory</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="inventoryForm">
            <!-- Eircode Input -->
            <div class="form-group">
                <label for="eircode">Eircode:</label>
                <input type="text" class="form-control" id="eircode" name="eircode" value="<?php echo isset($_POST['eircode']) ? htmlspecialchars($_POST['eircode']) : ''; ?>" required pattern="[A-Za-z0-9]{7}">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['eircode'])) {
                    echo "<small class='text-danger'>Please enter a valid Eircode (7 characters alphanumeric).</small>";
                } ?>
            </div>
            <!-- Appliance Type Dropdown -->
            <div class="form-group">
                <label for="applianceType">Appliance Type:</label>
                <select class="form-control" id="applianceType" name="applianceType" required>
                    <option value="">Select Appliance Type</option>
                    <option value="Refrigerator" <?php if (isset($_POST['applianceType']) && $_POST['applianceType'] == 'Refrigerator') echo 'selected'; ?>>Refrigerator</option>
                    <option value="Washing Machine" <?php if (isset($_POST['applianceType']) && $_POST['applianceType'] == 'Washing Machine') echo 'selected'; ?>>Washing Machine</option>
                    <!-- Add more options as needed -->
                </select>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['applianceType'])) {
                    echo "<small class='text-danger'>Please select an appliance type.</small>";
                } ?>
            </div>
            <!-- Brand Input -->
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo isset($_POST['brand']) ? htmlspecialchars($_POST['brand']) : ''; ?>" required>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['brand'])) {
                    echo "<small class='text-danger'>Brand is required.</small>";
                } ?>
            </div>
            <!-- Model Number Input -->
            <div class="form-group">
                <label for="modelNumber">Model Number:</label>
                <input type="text" class="form-control" id="modelNumber" name="modelNumber" value="<?php echo isset($_POST['modelNumber']) ? htmlspecialchars($_POST['modelNumber']) : ''; ?>" required pattern="[A-Za-z0-9]+">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !preg_match("/^[A-Za-z0-9]+$/", $_POST['modelNumber'])) {
                    echo "<small class='text-danger'>Invalid model number format.</small>";
                } ?>
            </div>
            <!-- Serial Number Input -->
            <div class="form-group">
                <label for="serialNumber">Serial Number:</label>
                <input type="text" class="form-control" id="serialNumber" name="serialNumber" value="<?php echo isset($_POST['serialNumber']) ? htmlspecialchars($_POST['serialNumber']) : ''; ?>" required pattern="[A-Za-z0-9]+">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !preg_match("/^[A-Za-z0-9]+$/", $_POST['serialNumber'])) {
                    echo "<small class='text-danger'>Invalid serial number format.</small>";
                } ?>
            </div>
            <!-- Purchase Date Input -->
            <div class="form-group">
                <label for="purchaseDate">Purchase Date:</label>
                <input type="date" class="form-control" id="purchaseDate" name="purchaseDate" value="<?php echo isset($_POST['purchaseDate']) ? $_POST['purchaseDate'] : ''; ?>" required>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['purchaseDate'])) {
                    echo "<small class='text-danger'>Please enter a valid purchase date.</small>";
                } ?>
            </div>
            <!-- Warranty Expiration Date Input -->
            <div class="form-group">
                <label for="warrantyExpirationDate">Warranty Expiration Date:</label>
                <input type="date" class="form-control" id="warrantyExpirationDate" name="warrantyExpirationDate" value="<?php echo isset($_POST['warrantyExpirationDate']) ? $_POST['warrantyExpirationDate'] : ''; ?>" required>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['warrantyExpirationDate'])) {
                    echo "<small class='text-danger'>Please enter a valid warranty expiration date.</small>";
                } ?>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add to Inventory</button>
        </form>
        <?php
        // Validate and process form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $isValid = true;
            // Eircode validation
            if (!preg_match("/^[A-Za-z0-9]{7}$/", $_POST['eircode'])) {
                $isValid = false;
            }
            // Other validation steps...
            if ($isValid) {
                // If all data is valid, display success message or add to inventory
                echo "<div class='alert alert-success'>Registration successful!</div>";
                // Add appliance details to inventory list or database here
            } else {
                // Display error message if data is not valid
                echo "<div class='alert alert-danger'>Please correct the errors in the form.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
