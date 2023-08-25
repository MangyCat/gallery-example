<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];
    $folderPath = "/contactinfo";
    $filename = date("Y-m-d_H-i-s") . ".txt";
    $filePath = $folderPath . "/" . $filename;
    $dataToSave = "Contact: " . $email . "\nMessage:\n" . $message;
    if (file_put_contents($filePath, $dataToSave) !== false) {
        $response = ["success" => true, "message" => "Hvala. Budemo se obratili vama uskoro"];
    } else {
        $response = ["success" => false, "message" => "Ups! Nešto je pošlo krivo, pokušajte kasnije."];
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>
