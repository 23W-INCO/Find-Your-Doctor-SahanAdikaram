<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Start or resume the session
session_start();

$excelFile = 'C:/xampp/htdocs/dv/Dr. Josef Samereier.xlsx';

// Initialize variables
$message = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $situation = $_POST["situation"];

    // Validate and sanitize data
    $name = htmlspecialchars(trim($name));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : "";
    $phone = preg_replace("/[^0-9]/", "", $phone);

    // Load existing spreadsheet or create a new one
    if (file_exists($excelFile)) {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
    } else {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Full Name');
        $spreadsheet->getActiveSheet()->setCellValue('B1', 'Email');
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'Mobile Number');
        $spreadsheet->getActiveSheet()->setCellValue('D1', 'Situation');
    }

    // Add new data to the Spreadsheet
    $worksheet = $spreadsheet->getActiveSheet();
    $lastRow = $worksheet->getHighestRow() + 1;
    $worksheet->setCellValue('A' . $lastRow, $name);
    $worksheet->setCellValue('B' . $lastRow, $email);
    $worksheet->setCellValue('C' . $lastRow, $phone);
    $worksheet->setCellValue('D' . $lastRow, $situation);

    // Save the Spreadsheet to the Excel file
    $writer = new Xlsx($spreadsheet);
    $writer->save($excelFile);

    // Set a session variable with the success message
    $_SESSION['message'] = 'You will receive the appointment via email as soon as possible.';

    // Redirect to prevent form resubmission on refresh
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Check if there is a session message
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    // Clear the session message to prevent it from being shown on subsequent visits
    unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Request Form</title>
    <?php include("include/header.php"); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }
    </style>
</head>
<body>
<video autoplay muted loop id="video-background">
    <source src="http://localhost/dv/bvideo.mp4" type="video/mp4">
    <source src="http://localhost/dv/bvideo.webm" type="video/webm">
    Your browser does not support the video tag.
</video>
<br><br><div class="container">
    <h2 class="mb-4">Appointment Request Form</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Mobile Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="situation">Situation of the Patient:</label>
            <textarea class="form-control" id="situation" name="situation" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>