<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/maps/leaflet.css') }}">
    <link rel="manifest" href="{{ asset('__manifest.json') }}">
    <style>
        .webcame, .webcame video {
            width: 100% !important;
            height: auto !important;
            margin: auto;
            display: inline-block;
            border-radius: 10px;
        }

        #map {
            height: 300px;
        }
    </style>
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">E-Presensi</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">


        <div class="section full mt-2">
            <div class="row" style="margin-top:65px;">
                <div class="col">
                    <input type="hidden" name="lokasi" id="lokasi">
                    <div class="webcame"> </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-block" id="absensi"> <ion-icon name="camera-outline"></ion-icon> Absen Masuk</button>
                </div>
            </div>

            <!-- peta lokasi -->
            <div class="row">
                <div class="col mt-2">
                    <div id="map"></div>
                </div>
            </div>
            <!-- end peta lokasi -->
            
                
            </div>

        </div>



    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="file-tray-full-outline" role="img" class="md hydrated"
                    aria-label="file tray full outline"></ion-icon>
                <strong>Today</strong>
            </div>
        </a>
        <a href="#" class="item active">
            <div class="col">
                <ion-icon name="calendar-outline" role="img" class="md hydrated"
                    aria-label="calendar outline"></ion-icon>
                <strong>Calendar</strong>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <div class="action-button large">
                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Docs</strong>
            </div>
        </a>
        <a href="javascript:;" class="item">
            <div class="col">
                <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
                <strong>Profile</strong>
            </div>
        </a>
    </div>



    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('assets/js/base.js') }}"></script>

    <script src="{{ asset('assets/js/lib/webcame.js') }}"></script>
    <script src="{{ asset('assets/maps/leaflet.js') }}"></script>

    <script>
        //untuk webcam
        Webcam.set({
          height : 860,
          width: 670,
          image_format: 'jpg',
          jpeg_quality: 80    
        })

        Webcam.attach('.webcame');

        // untuk locasi
        if( navigator.geolocation ){
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }else{
            alert('gagal');
        }

        function successCallback(data){
            const lokasi = data.coords.latitude +',' + data.coords.longitude;
            $('#lokasi').val(lokasi);
            const map = L.map('map').setView([data.coords.latitude, data.coords.longitude], 17);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

            // menambahkan marker posisi
            const marker = L.marker([data.coords.latitude, data.coords.longitude]).addTo(map);

            // menambahkan lingkaran radius
            // latitude dan longitude diisi dengan lokasi kantor
            const circle = L.circle([data.coords.latitude, data.coords.longitude], {
                        color: 'green',
                        fillColor: 'green',
                        fillOpacity: 0.5,
                        radius: 30 // satuan dalam meter
                    }).addTo(map);

            }

            function errorCallback(){

            }
    </script>


</body>

</html>