
<?php
   $dbConn = new mysqli('localhost', 'unn_w17004799', 'Telec980', 'unn_w17004799');

   if ($dbConn->connect_error) {
       echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
       exit;
   }
?>
