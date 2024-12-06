<?php
include "./config.php";
session_start();


$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$profile = $conn->query("SELECT * FROM users WHERE email = '$email'")->fetch_assoc();

$reviews = $conn->query("SELECT * FROM reviews ORDER BY review_timestamp")->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['logout'])) {
    session_destroy();
}

if (isset($_POST["review-comment"])) {
    $message = $_POST["review-comment"];
    $rating = $_POST["rating"];
    $timestamp = date("Y-m-d h:i:sa");

    $review = $conn->query("INSERT INTO `reviews`(`email`, `rating`, `comment`, `review_timestamp`) VALUES ('$email','$rating','$message','$timestamp')");
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
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.17/dist/lenis.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body class="font-font2 bg-cwhite relative overflow-x-hidden">
    <div class="hero-container ctransition w-full h-[700px] md:h-[112vh] overflow-hidden relative">
        <div class="overlay h-full w-full absolute top-0 left-0 flex justify-center items-center flex-col">

            <nav class="text-cwhite flex justify-between items-center absolute top-0 left-0 w-full p-8">
                <div class="logo font-font1 text-xl">ByaheOnTa</div>
                <!-- Desktop Nav -->
                <ul class="hidden md:flex justify-center items-center space-x-4 text-md">
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-tight"><a class="nav-link" href="#top-spots" class="cursor-pointer">Top Spots</a></li>
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a class="nav-link" href="map.php" class="cursor-pointer">Map</a></li>
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a class="nav-link" href="about.php" class="cursor-pointer">About Us</a></li>
                </ul>

                <div class="profileImgContainer hidden md:flex overflow-hidden justify-center items-center flex-col">
                    <!-- Profile Icon -->
                    <div id="profileImg">

                        <img src="" alt="profile" class="profile-icon w-12 h-12 rounded-full object-cover">

                        <div id="options" style="display:none;" class="absolute top-24 right-6 w-[120px] h-[100px] bg-cwhite text-sdgreen items-center justify-center flex-col rounded-lg">
                            <div class="arrow w-4 h-4 rotate-45 bg-cwhite absolute -top-2 right-6"></div>
                            <ul class="p-2 text-lg w-full">
                                <li class="border-b border-b-sdgreen mb-1 hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a href="/byaheonta/public/profile.php">Profile</a></li>
                                <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><button class="logout bg-sdgreen px-1 py-3 text-cwhite w-full rounded-md">Logout</button></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Login Button -->
                    <div id="loginButton" class="hidden">
                        <button class="login-btn bg-sdgreen text-cwhite px-6 py-2 rounded-full"><a href="/byaheonta/public/login.php">Login</a></button>
                    </div>
                </div>

                <!-- Mobile Nav -->
                <div class="burger md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>
            </nav>

            <div class="overflow-hidden py-2">
                <h1 id="heroHeader" class="text-4xl md:text-7xl font-font1 text-cwhite">Welcome To Byaheonta</h1>
            </div>
            <div class="overflow-hidden py-2">
                <p id="heroSub" class="font-light text-md md:text-2xl text-cwhite mt-2 md:mt-4">Your ultimate guide to exploring the beauty of Bislig</p>
            </div>
            <button id="visitBtn" class="border border-lgreen hover:bg-transparent ctransition bg-lgreen rounded-full px-6 py-2 md:px-8 md:py-4 mt-4 md:mt-16 text-cwhite"><a href="map.php">Visit Now</a></button>




            <!-- Divider -->
            <div class="custom-shape-divider-bottom-1733039168">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
            <!-- Mobile Nav -->
            <div class="mobile-nav ctransition -translate-x-full mobile-nav inset-0 w-screen h-screen bg-sdgreen fixed top-0 left-0 z-10000 flex justify-center items-center ctransition md:hidden">
                <div class="exit absolute top-4 right-8 text-cwhite">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
                <ul class="flex justify-start text-left items-center space-y-8 font-font1 text-6xl flex-col text-cwhite">
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#top-spots" class="cursor-pointer">Top Spots</a></li>
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="map.php" class="cursor-pointer">Map</a></li>
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="about.php" class="cursor-pointer">About Us</a></li>
                    <li class="profile-link hidden hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="profile.php" class="cursor-pointer">Profile</a></li>
                    <li class="logout hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#" class="cursor-pointer hidden">Logout</a></li>
                    <li class="login hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="login.php" class="cursor-pointer hidden">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="top-spots" class="text-sdgreen mt-16 md:mt-28 z-0">
        <div class="header-title text-center overflow-hidden">
            <p class="font-font1 text-2xl md:text-4xl">Top Spots in Bislig</p>
        </div>

        <div class="spot-container py-[5%] px-[5%] md:px-[10%] mt-10 md:mt-20 flex justify-center">
            <div class="spots flex justify-center items-center flex-col space-y-24 md:space-y-44">

            </div>
        </div>
    </div>

    <!-- REVIEWS -->
    <div id="reviews" class="test-section h-auto w-full bg-sdgreen mt-40  text-cwhite py-24">
        <div class="header-title reviews-header text-center overflow-hidden py-2">
            <p class="font-font1 text-3xl md:text-6xl">What our users say about us</p>
        </div>

        <div class="slider md:h-[200px] h-[150px] mt-24 px-4 flex overflow-hidden" style="mask-image: linear-gradient(to right, transparent, #1C2628 10% 90%, transparent);">
            <div class="list flex relative gap-10 animate-loop-scroll">
            </div>
        </div>

        <div class="review-form w-[80%] grid grid-cols-2 grid-rows-2 mx-auto my-20 md:my-32">
            <div class="hero-text col-span-2 row-span-1 md:row-span-2 md:col-span-1 w-full h-full flex justify-center flex-col items-center text-center md:text-left">
                <div class="overflow-hidden py-2">
                    <p class="review-hero-text font-font1 text-6xl md:text-7xl">Let us know</p>
                </div>
                <div class="overflow-hidden py-2">
                    <p class="review-hero-text font-font1 text-6xl md:text-7xl">your thoughts.</p>
                </div>
            </div>
            <div class="col-span-2 row-span-1 md:row-span-2 md:col-span-1 w-full h-full flex justify-center  items-center flex-col">
                <p>Commenting as <span class="review-email text-lgreen"></span></p>

                <div class="rating-box">
                    <div class="rating-container">
                        <input type="radio" class="rating" name="rating" value="5" id="star-5"> <label for="star-5">&#9733;</label>

                        <input type="radio" class="rating" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>

                        <input type="radio" class="rating" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>

                        <input type="radio" class="rating" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>

                        <input type="radio" class="rating" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
                    </div>
                </div>

                <textarea class="comment border border-lgreen resize-none w-[400px] md:w-[500px] h-[200px] bg-transparent text-cwhite p-4 rounded-lg outline-none"></textarea>
                <button id="review-submit" class="px-8 py-2 bg-lgreen rounded-full mt-4 border border-lgreen hover:bg-transparent ctransition">Submit</button>
            </div>
        </div>
    </div>
    <div class="footer w-full bg-cblack text-cwhite text-center py-16">
        <div class="logo font-font1 text-3xl md:text-4xl overflow-hidden py-2">
            <p class="footer-logo">ByaheOnTa</p>
        </div>
        <div>
            <ul class="socials flex items-center justify-center space-x-6 mt-6">
                <li><i class="fa-brands fa-facebook md:text-2xl"></i></li>
                <li><i class="fa-brands fa-instagram md:text-2xl"></i></li>
                <li><i class="fa-brands fa-twitter md:text-2xl"></i></li>
            </ul>
        </div>
        <div class="footer-line px-6 mt-8">
            <hr class="border-cwhite px-2">
        </div>
        <div class="copy mt-8">
            <p>&copy; 2024 ByaheOnTa <span class="hidden">x uruta</span>. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.17/dist/lenis.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <script src="./script.js"></script>
    <script>
        $(document).ready(function() {

            function getCookie(name) {
                let cookieArr = document.cookie.split(';');
                for (let cookie of cookieArr) {
                    let [key, value] = cookie.trim().split('=');
                    if (key === name) {
                        return decodeURIComponent(value);
                    }
                }
                return null;
            }

            let email = getCookie('email');


            if (email) {
                $('#profileImg').removeClass('hidden');
                $('#options').removeClass('hidden');
                $('#loginButton').addClass('hidden');
                $(".logout").removeClass('hidden');
                $(".login").addClass('hidden');
                $(".profile-link").removeClass('hidden');

                // Profile Icon
                let profile = <?php echo json_encode($profile); ?>;
                if (profile.profile) {
                    $(".profile-icon").attr('src', `../uploads/${profile.profile}`);
                    $(".review-email").html(profile.email);
                } else {
                    $(".profile-icon").attr('src', "hero_img/blank.jpg");
                }
            } else {
                $('#profileImg').addClass('hidden');
                $('#options').addClass('hidden');
                $('#loginButton').removeClass('hidden');
                $(".logout").addClass('hidden');
                $(".login").removeClass('hidden');
                $(".profile-link").addClass('hidden');
            }


            $(".logout").on("click", function() {
                $.ajax({
                        url: "index.php",
                        method: 'POST',
                        data: {
                            logout: true
                        },
                    })
                    .done(function(html) {
                        window.location.replace("http://localhost/byaheonta/public/login.php");
                        deleteCookie('email');
                    });
            })

            function deleteCookie(name) {
                document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
            }

            // top spots
            let spots = [{
                    "image": "tinuy-an.jpg",
                    "title": "Tinuy-An Falls",
                    "description": "A majestic waterfall surrounded by lush greenery."
                },
                {
                    "image": "kawa-kawa.jpg",
                    "title": "Kawa-Kawa Sa Awog",
                    "description": "Is a hidden gem known for its enchanting natural pools shaped like giant 'kawa' (cauldrons)."
                },
                {
                    "image": "hinayagan.jpg",
                    "title": "Hinayagan Cave",
                    "description": "A stunning natural wonder known for its illuminated mid-ceiling opening, underground river, and unique stalactites."
                },
                {
                    "image": "lake77.jpg",
                    "title": "Lake 77",
                    "description": "A serene lake known for its stunning views and calm waters."
                }
            ]


            gsap.registerPlugin(ScrollTrigger);

            let html = "";
            spots.map((spot, index) => {
                let right = ((index + 1) % 2 == 0) ? 'md:flex-row-reverse' : '';
                let textRight = ((index + 1) % 2 == 0) ? 'md:text-right' : 'md:text-left';
                html += `
                    <div class="spot flex flex-col md:flex-row justify-center items-center ${right} w-full md:space-x-[2rem] md:space-x-reverse">
                        <div class="spot-img">
                            <div class="img-wrapper w-[400px] h-[400px] md:w-[500px] md:h-[600px] overflow-hidden">
                                <img src="hero_img/${spot.image}" alt="${spot.title}" style="clip-path: inset(0 0 0 0);" class="overflow-clip w-full h-full object-cover">
                            </div>
                        </div>

                        <div class="spot-text">
                            <div class="text-wrapper w-[400px] md:w-[700px] md:h-[600px] flex justify-center items-center text-center flex-col md:px-10 space-y-4 mt-4">
                                <div class="header-title text-left text-3xl md:text-6xl font-font1 overflow-hidden pb-2">
                                    <p class="w-full">${spot.title}</p>
                                </div>
                                <div class="sub text-md md:text-xl mt-4 md:mt-8 px-4 overflow-hidden">
                                    <p>${spot.description}</p>
                                </div>
                            </div>
                        </div>
                </div>
                `
            })

            $(".spots").html(html);

            // Top Spots
            let spotsAnimation = document.querySelectorAll(".spot-img .img-wrapper img");
            spotsAnimation.forEach((el => {
                gsap.from(el, 2, {
                    scrollTrigger: {
                        trigger: el,
                        start: "top bottom",
                        end: "bottom center",
                        scrub: true,
                    },
                    clipPath: "inset(100% 0 0 0)",
                    scale: 2,
                    ease: "power2.inOut",
                    y: 100,
                })
            }))

            let headerAnimation = document.querySelectorAll(".header-title");
            headerAnimation.forEach((el => {
                let split = new SplitType(el);
                gsap.from(split.chars, 1, {
                    scrollTrigger: {
                        trigger: el,
                        start: "top bottom",
                        end: "bottom center",
                        scrub: true,
                    },
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut",

                })
            }))

            let subAnimation = document.querySelectorAll(".sub");
            subAnimation.forEach((el => {
                let split = new SplitType(el);
                gsap.from(split.chars, 1, {
                    scrollTrigger: {
                        trigger: el,
                        start: "top bottom",
                        end: "bottom center",
                        scrub: true,
                    },
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut",

                })
            }))

            // Reviews
            let reviews = <?php echo json_encode($reviews); ?>;
            let reviews_html = "";

            (async function fetchReviews() {
                for (review of reviews) {
                    await $.ajax({
                        url: "getReviewProfile.php",
                        method: 'POST',
                        data: {
                            email: review.email
                        },
                        success: function(res) {
                            let profile = res ? `../uploads/${res}` : "hero_img/blank.jpg";
                            let stars = "";

                            for (let i = 1; i <= 5; i++) {
                                if (i <= review.rating) {
                                    stars += "<span class='text-lgreen'>&#9733;</span>";
                                } else {
                                    stars += "<span class='text-gray-400'>&#9733;</span>";
                                }
                            }

                            reviews_html += `
                    <div class="item grid grid-cols-3 h-[150px] md:h-[200px] md:w-[450px] w-[350px] bg-cwhite rounded-lg p-4 relative overflow-hidden flex-shrink-0">
                        <div class="watermark absolute -bottom-10 right-0 w-[200px] z-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 290" fill="#F8F5FF">
                                <path d="M22.12 145v97.65h97.65V145H70.95c0-26.92 21.9-48.82 48.82-48.82V47.35c-53.93 0-97.65 43.72-97.65 97.65zm245.76-48.82V47.35c-53.93 0-97.65 43.72-97.65 97.65v97.65h97.65V145h-48.82c-.01-26.92 21.89-48.82 48.82-48.82z"></path>
                            </svg>
                        </div>
                        <div class="review_profile col-span-1 flex justify-center items-center z-10">
                            <div class="w-[100px] h-[100px] overflow-hidden rounded-full">
                                <img src="${profile}" alt="review" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="review_text col-span-2 text-sdgreen px-4 py-4 md:py-8 z-10">
                            <p class="font-bold font-sm">${review.email}</p>
                            <div class="stars flex">${ stars }</div>
                            <p class="mt-2">"${review.comment}"</p>
                        </div>
                    </div>
                `;
                        }
                    });
                }
                $(".slider .list").html(reviews_html + reviews_html);
            })();

            gsap.from(".slider", 1, {
                scrollTrigger: {
                    trigger: ".reviews-header",
                    start: "center bottom",
                    end: "bottom center",
                    scrub: true,
                },
                y: 140,
                opacity: 0,
                ease: "power3.inOut",
            })

            gsap.from(".review-form", 1, {
                scrollTrigger: {
                    trigger: ".review-form",
                    start: "top bottom",
                    end: "bottom center",
                    scrub: true,
                },
                y: 140,
                opacity: 0,
                ease: "power3.inOut",
            })

            $(".review-hero-text").each(function() {
                let review_hero_split = new SplitType($(this));
                gsap.from(review_hero_split.chars, 1, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom center",
                        scrub: true,
                    },
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut",

                })
            })

            // star
            let reviewValue = 0;

            $(".rating").each(function() {
                $(this).on("change", function() {
                    reviewValue = $(this).val();
                    console.log(typeof(reviewValue));
                });
            });

            $("#review-submit").on("click", function() {
                if (email == null) {
                    window.location.replace("http://localhost/byaheonta/public/login.php");
                }

                var request = $.ajax({
                    url: "review.php",
                    method: "POST",
                    data: {
                        email: email,
                        rating: reviewValue,
                        message: $(".comment").val()
                    },
                    dataType: "json"
                });

                request.done(function(res) {
                    if (res.status === "success") {
                        Toastify({
                            text: res.message,
                            className: "info",
                            style: {
                                background: "#628B35",
                            },
                            gravity: "top",
                            position: "center"
                        }).showToast();
                    } else {
                        Toastify({
                            text: res.message,
                            className: "info",
                            style: {
                                background: "red",
                            },
                            gravity: "top",
                            position: "center"
                        }).showToast();
                    }
                });

                request.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });

            })

            // footer

            gsap.from(".socials li", 2, {
                scrollTrigger: {
                    trigger: ".footer",
                    start: "top bottom",
                    end: "top 60%",
                    scrub: true,
                },
                y: 100,
                stagger: 0.05,
                opacity: 0,
                ease: "power3"
            })

            gsap.from(".footer-line, .copy", 2, {
                scrollTrigger: {
                    trigger: ".footer",
                    start: "top bottom",
                    end: "top 60%",
                    scrub: true,
                },
                y: 100,
                opacity: 0,
                ease: "power3"
            })

            let footerSplit = new SplitType(".footer-logo");
            gsap.from(footerSplit.chars, 2, {
                scrollTrigger: {
                    trigger: ".footer",
                    start: "top bottom",
                    end: "top 55%",
                    scrub: true,
                },
                y: 100,
                stagger: 0.05,
                opacity: 0,
                ease: "power3"
            })
        })
    </script>
</body>

</html>
