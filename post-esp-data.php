<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicles";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $RFID = $Plate_number = $Owner = $Vehicle_name = $Class_number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $RFID = test_input($_POST["RFID"]);
        $Plate_number = test_input($_POST["Plate_number"]);
        $Owner = test_input($_POST["Owner"]);
        $Vehicle_name = test_input($_POST["Vehicle_name"]);
        $Class_number = test_input($_POST["Class_number"]);

        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO vehicle_registration (RFID, Plate_number, Owner, Vehicle_name, Class_number)
        VALUES ('" . $RFID . "', '" . $Plate_number . "', '" . $Owner . "', '" . $Vehicle_name . "', '" . $Class_number . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}