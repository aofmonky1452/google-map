<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .panel {
            width: 200px;
            position: fixed;
            top: 50px;
            right: 50px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0, 0.5);
            border-radius: 5px;
            padding: 20px;
            z-index: 100;
            color: #333;
        }
        .panel-control {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .panel-control b {
            margin-right: 10px;
        }
    </style>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
            const firebaseConfig = {
                apiKey: "AIzaSyDkiJWOiGw_0rotCAiQnrrJi-5xhNvRjFs",
                authDomain: "map-6ded4.firebaseapp.com",
                databaseURL: "https://map-6ded4-default-rtdb.firebaseio.com/",
                projectId: "map-6ded4",
                storageBucket: "map-6ded4.appspot.com",
                messagingSenderId: "684501103804",
                appId: "1:684501103804:web:9506312c6f4341d1deccb9",
                measurementId: "G-YP6ETK6XYZ"
            };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>


    <script>
    /* let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 13.8191369, lng: 100.5120993 },
            zoom: 17,
            });
        } */



    // Google Firebase
    var myVar = setInterval(myTimerNow, 1000);
    

    function myTimerNow() {
        firebase.database().ref("start/lat").once("value").then(function(snapshot) {
            document.getElementById("slat").innerHTML = snapshot.val();
            global slat = snapshot.val();
        });

        firebase.database().ref("start/lng").once("value").then(function(snapshot) {
            document.getElementById("slng").innerHTML = snapshot.val();
            const slng = snapshot.val();
        });

        firebase.database().ref("end/lat").once("value").then(function(snapshot) {
            document.getElementById("elat").innerHTML = snapshot.val();
        });

        firebase.database().ref("end/lng").once("value").then(function(snapshot) {
            document.getElementById("elng").innerHTML = snapshot.val();
        });

    }
   

    var myRendering = setInterval(initMap, 20000);

    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: {
                lat: 12.7545088,
                lng: 101.1370385 // Bangkok
            }
        });
        directionsDisplay.setMap(map);

        directionsService.route({
            origin: slat + "," + slng,
            destination: '13.8363526, 100.5060673',
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    



    // Google maps
    // function initMap() {
    //     var directionsService = new google.maps.DirectionsService;
    //     var directionsDisplay = new google.maps.DirectionsRenderer;
    //     var map = new google.maps.Map(document.getElementById('map'), {
    //         zoom: 7,
    //         center: {
    //             lat: 12.7545088,
    //             lng: 101.1370385
    //         }
    //     });
    //     directionsDisplay.setMap(map);

    //     var onChangeHandler = function() {
    //         calculateAndDisplayRoute(directionsService, directionsDisplay);
    //     };
    //     document.getElementById('start').addEventListener('change', onChangeHandler);
    //     document.getElementById('end').addEventListener('change', onChangeHandler);
    // }

    // function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    //     directionsService.route({
    //         origin: document.getElementById('start').value,
    //         destination: document.getElementById('end').value,
    //         travelMode: 'DRIVING'
    //     }, function(response, status) {
    //         if (status === 'OK') {
    //             directionsDisplay.setDirections(response);
    //         } else {
    //             window.alert('Directions request failed due to ' + status);
    //         }
    //     });
    // }
    </script>
</head>

<body>
    
    <div class="panel">
        <div class="panel-control">
            <b>Start lat: </b>
            <p id="slat"> 0000</p>
        </div>
        <div class="panel-control">
            <b>Start lat: </b>
            <p id="slng"> 0000</p>
        </div>
        <hr>
        <div class="panel-control">
            <b>End lat: </b>
            <p id="elat"> 0000</p>
        </div>
        <div class="panel-control">
            <b>End lat: </b>
            <p id="elng"> 0000</p>
        </div>
    </div>

    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap&libraries=&v=weekly"
        async></script>
</body>

</html>