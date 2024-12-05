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
</head>

<body class="bg-cwhite relative">
    <div class="content__wrapper">

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
                <p class="text-xl italic">City By The Bay</p>
                <p class="font-font1 text-8xl mt-2">Bislig City</p>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize the map to Bislig City
            let map = L.map('map').setView([8.2098, 126.3224], 13);

            // Title Layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
            map.zoomControl.setPosition('bottomright');

            // Define the redIcon before using it
            const redIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41], // size of the icon
                iconAnchor: [12, 41], // point of the icon which will correspond to marker's location
                popupAnchor: [1, -34], // point from which the popup should open relative to the iconAnchor
                shadowSize: [41, 41] // size of the shadow
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
                        icon: redIcon
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

                                // Only update the recommendations section if restaurants exist
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
        });
    </script>
</body>

</html>
