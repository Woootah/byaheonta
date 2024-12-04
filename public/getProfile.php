<?php
        include "./config.php";
        session_start();

        if (isset($_COOKIE['email'])) {
            $email = $conn->real_escape_string($_COOKIE['email']);
            $profile = $conn->query("SELECT * FROM users WHERE email = '$email'")->fetch_assoc();

            if ($profile) {
                echo json_encode([
                    "status" => "success",
                    "data" => [
                        "first_name" => $profile['first_name'],
                        "last_name" => $profile['last_name'],
                        "profile_picture" => $profile['profile'],
                    ],
                ]);
            }
        }
?>
