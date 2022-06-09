<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIMEC Building Nearby</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container"> 
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Radius" id="radius" value="2">
                <div class="input-group-append">
                    <button onclick="getLocation()" class="btn btn-success" type="submit">Find</button>  
                </div>
            </div> 
            
            <hr>
            <p id="tableData"></p>
        </div>
    </div>

    <script>
        var x = document.getElementById("tableData");

        function getLocation() { 
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        function showPosition(position) { 
            var radius = $('#radius').val(); 
            $.ajax({
                type:'GET',
                url:'/api/friend-near-by',
                data:{
                    _token:  '<?php echo csrf_token() ?>',
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude,
                    radius: radius
                },
                success:function(data) { 
                    $("#tableData").html(data);
                }
            });
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
                case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
                case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
                case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
            }
        }
    </script>
</div>

</body>
</html>