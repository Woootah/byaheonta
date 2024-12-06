<?php
include "./config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByaheOnTa | Map</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="bg-cwhite relative">
    <div class="content__wrapper">
        <div class="itinerary__modal w-[80vw] md:w-[25vw] h-auto bg-cwhite fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 p-[3%] rounded-lg shadow-lg hidden">
            <div class="modal__exit absolute top-6 right-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="itinerary__wrapper">
                <p><span class="font-bold">From: </span><span class="from__location"></span></p>
                <p class="mt-4"><span class="font-bold">To: </span><span class="to__location"></span></p>
                <div class="date__wrapper mt-4 space-x-4">
                    <label for="tour__date" class="font-bold">Date: </label>
                    <input type="date" id="tour__date" class="bg-transparent h-[40px] border border-sdgreen rounded-lg px-4 py-2">
                </div>
            </div>
            <div class="addBtn mt-10 flex justify-end  items-center">
                <button class="add__itinerary px-8 py-1 border border-lgreen bg-lgreen text-cwhite rounded-lg mt-2 hover:text-sdgreen hover:bg-transparent ctransition">Add</button>
            </div>
        </div>

        <!-- Map -->
        <div id="map" class="w-full h-[300px] md:h-[600px] relative z-0"></div>

        <!-- Go Back -->
        <a href="index.php" class="back flex items-center space-x-4 absolute top-10 left-10 hover:scale-[0.9px] z-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2 w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </a>

        <div class="location__details bg-white w-full md:w-[400px] h-[70vh] md:h-[100vh] fixed bottom-0 left-0 md:left-auto md:right-0  md:top-1/2 p-4 rounded-t-2xl md:rounded-tr-none md:rounded-l-2xl md:transform md:-translate-y-1/2 z-10 hidden shadow-xl ctransition">
            <div class="exit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="location__img-wrapper rounded-2xl overflow-hidden h-[200px] mt-4">
                <img src="" alt="" class="w-full h-full object-cover object-center">
            </div>
            <div class="location__info mt-4">
                <p class="location__name font-bold uppercase text-lg"></p>
                <p class="location__coords text-sm text-red-500"></p>
                <p class="location__description"></p>
            </div>
            <div class="line border border-grey-300 mt-4"></div>
            <div class="recommendations__wrapper mt-4">
                <p>Recommended Restaurants: </p>
                <div class="recommendations h-[200px] md:h-full overflow-y-auto mt-4">
                    <!-- Dynamic Content -->
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="content__wrapper p-[5%]">
            <div class="header">
                <div class="overflow-hidden py-2">
                    <p class="title__upper text-sm md:text-xl italic">City By The Bay</p>
                </div>
                <div class="overflow-hidden py-2">
                    <p class="title__lower font-font1 text-6xl md:text-8xl mt-2">Bislig City</p>
                </div>
            </div>

            <div class="route__suggestion grid grid-cols-2 grid-rows-2 w-full mt-24">
                <div class="route__suggest w-full col-span-2 row-span-1 md:col-span-1 md:row-span-2  md:w-[600px]">
                    <div class="label">
                        <label for="from" class="font-bold">From: </label>
                    </div>
                    <div class="mt-4">
                        <input type="text" id="from" class="w-full h-[40px] outline-none px-1 bg-transparent border border-sdgreen rounded-lg" placeholder="Enter location" autocomplete="off">
                        <button class="user__get-location px-4 py-1 border border-lgreen bg-lgreen text-cwhite rounded-lg mt-2 hover:text-sdgreen hover:bg-transparent ctransition hidden">Get My Location</button>
                    </div>
                    <div class="user__location mt-4">
                        <select id="from__results" class="w-full h-[40px] outline-none px-1 bg-transparent border border-sdgreen rounded-lg hidden">
                            <!-- Dynamic Values -->
                        </select>
                    </div>
                    <div class="mt-8 label">
                        <label for="to" class="font-bold">Destination: </label>
                    </div>
                    <div class="mt-4">
                        <select id="to" class="w-full h-[40px] outline-none px-1 bg-transparent border border-sdgreen rounded-lg">
                            <!-- Dynamic Values -->
                        </select>
                    </div>
                    <div class="flex space-x-4">
                        <button class="submit__location px-6 py-2 border border-lgreen bg-lgreen text-cwhite rounded-lg mt-6 hover:text-sdgreen hover:bg-transparent ctransition">Submit</button>
                        <button class="add__location px-6 py-2 border border-lgreen bg-lgreen text-cwhite rounded-lg mt-6 hover:text-sdgreen hover:bg-transparent ctransition">Add to Itinerary</button>
                    </div>
                </div>

                <!-- Hero -->
                <div class="col-span-2 row-span-1 md:col-span-1 md:row-span-2 overflow-hidden w-full h-[300px]">
                    <img src="map/location/lubas.jpg" alt="" class="hero w-full h-full object-cover object-center overflow-clip" style="clip-path: inset(0 0 0 0);">
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        $(document).ready(function() {

            // Initialize the map to Bislig City
            let map = L.map('map').setView([8.2098, 126.3224], 13);

            // Title Layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
            map.zoomControl.setPosition('bottomright');


            const greenIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            // Attractions array
            let attractions = [{
                    name: "Tinuy-an Falls",
                    image: "tinuyan.jpg",
                    coords: [8.171977610203989, 126.22814388123145],
                    description: "Dubbed as the 'Niagara Falls of the Philippines', this is a multi-tiered waterfall and a must-see attraction.",
                    restaurants: [{
                        name: "Enday's Store and Eatery",
                        description: "Enday 's Store and EateryA local eatery located near Tinuy - an Falls,serving a variety of home - cooked Filipino dishes.",
                        rating: 5
                    }, ]
                },
                {
                    name: "Hagonoy Island",
                    image: "hagonoy.jpg",
                    coords: [8.255964762063575, 126.36972116047887],
                    description: "A pristine white sand island perfect for swimming and relaxing.",
                    restaurants: []
                },
                {
                    name: "Lawigan Beach",
                    image: "lawigan.jpg",
                    coords: [8.238307359240986, 126.43745120778061],
                    description: "A beautiful beach with golden sands and crystal-clear waters.",
                    restaurants: []
                },
                {
                    name: "Hotspring Resort",
                    image: "hotspring.jpg",
                    coords: [8.179134269791465, 126.32065481996821],
                    description: "A popular swimming pool resort in Bislig City that offers a relaxing environment with warm, soothing waters."
                },
                {
                    name: "Hinayagan Cave",
                    image: "hinayagan.jpg",
                    coords: [8.298080704624635, 126.31792982301592],
                    description: "A natural cave known for its stunning light displays and serene atmosphere."
                },
                {
                    name: "Lake 77",
                    image: "lake77.jpg",
                    coords: [8.175698194271245, 126.2793947513059],
                    description: "A peaceful lake surrounded by lush greenery, perfect for relaxation.",
                    restaurants: [{
                        name: "Lake 77 Fishing and Dining",
                        description: "A lakeside restaurant offering a unique dining experience where visitors can enjoy freshly prepared meals while fishing.",
                        rating: 4
                    }, ]
                },
                {
                    name: "Pier Uno",
                    image: "pier.jpg",
                    coords: [8.196688367370676, 126.36711725911692],
                    description: "A scenic pier offering coastal views and a spot to enjoy sunsets."
                },
                {
                    name: "Ocean View Park",
                    image: "ovp.jpg",
                    coords: [8.1829503590311, 126.34224550811413],
                    description: "A hilltop destination with panoramic views of Bislig City and the ocean.",
                    restaurants: [{
                        name: "Ocean View Park Restaurant",
                        description: "A scenic restaurant located within Ocean View Park, offering a variety of local dishes and refreshments.",
                        rating: 4
                    }, ]
                },
                {
                    name: "Lubas Naked Island",
                    image: "lubas.jpg",
                    coords: [8.671736457783052, 126.19495315121569],
                    description: "A small, uninhabited island known for its white sand beaches and clear waters, perfect for swimming and relaxation."
                },
                {
                    name: "Bislig City Baywalk",
                    image: "baywalk.jpg",
                    coords: [8.209270990686486, 126.32278295651952],
                    description: "A waterfront promenade offering scenic views of the sea, perfect for leisurely walks, sunset watching, and enjoying the fresh air.",
                    restaurants: [{
                            name: "Crayster's Eatery",
                            description: "A casual eatery located along Bislig City Baywalk",
                            rating: 5
                        },
                        {
                            name: "Pitstop Bar & Grill",
                            description: "A lively bar and grill located along Bislig City Baywalk, offering a wide selection of grilled dishes, seafood, and refreshing drinks.",
                            rating: 5
                        },
                        {
                            name: "Craysters Garden BBQ",
                            description: "A casual barbecue spot located along Bislig City Baywalk, offering a variety of grilled meats and local barbecue favorites.",
                            rating: 3
                        },
                    ]
                },
                {
                    name: "Bislig City Bayfront",
                    image: "bayfront.jpg",
                    coords: [8.188348227411142, 126.35180260425236],
                    description: "A scenic area along the coastline of Bislig City, offering beautiful views of the bay, ideal for relaxing walks, enjoying sunsets, and taking in the natural beauty of the surroundings.",
                    restaurants: [{
                        name: "Rooftop Cafe",
                        description: "A cozy rooftop cafe offering stunning views of Bislig Bay.",
                        rating: 5
                    }]
                },
                {
                    name: "Delot Cave",
                    image: "delot.jpg",
                    coords: [8.252618916311611, 126.28660145006124],
                    description: "A limestone cave in Bislig City, known for its stunning rock formations and natural beauty, making it a popular spot for caving and exploration."
                },
            ];

            // attraction details

            // attractions mapping
            attractions.forEach(function(attraction) {
                if (attraction.coords && Array.isArray(attraction.coords) && attraction.coords.length === 2) {

                    let marker = L.marker(attraction.coords, {
                        icon: greenIcon
                    }).addTo(map);

                    marker.on('click', function() {
                        $(".location__img-wrapper img, .location__name, .location__coords, .location__description, .recommendations").fadeOut(200, function() {

                            $(".location__img-wrapper img").attr('src', `map/location/${attraction.image}`);
                            $(".location__name").html(attraction.name);
                            let coordinates = attraction.coords.map((coord) => coord.toFixed(3));
                            $(".location__coords").html(coordinates.join(", "));
                            $(".location__description").html(attraction.description);

                            let recommendationHtml = "";
                            let none = "<p class='text-grey-300 mt-4'>No results</p>";

                            $(".recommendations").html("");

                            if (Array.isArray(attraction.restaurants) && attraction.restaurants.length > 0) {
                                attraction.restaurants.forEach((el) => {
                                    let rating = "";
                                    for (let i = 0; i < el.rating; i++) {
                                        rating += '★';
                                    }

                                    recommendationHtml += `
                                        <div class="recommendation mt-6 h-auto overflow-auto">
                                            <div class="restaurant flex items-center justify-between">
                                                <p class="restaurant__name font-bold">${el.name}</p>
                                                <div class="restaurant__reviews text-yellow-500">${rating}</div>
                                            </div>
                                            <p class="restaurant__description mt-3">${el.description}</p>
                                        </div>
                                    `;
                                });

                                $(".recommendations").html(recommendationHtml);
                            } else {
                                // If no restaurants, show "No results"
                                $(".recommendations").html(none);
                            }
                            $(".location__img-wrapper img, .location__name, .location__coords, .location__description, .recommendations").fadeIn(200);
                        })

                        $(".location__details").removeClass("hidden");

                    })
                } else {
                    console.error("Invalid coordinates for", attraction.name, attraction.coords);
                }
            });

            $(".exit").on("click", function() {
                $(".location__details").addClass("hidden");
            })

            // Populate destination
            let destinationHtml = "<option>Please Select A Destination</option>";
            attractions.forEach(function(attraction) {
                let destinationCoordinates = attraction.coords.join(", ");
                destinationHtml += `<option value="${destinationCoordinates}">${attraction.name}</option>`;
            })

            $("#to").html(destinationHtml);
            $(".user__get-location").on("click", getUserLocation);


            // Geolocation
            let userLocation = {
                lat: null,
                lon: null
            };

            function getUserLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            userLocation.lat = position.coords.latitude;
                            userLocation.lon = position.coords.longitude;
                            console.log(`Current Location: ${userLocation.lat}, ${userLocation.lon}`);

                            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${userLat}&lon=${userLon}&format=json&addressdetails=1`)
                                .then((response) => response.json())
                                .then((data) => {
                                    if (data && data.address) {
                                        const address = data.address;
                                        const fullAddress = `${address.road}, ${address.city}, ${address.state}, ${address.country}`;
                                        $("#user__get-location").html(fullAddress);
                                    }
                                })
                                .catch((error) => {
                                    console.error("Error in reverse geocoding:", error);
                                });
                        },
                        (error) => {
                            switch (error.code) {
                                case error.PERMISSION_DENIED:
                                    Toastify({
                                        text: "User denied the request for accessing their location.",
                                        className: "info",
                                        style: {
                                            background: "red",
                                        },
                                        gravity: "bottom",
                                        position: "left"
                                    }).showToast();
                                    break;
                                case error.POSITION_UNAVAILABLE:
                                    Toastify({
                                        text: "Location information is unavailable",
                                        className: "info",
                                        style: {
                                            background: "red",
                                        },
                                        gravity: "bottom",
                                        position: "left"
                                    }).showToast();
                                    break;
                                case error.TIMEOUT:
                                    Toastify({
                                        text: "Request timed out",
                                        className: "info",
                                        style: {
                                            background: "red",
                                        },
                                        gravity: "bottom",
                                        position: "left"
                                    }).showToast();
                                    break;
                                default:
                                    Toastify({
                                        text: "An unknown error occured.",
                                        className: "info",
                                        style: {
                                            background: "red",
                                        },
                                        gravity: "bottom",
                                        position: "left"
                                    }).showToast();
                            }
                        }
                    );
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            }

            let typingTimeout;

            $("#from").on("input", function() {
                if ($(this).val()) {
                    $(".user__get-location").removeClass("hidden");

                    clearTimeout(typingTimeout);

                    typingTimeout = setTimeout(() => {
                        if ($(this).val().length > 2) {
                            const bisligViewbox = "126.26,8.16,126.40,8.30";
                            const bounded = 1;
                            fetch(`https://nominatim.openstreetmap.org/search?q=${$(this).val()}&format=json&addressdetails=1&limit=5&viewbox=${bisligViewbox}&bounded=${bounded}`)
                                .then((response) => response.json())
                                .then((data) => {
                                    let locationHtml = "<option>Select from suggested locations</option>";
                                    if (Array.isArray(data) && data.length > 0) {
                                        data.forEach((loc) => {
                                            const fullAddress = `${loc.address.quarter ? loc.address.quarter + ", ": ""}${loc.address.city ? loc.address.city + ", ":""}${loc.address.state}`;
                                            locationHtml += `<option value="${fullAddress}">${fullAddress}</option>`;
                                        })
                                        $("#from__results").html(locationHtml);
                                        $("#from__results").removeClass("hidden");
                                    } else {
                                        $("#from__results").addClass("hidden");
                                    }
                                })
                                .catch((error) => console.error("Error fetching location:", error));
                        }
                    }, 300);

                } else {
                    $(".user__get-location").addClass("hidden");
                }
            })

            $("#from__results").on("change", function() {
                $("#from").val($(this).val());
                $("#from__results").addClass("hidden");
                $(".user__get-location").addClass("hidden");
            });

            let currentRoute = null;

            // location submit
            $(".submit__location").click(function() {
                let from = $("#from").val();
                let to = $("#to").val();

                if (from && to) {
                    let fromCoords = [8.2098, 126.3224];
                    let toCoords = [8.2383, 126.4374];

                    // Fetch "from" location coordinates
                    fetch(`https://nominatim.openstreetmap.org/search?q=${from}&format=json&addressdetails=1&limit=1`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                let fromLocation = data[0];
                                fromCoords = [parseFloat(fromLocation.lat), parseFloat(fromLocation.lon)];
                            }

                            // Fetch "to" location coordinates
                            fetch(`https://nominatim.openstreetmap.org/search?q=${to}&format=json&addressdetails=1&limit=1`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data && data.length > 0) {
                                        let toLocation = data[0];
                                        toCoords = [parseFloat(toLocation.lat), parseFloat(toLocation.lon)];
                                    }

                                    if (currentRoute) {
                                        currentRoute.remove();
                                    }

                                    // Create and display the route
                                    currentRoute = L.Routing.control({
                                        waypoints: [
                                            L.latLng(fromCoords),
                                            L.latLng(toCoords)
                                        ],
                                        routeWhileDragging: true
                                    }).addTo(map);

                                })
                                .catch(error => console.error("Error fetching 'to' coordinates:", error));
                        })
                        .catch(error => console.error("Error fetching 'from' coordinates:", error));

                    setLocation($("#to").val());
                } else {
                    Toastify({
                        text: "Please input both 'from' and 'to' locations",
                        className: "info",
                        style: {
                            background: "red",
                        },
                        gravity: "bottom",
                        position: "left"
                    }).showToast();
                }
            });

            function setLocation(location) {
                console.log(location);
                let coordinates = location.split(",");
                lat = coordinates[0].trim();
                lon = coordinates[1].trim();

                let locationCoords = attractions.filter((el) => el.coords[0] == lat && el.coords[1] == lon)[0];

                $(".location__img-wrapper img, .location__name, .location__coords, .location__description, .recommendations").fadeOut(200, function() {

                    $(".location__img-wrapper img").attr('src', `map/location/${locationCoords.image}`);
                    $(".location__name").html(locationCoords.name);
                    let coordinatesDisplay = locationCoords.coords.map((coord) => coord.toFixed(3));
                    $(".location__coords").html(coordinatesDisplay.join(", "));
                    $(".location__description").html(locationCoords.description);

                    let recommendationHtml = "";
                    let none = "<p class='text-grey-300 mt-4'>No results</p>";

                    $(".recommendations").html("");

                    if (Array.isArray(locationCoords.restaurants) && locationCoords.restaurants.length > 0) {
                        locationCoords.restaurants.forEach((el) => {
                            let rating = "";
                            for (let i = 0; i < el.rating; i++) {
                                rating += '★';
                            }

                            recommendationHtml += `
                                <div class="recommendation mt-6 h-auto overflow-auto">
                                    <div class="restaurant flex items-center justify-between">
                                        <p class="restaurant__name font-bold">${el.name}</p>
                                        <div class="restaurant__reviews text-yellow-500">${rating}</div>
                                    </div>
                                    <p class="restaurant__description mt-3">${el.description}</p>
                                </div>
                            `;
                        });

                        $(".recommendations").html(recommendationHtml);
                    } else {
                        // If no restaurants, show "No results"
                        $(".recommendations").html(none);
                    }
                    $(".location__img-wrapper img, .location__name, .location__coords, .location__description, .recommendations").fadeIn(200);
                })

                $(".location__details").removeClass("hidden");
            }

            $(".add__location").on("click", function() {
                if (!$("#from").val() || !$("#to").val()) {
                    Toastify({
                        text: "Please input both 'from' and 'to' locations",
                        className: "info",
                        style: {
                            background: "red",
                        },
                        gravity: "bottom",
                        position: "left"
                    }).showToast();
                    return;
                } else {
                    let modalCoords = $("#to").val().split(",");
                    let toLocation = attractions.filter((el) => el.coords[0] == modalCoords[0] && el.coords[1] == modalCoords[1])[0];
                    $(".itinerary__modal").removeClass("hidden");
                    $(".from__location").html($("#from").val());
                    $(".to__location").html(toLocation.name);

                }
            })

            $(".modal__exit").on("click", function() {
                $(".itinerary__modal").addClass("hidden");
            })

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

            $(".add__itinerary").on("click", function() {
                let email = getCookie('email');
                if (email) {

                    let fromValue = $(".from__location").html();
                    let toValue = $(".to__location").html();
                    let tourDate = $("#tour__date").val();


                    var request = $.ajax({
                        url: "itinerary.php",
                        method: "POST",
                        data: {
                            email,
                            fromValue,
                            toValue,
                            tourDate
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

                    $(".itinerary__modal").addClass("hidden");

                } else {
                    window.location.replace("http://localhost/byaheonta/public/login.php");
                }

            })

            gsap.registerPlugin(ScrollTrigger);

            const tl = gsap.timeline();

            let upper_split = new SplitType(".title__upper");
            let lower_split = new SplitType(".title__lower");

            tl.from("#map", 1, {
                    stagger: 0.02,
                    ease: "power3.inOut",
                    opacity: 0
                })
                .from(upper_split.chars, 1, {
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut"
                }, "-=0.6")
                .from(lower_split.chars, 1, {
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut"
                }, "-=0.8")
                .from(".back", 1, {
                    y: 50,
                    stagger: 0.02,
                    ease: "power3.inOut",
                    opacity: 0
                }, "-=0.8")
                .from(".route__suggestion, .hero", 2, {
                    y: 140,
                    stagger: 0.02,
                    ease: "power3.inOut",
                    opacity: 0
                }, "-=0.8")

        });
    </script>
</body>

</html>
