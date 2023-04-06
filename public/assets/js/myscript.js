
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