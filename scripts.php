<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
  // Animations initialization
  new WOW().init();
  </script>

  <!-- Google Maps -->
  <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzsLS8zFEb5D0vpDtdJ_Gk17DooR7Mnzo&callback=initMap">
  </script>

 <!-- <script>
    function regular_map(){
      var var_location = new google.maps.LatLng(20.131163,-101.190950);

      var var_mapoptions = {
        center: var_location,
        zoom: 5
      };

      var var_map = new google.maps.Map(document.getElementById
      ("map-container"), var_mapoptions);

      var var_market = new google.maps.Market({
        position: var_location,
        map: var_map,
        title: "Pending"
      });
    }
    google.maps.event.addDomListener(window,'load',regular_map);
  </script>-->
 