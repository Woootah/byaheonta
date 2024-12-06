<?php
    include "./config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $from = $_POST["fromValue"];
        $to = $_POST["toValue"];
        $date = $_POST["tourDate"];

        $qu = $conn->prepare("INSERT INTO `itinerary`(`email`, `from_location`, `to_location`, `date`) VALUES(?,?,?,?)");
        $qu->bind_param("ssss", $email, $from, $to, $date);
        $res = $qu->execute();

        if($res){
            echo json_encode(["status" => "success", "message" => "Added to your itinerary successfully. "]);
        }
        else{
            echo json_encode(["status" => "error", "message" => "Error adding to your itinerary"]);
        }
    }
?>
