<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByaheOnTa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./custom.css">
</head>

<body class="font-font2 bg-cwhite relative overflow-x-hidden">
    <div class="hero-container ctransition w-full h-[700px] md:h-[112vh] overflow-hidden relative">
        <div class="overlay h-full w-full absolute top-0 left-0 flex justify-center items-center flex-col">

            <nav class="text-cwhite flex justify-between items-center absolute top-0 left-0 w-full p-8">
                <div class="logo font-font1 text-xl">ByaheOnTa</div>
                <!-- Desktop Nav -->
                <ul class="hidden md:flex justify-center items-center space-x-4 text-md">
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-tight"><a class="nav-link" href="#" class="cursor-pointer">Top Spots</a></li>
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a class="nav-link" href="#" class="cursor-pointer">Iterinary</a></li>
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a class="nav-link" href="#" class="cursor-pointer">Map</a></li>
                    <li class="hover:text-lgreen ctransition hover:italic overflow-hidden py-2 leading-3"><a class="nav-link" href="#" class="cursor-pointer">About Us</a></li>
                </ul>

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
            <button id="visitBtn" class="border border-lgreen hover:bg-transparent ctransition bg-lgreen rounded-full px-6 py-2 md:px-8 md:py-4 mt-4 md:mt-16 text-cwhite">Visit Now</button>



            <!-- Divider -->
            <div class="custom-shape-divider-bottom-1733039168">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
            <!-- Mobile Nav -->
            <div class="mobile-nav ctransition -translate-x-full mobile-nav inset-0 w-screen h-screen bg-sdgreen fixed top-0 left-0 z-10000 flex justify-center items-center ctransition">
                <div class="exit absolute top-4 right-8 text-cwhite">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
                <ul class="flex justify-start text-left items-center space-y-8 font-font1 text-7xl flex-col text-cwhite">
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#" class="cursor-pointer">Top Spots</a></li>
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#" class="cursor-pointer">Iterinary</a></li>
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#" class="cursor-pointer">Map</a></li>
                    <li class="hover:text-cwhite ctransition hover:underline hover:italic overflow-hidden py-2 ctransition"><a class="mobile-nav-link" href="#" class="cursor-pointer">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="top-spots h-screen">
        <h2>Top Spots</h2>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>
