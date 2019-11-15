<section>
    <a name="muestrario"><h3 class="h3 text-center mb-5">Muestrario</h3></a>
    <div class="container">
        <div class="row mt-5 mb-4">           
        <?php
          $uris = array(
           "https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
          ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
          ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
          ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg");
          $titulos= array(
            "Titulo 1",
            "Titulo 2",
            "Titulo 3",
            "Titulo 4");
          $descripcion=array(
          "Descripcion 1",
          "Descripcion 2",
          "Descripcion 3",
          "Descripcion 4");

        for($i=0;$i<4;$i++){
          echo" <div class='col-md-4 mb-5'>";
               echo" <div class='card'>";
                  echo"<img src=".$uris[$i]." alt='imagen'card-img-top'>";
                   echo "<div class='card-body'>";
                      echo "<H5 class='card-title'>".$titulos[$i]."</H5>";
                        echo"<p>".$descripcion[$i]."</p>";
                    echo"</div>";
                  echo"</div>";
              echo"</div>";

        } ?>
        </div>
    </div>
</section>
