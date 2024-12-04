<?php
    include "./config.php";
    session_start();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $message = $_POST['message'];
        $timestamp = date("Y-m-d h:i:sa");

        $review = $conn->query("INSERT INTO `reviews`(`email`, `rating`, `comment`, `review_timestamp`) VALUES ('$email','$rating','$message','$timestamp')");

        if($review == 1){
            echo json_encode(["status" => "success", "message" => "Thank you for your review."]);
        }
        else{
            echo json_encode(["status" => "error", "message" => "There was an error posting your review."]);
        }
    }

?>
