<section>
  <a name="muestrario">
    <h3 class="h3 text-center mb-5">Muestrario</h3>
  </a>
  <div class="container">
    <div class="row mt-5 mb-4">
      <?php
      $uris = array(
        "http://www.funeuskadi.com/blog/archivos/multimedia/2018/02/gama-excellence_3-300x239.jpg", "http://www.funeuskadi.com/blog/archivos/multimedia/2018/02/modelo-alma-300x235.jpg", "http://www.funeuskadi.com/blog/archivos/multimedia/2018/02/modelo-mandr%C3%A1gora-300x219.jpg", "http://www.funeuskadi.com/blog/archivos/multimedia/2018/02/gama-excellence_2-300x234.jpg"
      );
      $titulos = array(
        "Modelo fabricado en madera maciza de cedro-bosse",
        "Modelo Alma en madera de Paulownia",
        "Modelo Mandrágora en madera macizo vern",
        "Modelo fabricado en madera maciza de cedro-bosse"
      );
      $descripcion = array(
        "
          Material: Madera maciza de cedro-bossé.
          Acabados:Tiene un barnizado vista, tinte natural y un acabado satinado al agua.
          Medidas: Las medidas del interior del vaso son 1.900 x 595 x 305 (mm) y el exterior 983 x 673 x 490 (mm).
          Peso: 80kg
          Exterior:En el exterior cuenta con una cruz y Cristo de metal de diseño, asa de fuerza en la tapa y patas desmontables.
          Interior:Tapizado en color crema con un volante cubre-difunto y un cojín suelto. Sus detalles marcan su diferencia, como por ejemplo sus incrustaciones de madera clara en el zócalo, el aro de la tapa y el plano de la tapa.
      ",
        "
          Material: Madera paulownia.
          Acabados: Acabado satinado al agua y un tinte roble al agua. Los barnices utilizados no son contaminantes.
          Medidas: Las medidas del interior del vaso son 1.920 x 580 x 300 (mm) y el exterior 1.960 x 630 x 430 (mm).
          Peso: 35 kg.
          Exterior: En el exterior lleva cierres, una cruz varilla de madera y patas de desmontables.
          Interior: Interior tapizado en algodón en color crema, cuenta con un cojín y un cubre-difunto
         ",
        "     
          Material: Macizo vern.
          Acabados:acabado satinado al agua y un tinte al natural. Los barnices utilizados no son contaminantes.
          Medidas: Las medidas del interior del vaso son 1.942 x 570 x 300 (mm) y el exterior 2.010 x 645 x 435 (mm).
          Peso: 43 kg.
          Exterior:En el exterior cuenta con una cruz varilla de madera y patas de desmontables.
          Interior: Tapizado en algodón en color crema, con un cojín y un cubre-difunto.
          ",
        "
          Material: Madera maciza de cedro-bossé (también de origen africano, utilizada también para trabajos de carpintería fina y para construcción naval)
          Acabados:Acabado brillo, barnizado con un tinte pardo claro.
          Medidas:Las medidas del interior del vaso son 1.900 x 540 x 300 (mm) y el exterior 980 x 635 x 460 (mm).
          Peso:67 kg.
          Exterior: En el exterior cuenta con una cruz y Cristo de metal de diseño, todo en uno. Cuenta también con una cerradura, pernios laterales y patas desmontables.
          Interior: Tapizado en color crema con un volante cubre-difunto y un cojín suelto.
      "
      );

      for ($i = 0; $i < 4; $i++) {
        echo " <div class='col-md-4 mb-5'>";
        echo " <div class='card'>";
        echo "<img src=" . $uris[$i] . " alt='imagen'card-img-top'>";
        echo "<div class='card-body'>";
        echo "<H5 class='card-title'>" . $titulos[$i] . "</H5>";
        echo "<p>" . $descripcion[$i] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      } ?>
    </div>
  </div>
</section>