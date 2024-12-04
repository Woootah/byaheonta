<?php
    include "./config.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByaheOnTa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="grid-bg bg-sdgreen flex justify-center items-center h-[100vh] font-font2">
    <div class="wrapper bg-cwhite w-full h-full md:w-[80vw] md:h-[80vh] md:rounded-lg text-sdgreen p-8 relative">
        <div class="content grid grid-cols-2 grid-rows-2 w-full h-full gap-10">

            <div class="col-span-2 md:col-span-1 row-span-1 md:row-span-2 w-full h-full">
                <d class="profile-container">
                    <div class="img relative flex justify-center ">
                        <div class="cover w-full h-[200px] overflow-hidden rounded-t-lg">
                            <img src="hero_img/cover.jpg" style="clip-path: inset(0 0 0 0);" class="overflow-clip w-full h-full object-cover bg-center" alt="cover_picture">
                        </div>
                        <div class="profile absolute top-1/2 left-1/2 w-[150px] h-[150px] rounded-full overflow-hidden border-4 border-cwhite -translate-x-1/2 translate-y-1/6">
                            <!-- Hero Profile Picture -->
                            <img src="hero_img/blank.jpg" class="profile-picture w-full h-full object-cover" alt="profile_picture">
                        </div>
                    </div>
                    <div class="text mt-16 flex justify-center items-center flex-col">
                        <input type="file" name="profile_picture" id="fileUpload" class="hidden" accept="image/*">
                        <button class="editBtn ctransition hover:bg-lgreen border border-lgreen px-4 py-2 hover:text-cwhite rounded-full opacity-100">Edit Profile</button>
                        <div class="overflow-hidden py-2">
                            <p class="name font-font1 text-4xl md:text-6xl mt-8"></p>
                        </div>
                    </div>
                </d>
            </div>

            <div class="col-span-2 md:col-span-1 row-span-1 md:row-span-2 w-full h-full">halo
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function() {
            setProfile();

            let tl = gsap.timeline();
            let name = new SplitType($(".name"));

            tl.from($(".cover img"), 2, {
                    clipPath: "inset(0 100% 0 0)",
                    ease: "power2.inOut",
                    scale: 2,
                })
                .from($(".profile"), 0.8, {
                    y: 50,
                    opacity: 0,
                    ease: "power2.inOut",
                }, "-=0.5")
                .fromTo($(".editBtn"), 0.5, {
                    opacity: 0,
                    y: 50,
                    ease: "power2.out",
                }, {
                    opacity: 1,
                    y: 0,
                    ease: "power2.out",
                }, "-=0.5")
                .from($(name.chars), 1, {
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut",
                }, "-=0.5")

            $(".editBtn").on("click", function() {
                $("#fileUpload").click();
            })

            $("#fileUpload").on("change", function() {
                const file = this.files[0];

                if (file) {
                    const formData = new FormData();
                    formData.append("profile_picture", file);
                    console.log(...formData.entries());

                    $.ajax({
                        url: "upload.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            let res = JSON.parse(response);
                            if (res.status === "success") {
                                Toastify({
                                    text: res.message,
                                    className: "info",
                                    style: {
                                        background: "#628B35",
                                    },
                                    gravity: "bottom",
                                    position: "left"
                                }).showToast();
                                setProfile();
                            } else {
                                Toastify({
                                    text: res.message,
                                    className: "info",
                                    style: {
                                        background: "red",
                                    },
                                    gravity: "bottom",
                                    position: "left"
                                }).showToast();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        },
                    });
                }
            })


            function setProfile() {
                $.ajax({
                    url: "getProfile.php",
                    method: "GET",
                })
                    .done(function (response) {
                        let res = JSON.parse(response);
                        console.log(res);

                        if (res.status === "success") {
                            let profileData = res.data;
                            let fullName = `${profileData.first_name} ${profileData.last_name}`;

                            // Update the profile picture
                            if(profileData.profile_picture){
                                $(".profile-picture").attr("src", `../uploads/${profileData.profile_picture}`);
                            }
                            else{
                                $(".profile-picture").attr("src", "hero_img/blank.jpg");
                            }

                            // Update the name
                            $(".name").html(toTitleCase(fullName));

                            let name = new SplitType($(".name"));
                            gsap.from($(name.chars), 1, {
                                y: 140,
                                stagger: 0.02,
                                delay: 1.8,
                                ease: "power3.inOut",
                            });
                        } else {
                            console.error("Error fetching profile:", res.message);
                        }
                    })
                    .fail(function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                    });
            }

            function toTitleCase(str) {
                return str.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            }


        })
    </script>
</body>

</html>
