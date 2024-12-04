<?php
    include "./config.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];

        $res = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $res->bind_param("s", $email);
        $res->execute();
        $row = $res->get_result();

        if($result = $row->fetch_assoc()){
            echo $result['profile'];
        }
        else{
            echo "blank.jpg";
        }
    }

?>
