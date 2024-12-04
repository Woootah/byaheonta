<?php
include "./config.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "Invalid Email or Password";
    }

    if (!empty($errors)) {
        echo json_encode(["status" => "error", "errors" => $errors]);
    } else {
        $qu = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $qu->bind_param("s", $email);
        $qu->execute();
        $res = $qu->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                setcookie("email", $email, time() + (86400 * 30), "/");
            } else {
                $errors[] = "Invalid email or password";
                echo json_encode(["status" => "error", "error" => $errors]);
            }
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "errors" => "User not found"]);
        }
    }

    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
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
        <div class="login-form flex justify-center items-center h-full flex-col">
            <div class="header-container text-center overflow-hidden">
                <h1 class="header-text text-5xl md:text-6xl font-font1 mb-10">Welcome Back</h1>
            </div>
            <form action="#" class="login-form-wrapper">
                <div class="name-field md:grid grid-cols-2 gap-4 w-[400px] mx-auto">
                    <div class="field email flex flex-col col-span-2">
                        <label for="email" class="my-4">Email:</label>
                        <input type="text" id="email" class="bg-cwhite border border-sdgreen h-10 col-span-2 rounded-lg outline-none px-2">
                    </div>
                    <div class="field password flex flex-col col-span-2">
                        <label for="password" class="my-4">Password:</label>
                        <input type="password" id="password" class="bg-cwhite border border-sdgreen h-10 col-span-2 rounded-lg outline-none px-2">
                    </div>

                    <div class="field login flex flex-col col-span-2 text-center mt-8">
                        <input type="submit" value="Login" id="login" class="bg-lgreen border border-lgreen h-10 text-cwhite col-span-2 rounded-lg outline-none px-2 hover:bg-transparent hover:text-sdgreen ctransition hover:border-sdgreen">
                        <p class="mt-2">Don't have an account yet? <a href="/byaheonta/public/register.php" class="underline text-lgreen">Register</a></p>
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
            let index = random_index;

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

            $("#login").on("click", function(e) {
                e.preventDefault(e);

                let email = $("#email").val();
                let password = $("#password").val();

                var request = $.ajax({
                    url: "login.php",
                    method: "POST",
                    data: {
                        email,
                        password,
                    },
                    dataType: "html"
                });

                request.done(function(res) {
                    let msg = JSON.parse(res);
                    console.log(msg);
                    if (msg.status == "error") {
                        let errorHtml = '';
                        if (Array.isArray(msg.errors)) {
                            msg.errors.forEach((err) => {
                                errorHtml += `<p class="text-red-500">${err} *</p>`;
                            });
                        } else {
                            errorHtml = `<p class="text-red-500">${msg.errors}</p>`; // Handle non-array error message
                        }
                        $(".login-form-wrapper")[0].reset();
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
