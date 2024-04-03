<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5" >
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<title> Vehicle Information </title>

</head>

<body>

    <h1>Vehicles Data</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT RFID, Owner, Vehicle_name, Class_number, Engine_number, Plate_number FROM vehicle_registration ORDER BY RFID DESC"; /*select items to display from the vehicle_registration table in the data base*/
//add reading time
echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>RFID</th> 
        <th>Plate_number</th> 
        <th>Owner</th> 
        <th>Vehicle_name</th> 
        <th>Class_number</th> 
        <th>Engine_number</th>
             
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_RFID = $row["RFID"];
        //$row_reading_time = $row["reading_time"];
        $row_Plate_number = $row["Plate_number"];
        $row_Owner = $row["Owner"];
        $row_Vehicle_name = $row["Vehicle_name"];
        $row_Class_number = $row["Class_number"];
        $row_Engine_number = $row["Engine_number"]; 
       
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
       // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
        // <td>' . $row_reading_time . '</td>  ,removed from line 59
        echo '<tr> 
                <td>' . $row_RFID . '</td> 
                <td>' . $row_Plate_number . '</td>
                <td>' . $row_Owner . '</td> 
                <td>' . $row_Vehicle_name . '</td> 
                <td>' . $row_Class_number . '</td> 
                <td>' . $row_Engine_number . '</td>
                
                
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>

</body>
</html>

	</body>
</html>