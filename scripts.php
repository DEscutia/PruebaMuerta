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
  var izq = {
    lat: 20.1311721,
    lng: -101.1909645
  };
  function initMap() {
    map = new google.maps.Map(document.getElementById('map-container'), {
      center: izq,
      zoom: 18
    });
    var marker = new google.maps.Marker({
      position: izq,
      map: map,
      title: "Funerarias Izquierdo"
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzsLS8zFEb5D0vpDtdJ_Gk17DooR7Mnzo&callback=initMap" async defer></script>