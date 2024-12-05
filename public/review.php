<?php
    include "./config.php";
    session_start();
    header('Content-Type: application/json');

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $message = $_POST['message'];

        if(empty($email)){
            echo json_encode(["status" => "error", "message" => "Login to post a review."]);
            exit;
        }

        if(empty($rating) || empty($message)){
            echo json_encode(["status" => "error", "message" => "Don't leave fields blank."]);
            exit;
        }

        $timestamp = date("Y-m-d H:i:sa");
        $converted_rating = intval($rating);

        $qu = $conn->prepare("INSERT INTO `reviews`(`email`, `rating`, `comment`, `review_timestamp`) VALUES ( ?,?,?,?)");

        if($qu){
            $qu->bind_param("siss", $email, $converted_rating, $message, $timestamp);
            $res = $qu->execute();

            if($res){
                echo json_encode(["status" => "success", "message" => "Thank you for your review."]);
            }
            else{
                echo json_encode(["status" => "error", "message" => "There was an error posting your review."]);
            }

            $qu->close();
        }
        else {
            echo json_encode(["status" => "error", "message" => "Failed to prepare the SQL statement."]);
        }

        $conn->close();
    }

?>
