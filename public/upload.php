<?php
    include "./config.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_COOKIE['email'];

        $file = $_FILES['profile_picture'];

        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];

        $fileExt = explode(".", $file_name);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png");

        if(in_array($fileActualExt, $allowed)){
            if($file_error === 0){
                if($file_size < 1000000){
                    $filename_new= uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = "../uploads/" . $filename_new;
                    move_uploaded_file($file_tmp_name, $fileDestination);
                    $res = $conn->prepare("UPDATE `users` SET `profile` = ? WHERE email = ?");
                    $res->bind_param("ss", $filename_new, $email);
                    $res->execute();
                    echo json_encode(["status" => "success", "message" => "Uploaded Successfully"]);
                }
                else{
                    echo json_encode(["status" => "error", "message" => "File Too Big"]);
                }
            }
            else{
                echo json_encode(["status" => "error", "message" => "Error Uploading File"]);
            }
        }
        else {
            echo json_encode(["status" => "error", "message" => "File Not Allowed"]);
        }
    }

?>
