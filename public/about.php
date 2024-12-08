<?php
include "./config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByaheOnTa | About</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./custom.css">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.17/dist/lenis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<body class="bg-cwhite font-font2 text-sdgreen overflow-x-hidden">

    <div class="wrapper relative w-full h-auto px-[5%] z-1 hidden md:block">
        <a href="index.php" class="back flex items-center space-x-4 absolute top-16 left-16 hover:scale-[0.9px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 w-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </a>
        <div class="vslider flex space-x-4">
            <!-- LEFT -->
            <div class="slider__left relative w-[50%]">
                <div class="slider__texts">
                    <div class="slider__info">
                        <div class="info__text h-screen  flex flex-col justify-center">
                            <div class="overflow-hidden py-2">
                                <p class="head-1 font-font1 text-8xl">About Us</p>
                            </div>
                            <div class="pr-12 mt-8 text-lg">
                                <p class="sub-1 pr-8">We are passionate team dedicated to making a difference nin the world. Here's a glimpse of our journey and mission.</p>
                            </div>
                        </div>
                        <div class="info__text h-screen flex flex-col justify-center">
                            <div class="overflow-hidden py-2">
                                <p class="header font-font1 text-8xl">Our Story</p>
                            </div>
                            <div class="pr-12 mt-8 text-lg">
                                <p class="sub">We started with a simple idea to make a lasting impact on our community. With creativity, hard work, and dedication, we've grown into leaders in our field. Our team is commited to providing innovating solutions that benefit out clients, and we believe in building long-term relationships that foster mutual growth.</p>
                            </div>
                        </div>
                        <div class="info__text h-screen flex flex-col justify-center">
                            <div class="overflow-hidden py-2">
                                <p class="header font-font1 text-8xl">Our Mission</p>
                            </div>
                            <div class="pr-12 mt-8 text-lg">
                                <p class="sub">At the core of our mission is a desire to make the world a better place, with each service we offer contributing to a brighter future. Our journey is just beginning, and we invite you to be a part of it.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT -->
            <div class="slider__right h-auto">
                <div class="slider__photos h-screen w-full flex flex-col justify-center sticky top-0 items-center">
                    <div class="slider__photo relative w-[40vw] h-[50vh]">
                        <div class="slider__photo-item overflow-hidden w-full h-full absolute">
                            <img src="./hero_img/cave.jpg" alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="slider__photo-item overflow-hidden w-full h-full absolute">
                            <img src="./hero_img/tinuyan-about-hero.jpg" alt="" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="slider__photo-item overflow-hidden w-full h-full absolute">
                            <img src="./hero_img/hagonoy.jpg" alt="" class="w-full h-full object-cover object-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile flex justify-center items-center flex-col h-auto md:hidden px-[5%] text-center py-[5%]">
        <a href="index.php" class="back flex items-center space-x-4 absolute top-4 left-4 hover:scale-[0.9px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 w-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </a>
        <div class="m-header mt-16 overflow-hidden">
            <p class="m__head1 text-6xl font-font1 py-2">About Us</p>
        </div>
        <div class="hero overflow-hidden w-[500px] h-[250px] mt-8">
            <img src="./hero_img/cave.jpg" alt="" class="m__hero1 w-full h-full object-cover object-center overflow-clip" style="clip-path: inset(0 0 0 0);">
        </div>
        <div class="m-sub mt-8 px-4">
            <p class="m__sub1">We are passionate team dedicated to making a difference in the world. Here's a glimpse of our journey and mission.</p>
        </div>

        <div class="m__header mt-24 overflow-hidden py-2">
            <p class="text-6xl font-font1">Our Story</p>
        </div>
        <div class="hero overflow-hidden w-[500px] h-[250px] mt-8">
            <img src="./hero_img/tinuyan-about-hero.jpg" alt="" class="m__hero-img w-full h-full object-cover object-center overflow-clip" style="clip-path: inset(0 0 0 0);">
        </div>
        <div class="m__sub mt-8 px-4">
            <p>We started with a simple idea to make a lasting impact on our community. With creativity, hard work, and dedication, we've grown into leaders in our field. Our team is commited to providing innovating solutions that benefit out clients, and we believe in building long-term relationships that foster mutual growth.</p>
        </div>

        <div class="m__header mt-24 overflow-hidden py-2">
            <p class="text-6xl font-font1">Our Mission</p>
        </div>
        <div class="hero overflow-hidden w-[500px] h-[250px] mt-8">
            <img src="./hero_img/hagonoy.jpg" alt="" class="m__hero-img w-full h-full object-cover object-center overflow-clip" style="clip-path: inset(0 0 0 0);">
        </div>
        <div class="m__sub mt-8 px-4">
            <p>At the core of our mission is a desire to make the world a better place, with each service we offer contributing to a brighter future. Our journey is just beginning, and we invite you to be a part of it.</p>
        </div>
    </div>

    <div class="team px-[5%] flex flex-col h-auto w-full mt-24">
        <div class="team__wrapper flex flex-col">
            <div class="team__header overflow-hidden py-2">
                <div class="team__behind text-center flex space-x-2">
                    <div class="pill border md:border-2 border-sdgreen bg-transparent px-3 md:px-4 py-1 text-sm md:text-lg rounded-full">THE</div>
                    <div class="pill border md:border-2 border-sdgreen bg-transparent px-3 md:px-4 py-1 text-sm md:text-lg rounded-full">TEAM</div>
                    <div class="pill border md:border-2 border-sdgreen px-3 md:px-4 py-1 text-sm md:text-lg rounded-full bg-vlgreen">BEHIND</div>
                </div>
            </div>
            <div class="intro flex flex-col md:flex-row md:justify-between md:items-end w-full">
                <div class="intro__header font-font1 text-6xl pt-4">
                    <div class="overflow-hidden py-2">
                        <p class="intro__header-text">Meet The</p>
                    </div>
                    <div class="overflow-hidden py-2">
                        <p class="intro__header-text">Developers</p>
                    </div>
                </div>
                <div class="intro__sub text-md w-[400px] pt-4 md:pt-0 md:text-xl">
                    <p>Our team is passionate, innovative, and dedicated to making a difference.</p>
                </div>
            </div>
            <div class="line border border-gray-400 mt-6"></div>
        </div>
        <div class="team__members my-24 grid grid-cols-2 md:grid-cols-3 gap-10">
            <!-- Dynamic Items -->
        </div>
    </div>

    <!-- footer -->
    <div class="footer w-full bg-cblack text-cwhite text-center py-16">
        <div class="logo font-font1 text-3xl md:text-4xl overflow-hidden py-2">
            <p class="footer-logo">BiyaheOnTa</p>
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
            <p>&copy; 2024 BiyaheOnTa <span class="hidden">x uruta</span>. All rights reserved.</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.17/dist/lenis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // Lenis Smooth Scroll
            const lenis = new Lenis();

            // lenis.on('scroll', (e) => {
            //     console.log(e);
            //   });

            lenis.on("scroll", ScrollTrigger.update);

            gsap.ticker.add((time) => {
                lenis.raf(time * 1000);
            });

            gsap.ticker.lagSmoothing(0);

            gsap.registerPlugin(ScrollTrigger);


            // slider
            let photoItems = document.querySelectorAll(".slider__photo-item");
            photoItems.forEach((item, index) => {
                item.style.zIndex = photoItems.length - index;
            })

            gsap.set(".slider__photo-item", {
                clipPath: "inset( 0 0 0 0)"
            });

            gsap.to(".slider__photo-item:not(:last-child)", {
                scrollTrigger: {
                    trigger: ".vslider",
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 1,
                },
                clipPath: "inset(0 0 100% 0)",
                stagger: 0.5,
                ease: "none"
            })

            // intro
            let tl = gsap.timeline();
            let head1 = new SplitType(".head-1");
            tl.from(head1.chars, 2, {
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.03
                })
                .from(".sub-1", 1, {
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                    opacity: 0
                }, "-=0.7")
                .from(".slider__photo", 1, {
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                    opacity: 0,
                }, "-=0.8")

            $(".header").each(function() {
                let splitHeader = new SplitType($(this), {
                    types: "chars"
                });
                gsap.from(splitHeader.chars, 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom center",
                        scrub: 1,
                    },
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                });
            });

            $(".sub").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom 70%",
                        scrub: 1,
                    },
                    y: 100,
                    opacity: 0,
                    ease: "power3.inOut",
                });
            });

            // mobile
            let mtl = gsap.timeline();
            let mhead1 = new SplitType(".m__head1");

            mtl.from(mhead1.chars, 2, {
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                })
                .from(".m__hero1", 1, {
                    clipPath: "inset(0 100% 0 0)",
                    ease: "power3.inOut",
                }, "-=0.7")
                .from(".m__sub1", 1, {
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                    opacity: 0
                }, "-=0.9")

            $(".m__header p").each(function() {
                let splitHeader = new SplitType($(this), {
                    types: "chars"
                });
                gsap.from(splitHeader.chars, 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top center",
                        end: "bottom 40%",
                        scrub: 1,
                    },
                    y: 140,
                    ease: "power3.inOut",
                    stagger: 0.02,
                });
            });

            $(".m__hero-img").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top center",
                        end: "bottom 40%",
                        scrub: 1,
                    },
                    clipPath: "inset(0 100% 0 0)",
                    ease: "power3.inOut",
                    stagger: 0.02,
                });
            })

            $(".m__sub p").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top 80%",
                        end: "bottom 40%",
                        scrub: 1,
                    },
                    y: 100,
                    ease: "power3.inOut",
                    stagger: 0.02,
                    opacity: 0
                });
            })

            // members

            let team = [{
                    "name": "Juliana Creman",
                    "img": "yana.jpg",
                    "role": "Team Leader",
                },
                {
                    "name": "Rodwin Timonera",
                    "img": "rodwin.jpg",
                    "role": "Programmer",
                },
                {
                    "name": "Lalaine Obeja",
                    "img": "lalaine.jpg",
                    "role": "Data Analyst",
                },
                {
                    "name": "Lailani Mahilum",
                    "img": "lance.jpg",
                    "role": "System Analyst",
                },
                {
                    "name": "Micah Verano",
                    "img": "micah.jpg",
                    "role": "System Analyst",
                },
            ]

            let html = "";

            for (let i = 0; i < team.length; i++) {
                html += `
                     <div class="member col-span rounded-xl  flex flex-col justify-center items-center">
                        <div class="member__img-wrapper h-[300px] md:h-[400px] w-[200px] md:w-[300px] overflow-hidden">
                            <img src="developers/${team[i].img}" alt="${team[i].name}" class="w-full h-full object-cover object-center filter grayscale-100 hover:filter-none ctransition cursor-pointer rounded-xl filter grayscale hover:filter-none overflow-clip" style="clip-path: inset(0 0 0 0);">
                        </div>
                        <div class="member__text-wrapper mt-4 text-center">
                            <p class="member__name border md:border-2 border-sdgreen px-3 md:px-4 py-1 rounded-full font-bold ">${team[i].name}</p>
                            <p class="member__role font-light mt-2">${team[i].role}</p>
                        </div>
                    </div>
                `;
            }

            $(".team__members").html(html);

            $(".member .member__img-wrapper img, .unknown").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom bottom",
                        scrub: true,
                    },
                    clipPath: "inset(100% 0 0 0)",
                    stagger: 0.1,
                })
            })

            $(".member__name").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom 80%",
                        scrub: true,
                    },
                    y: 100,
                    stagger: 0.02,
                    ease: "power3.inOut",
                    opacity: 0,
                })
            })

            $(".member__role").each(function() {
                gsap.from($(this), 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom 80%",
                        scrub: true,
                    },
                    y: 100,
                    stagger: 0.02,
                    ease: "power3.inOut",
                    opacity: 0,
                })
            })

            gsap.from(".pill", 2, {
                scrollTrigger: {
                    trigger: ".team__behind",
                    start: "top bottom",
                    end: "bottom 80%",
                    scrub: true,
                },
                y: 140,
                stagger: 0.05,
                ease: "power3.inOut",
                opacity: 0,
            })

            $(".intro__header-text").each(function() {
                let introSplit = new SplitType($(this));
                gsap.from(introSplit.chars, 2, {
                    scrollTrigger: {
                        trigger: $(this),
                        start: "top bottom",
                        end: "bottom 80%",
                        scrub: true,
                    },
                    y: 100,
                    stagger: 0.02,
                    ease: "power3.inOut",
                })
            })

            gsap.from(".intro__sub p", 2, {
                scrollTrigger: {
                    trigger: ".intro__sub",
                    start: "top bottom",
                    end: "bottom bottom",
                    scrub: true,
                },
                y: 140,
                stagger: 0.05,
                ease: "power3.inOut",
                opacity: 0,
            })

            gsap.from(".back", 2, {
                y: 140,
                stagger: 0.05,
                ease: "power3.inOut",
                opacity: 0,
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
