<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="HQ.css" rel="stylesheet" type="text/css" />
    <title>HolidayQuery</title>
</head>
<body>


<ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="HolidayQuery.php">View Holidays</a></li>
    <li><a href="admin.html">Admin</a></li>
    <li><a href="Credits.html">Credits</a></li>
    <li><a href="Wireframe.pdf">Wireframe</a></li>
</ul>

<div class = "HPO" >Holidays PCH Offers:</div>

<?php
include 'database_conn.php';	  // make db connection

$sql = "SELECT holidayTitle, holidayDescription, holidayDuration, holidayPrice , catDesc , country  
FROM PCH_holidays 
INNER JOIN PCH_location
ON PCH_location.locationID = PCH_holidays.locationID
INNER JOIN PCH_category
ON PCH_category.catID = PCH_holidays.catID";


$queryResult = $dbConn->query($sql);

// Check for and handle query failure
if($queryResult === false) {
    echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    exit;
}
// Otherwise fetch all the rows returned by the query one by one
else {
    while($rowObj = $queryResult->fetch_object()){
        echo "<div class = 'EV'>

 <div class = 'Title' > Holiday:{$rowObj->holidayTitle}
<br>Days:{$rowObj->holidayDuration}
<br>Price:{$rowObj->holidayPrice}
<br>Category:{$rowObj->catDesc}
<br>Country:{$rowObj->country}
<div class = 'Desc'>
{$rowObj->holidayDescription}
</div>

</div>";


    }
}
$queryResult->close();
$dbConn->close();
?>
