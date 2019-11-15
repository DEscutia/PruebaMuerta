<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
            <Strong>Funeraria Izquierdo</Strong>
         </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php#quienes_somos">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#servicios">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#ubicacion">Ubicación</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#obituarios">Obituarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#muestrario">Muestrario</a>
            </li>
          </ul>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://www.facebook.com/funerariaizq/" class="nav-link" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
          </ul>

          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="admon/index.php" class="nav-link" target="_blank">
                <i class="far fa-user"></i>
              </a>
            </li>
          </ul>         

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Carousel Wrapper-->
  <!-- Variables para las imagenes del carrusel-->
  <?php 
    $img1 = "https://scontent.fcyw4-1.fna.fbcdn.net/v/t1.0-9/42867059_483368538847367_302428086333341696_n.jpg?_nc_cat=108&_nc_oc=AQnqfzf5nsvRMlF1ByoqLCEVQjbGxO9Qxss6Kj-yQQf0szjSj953R41Tjc6v7EhDxJ6bP2wzHsuhLPnYknrVZcyE&_nc_ht=scontent.fcyw4-1.fna&oh=49943b6c4565d64047f917ee3ab850d3&oe=5E58DCF9"; 
    $img2 = "https://scontent.fcyw4-1.fna.fbcdn.net/v/t1.0-9/71202321_693552777828941_4151164068578721792_n.jpg?_nc_cat=107&_nc_oc=AQlh2wQdUYkEXQW_eC0Pp5baWNTJYXhoeb9WGJMfuFIop0EBYyrbYXeykRRDybQxpwy9fh5y6a7OLqbwdBJYIS4s&_nc_ht=scontent.fcyw4-1.fna&oh=7354a1cf42765aa9380699e9571c7aab&oe=5E5C2891"; 
    $img3 = "https://scontent.fcyw4-1.fna.fbcdn.net/v/t1.0-9/70980454_693548251162727_1119324234603036672_o.jpg?_nc_cat=102&_nc_oc=AQlEmjYEcK6ZJb0MEIpZ9tAqU68SuyrX2X-yLtza4P-tiCRklQSjQJDH2ExpHsdftjGf8mM-YgPO0-MMvQpjNqrh&_nc_ht=scontent.fcyw4-1.fna&oh=5705a46f0236d81a9e3841c0199dffec&oe=5E6075D2"; 
  ?>

  <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
      <?php echo "<div class='view' style='background-image: url($img1); 
                                            background-repeat: no-repeat; 
                                            background-size: cover;'>" 
      ?>
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
      <?php echo "<div class='view' style='background-image: url($img2); 
                                            background-repeat: no-repeat; 
                                            background-size: cover;'>" 
      ?>
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
      <?php echo "<div class='view' style='background-image: url($img3); 
                                            background-repeat: no-repeat; 
                                            background-size: auto;'>" 
      ?>
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->