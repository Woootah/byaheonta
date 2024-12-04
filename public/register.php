<?php
include "./config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    // validation
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    if (empty($fname) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must contain more than 6 characters";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords don't match";
    }

    $res = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $res->bind_param("s", $email);
    $res->execute();
    $row = $res->get_result();

    if ($row->num_rows > 0) {
        $errors[] = "User already exists!";
    }

    if (!empty($errors)) {
        echo json_encode(["status" => "error", "errors" => $errors]);
    } else {
            // encrypt password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            ucwords($fname);
            ucwords($lname);
            // insert user
            $conn->query("INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES ('$fname','$lname','$email','$hashed_password')");
            // alert
            $_SESSION['email'] = $email;
            setcookie("email", $email, time() + (86400 * 30), "/");
            echo json_encode(["status" => "success"]);
    }

    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <p></p>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByaheOnTa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./custom.css">
</head>

<body class="grid-bg bg-sdgreen flex justify-center items-center h-[100vh] font-font2">
    <div class="wrapper w-screen h-screen md:w-[85vw] md:h-[85vh] bg-cwhite md:rounded-lg md:grid md:grid-cols-2">
        <div class="hero hidden md:block overflow-hidden">
            <img id="heroImg" src="auth_images/kawakawa.jpg" alt="" class="w-full h-full object-cover rounded-l-lg">
        </div>
        <div class="register-form flex justify-center items-center h-full flex-col">
            <div class="header-container text-center overflow-hidden">
                <h1 class="header-text text-5xl md:text-6xl font-font1 mb-10">Create an Account</h1>
            </div>
            <form class="register-form-wrapper">
                <div class="md:grid grid-cols-2 gap-4 w-[400px] mx-auto">
                    <div class="field fname flex text-left flex-col col-span-2 md:col-span-1">
                        <label for="fname" class="my-4">First Name:</label>
                        <input type="text" id="fname" name="fname" class="bg-cwhite border border-sdgreen h-10 rounded-lg outline-none px-2 required">
                    </div>
                    <div class="field lname flex text-left flex-col col-span-2 md:col-span-1">
                        <label for="lname" class="my-4">Last Name:</label>
                        <input type="text" id="lname" name="lname" class="bg-cwhite border border-sdgreen w-full h-10 rounded-lg outline-none px-2 required">
                    </div>
                    <div class="field email flex flex-col col-span-2">
                        <label for="email" class="my-4">Email:</label>
                        <input type="text" id="email" name="email" class="bg-cwhite border border-sdgreen h-10 col-span-2 rounded-lg outline-none px-2 required">
                    </div>
                    <div class="field password flex flex-col col-span-2">
                        <label for="password" class="my-4">Password:</label>
                        <input type="password" id="password" name="password" class="bg-cwhite border border-sdgreen h-10 col-span-2 rounded-lg outline-none px-2 required">
                    </div>
                    <div class="field confirm flex flex-col col-span-2 mb-8">
                        <label for="confirm_password" class="my-4">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="bg-cwhite border border-sdgreen h-10 col-span-2 rounded-lg outline-none px-2 required">
                    </div>

                    <div class="field register flex flex-col col-span-2 text-center">
                        <input type="submit" name="register" value="Register" id="register" class="bg-lgreen border border-lgreen h-10 text-cwhite col-span-2 rounded-lg outline-none px-2 hover:bg-transparent hover:text-sdgreen ctransition hover:border-sdgreen">
                        <p class="mt-2">Already have an account? <a href="/byaheonta/public/login.php" class="underline text-lgreen">Login</a></p>
                    </div>
                    <div class="errors-container hidden my-8">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let images = [
                "almani.jpg", "kawakawa.jpg", "lawigan-beach.jpg", "baywalk.jpg", "bayfront.jpg"
            ];
            let random_index = Math.floor(Math.random() * images.length);
            let index = random_index

            const heroImg = $("#heroImg");

            function changeImage() {
                heroImg.attr('src', `./auth_images/${images[index]}`);
                index = (index + 1) % images.length;
            }

            setInterval(changeImage, 2000);

            changeImage();

            let header_split = new SplitType(".header-text");

            const tl = gsap.timeline();

            tl.from(header_split.chars, 1, {
                y: 140,
                stagger: 0.02,
                ease: "power3.inOut",
            });

            $(".field").each(function(index, field) {
                tl.from(field, 0.9, {
                    y: 100,
                    scale: 0.9,
                    opacity: 0,
                    ease: "power3",
                    stagger: 0.5
                }, 0.7);
            });

            $("#register").on("click", function(e) {
                e.preventDefault(e);

                let fname = $("#fname").val();
                let lname = $("#lname").val();
                let email = $("#email").val();
                let password = $("#password").val();
                let confirm_password = $("#confirm_password").val();

                var request = $.ajax({
                    url: "register.php",
                    method: "POST",
                    data: {
                        fname,
                        lname,
                        email,
                        password,
                        confirm_password
                    },
                    dataType: "html"
                });

                request.done(function(res) {
                    let msg = JSON.parse(res);
                    console.log(msg);
                    if (msg.status == "error") {
                        let errorHtml = '';
                        msg.errors.forEach((err) => {
                            errorHtml += `
                                <p class="text-red-500">${err} *</p>
                            `;
                        })
                        $(".register-form-wrapper")[0].reset();
                        showError(errorHtml);
                        setTimeout(hideError, 2000);
                    } else {
                        window.location.replace("http://localhost/byaheonta/public/");
                    }

                });

                request.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });

                function showError(msg) {
                    $(".errors-container").html(msg);
                    $(".errors-container").removeClass("hidden");
                }

                function hideError() {
                    $(".errors-container").addClass("hidden");
                }
            })
        })
    </script>
</body>

</html>
