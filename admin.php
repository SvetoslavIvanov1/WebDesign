<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
</head>
<body>
<?php
$holidayTitle = isset($_REQUEST['holidayTitle']) ? $_REQUEST['holidayTitle'] : null;
$holidayDuration = isset($_REQUEST['holidayDuration']) ? $_REQUEST['holidayDuration'] : null;
$holidayPrice = isset($_REQUEST['holidayPrice']) ? $_REQUEST['holidayPrice'] : null;
$catID = isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null;
$locationID = isset($_REQUEST['locationID']) ? $_REQUEST['locationID'] : null;
$holidayDescription = isset($_REQUEST['holidayDescription']) ? $_REQUEST['holidayDescription'] : null;

$errors = false;
?>
<h1>Your Holiday</h1>

<?php
if(!empty($holidayTitle) || !empty($holidayDuration) || !empty($holidayPrice)) {
    echo "<h2>Your details</h2>\n";
}

if (!empty($holidayTitle)) {
    echo "<p>Holiday Title: $holidayTitle</p>\n";
}
if (!empty($holidayDuration)) {
    echo "<p>Holiday Duration: $holidayDuration</p>\n";
}
if (!empty($holidayPrice)) {
    echo "<p>Holiday Price: $holidayPrice</p>\n";
}
?>

<h2>Location of Holiday</h2>
<?php
if (!empty($locationID)) {
    echo "<p>$locationID</p>\n";
}
else {
    echo "<p>You have not selected a holiday location. Please try again.</p>\n";
    $errors = true;
}
?>

<h2>Holiday Category</h2>
<?php
if (!empty($catID)) {
    echo "<p>Quality of service: $catID</p>\n";
}
else {
    echo "<p>You have not provided a holiday category. Please try again.</p>\n";
    $errors = true;
}
if (!empty($catID)) {
    echo "<p>Category: $catID</p>\n";
}
else {
    echo "<p>You have not provided a category for the holiday. Please try again.</p>\n";
    $errors = true;
}

if (!empty($holidayDescription)) {
    echo "<p>Holiday Description: <br /> $holidayDescription</p>\n";
}

if ($errors == false) {
    include 'database_conn.php';		         // make db connection

    $holidayTitle = $dbConn->real_escape_string($holidayTitle);
    $holidayDuration = $dbConn->real_escape_string($holidayDuration);
    $holidayPrice = $dbConn->real_escape_string($holidayPrice);
    $holidayDescription = $dbConn->real_escape_string($holidayDescription);

    $sql = "INSERT INTO PCH_holidays (holidayTitle, holidayDuration, holidayPrice, catID, locationID,  holidayDescription) values('$holidayTitle', '$holidayDuration', '$holidayPrice', '$catID', '$locationID',  '$holidayDescription')";

    $result = $dbConn->query($sql);

    // Check for and handle query failure
    if($result === false) {
        echo "<p>Problem when saving: ".$dbConn->error.". Try again</p>\n</body>\n</html>";
        exit;
    }
    else {
        echo "<p>Thank you for the holiday</p>\n";
    }
    $dbConn->close();
}
?>
</body>
</html>




