<section>
    <a name="obituarios"><h3 class="h3 text-center mb-5">Obituarios</h3></a>
 
    <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
      class="fas fa-chevron-right"></i></a>
</div>
<!--/.Controls-->
<br>
<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  <li data-target="#multi-item-example" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
   <!--Cada slide tiene que ser de 3 tarjetas-->
  <div class="carousel-item active">
  <div class="row">
    <?php
  
    $uris = array("https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                  ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                  ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg");
    $titulos= array("Titulo 1",
                    "Titulo 2",
                    "Titulo 3");
    $textos=array("Texto 1",
                  "Texto 2",
                  "Texto 3");
for($i=0;$i<3;$i=$i+1){
  echo "<div class='col-md-4 d-md-inline-block'>";
  echo "<div class='card mb-2'>";
   echo "<img class='card-img-top'
      src=
      ".$uris[$i]."
      alt='Card image cap'>";
    echo "<div class='card-body'> ";
     echo" <h4 class='card-title'>".$titulos[$i]."</h4>";
     echo "<p class='card-text'>".$textos[$i]."</p>";
    echo "</div>";
 echo "</div>";
echo"</div>";
 }
    ?>
    </div>
  </div>
  <!--/.Primer slide con el ITEM ACTIVO-->

  <!--Codigo para agregar cualquier otro slide pero sin el ITEM ACTIVO-->
  <?php
  for($j=0;$j<3;$j=$j+1){
  echo "<div class='carousel-item'>";
  echo "<div class='row'>";
    $uris = array("https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                  ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
                  ,"https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg");
    $titulos= array("Titulo ".$j,
                    "Titulo ".$j,
                    "Titulo ".$j);
    $textos=array("Texto 1",
                  "Texto 2",
                  "Texto 3");
for($i=0;$i<3;$i=$i+1){
  echo "<div class='col-md-4 d-md-inline-block'>";
  echo "<div class='card mb-2'>";
   echo "<img class='card-img-top'
      src=
      ".$uris[$i]."
      alt='Card image cap'>";
    echo "<div class='card-body'> ";
     echo" <h4 class='card-title'>".$titulos[$i]."</h4>";
     echo "<p class='card-text'>".$textos[$i]."</p>";
    echo "</div>";
 echo "</div>";
echo"</div>";
 }
 echo"</div>";
 echo"</div>";
}
    ?>
  <!--/.otros slides-->
</div>
<!--/.Slides-->
</div>
<!--/.Carousel Wrapper-->
</section>
