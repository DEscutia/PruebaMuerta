<?php
    $titulo1 = "Titulo 1";
    $titulo2 = "Titulo 2";
    $titulo3 = "Titulo 3";
    $img1 = "http://espiritusantotepa.com/wp-content/uploads/2015/07/dscn1215-1024x768.jpg";
    $img2 = "https://upload.wikimedia.org/wikipedia/commons/e/e2/Cimetiere_americain_Colleville-sur-Mer.jpg";
    $img3 = "http://www.milagro.gob.ec/wp-content/uploads/2018/09/INTERIOR-DE-LA-SALA-DE-VELACI%C3%93N-N%C3%9AMERO-1-4.jpg";
    $desc1 = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat officia doloribus aliquam ratione distinctio commodi eaque perferendis quas voluptatum, laudantium, a laboriosam neque enim, dolores nulla adipisci temporibus omnis esse.";
    $desc2 = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et optio voluptas alias quae! Ex, necessitatibus! Tempore non esse, eaque quidem distinctio sed praesentium! Impedit dignissimos qui incidunt doloribus a. Ipsam";
    $desc3 = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ex minus totam necessitatibus, accusamus exercitationem placeat est dolores nesciunt similique illum odio officiis. Cum facere commodi similique vitae, saepe quas";
?>

<section>
    <a name="servicios"><h3 class="h3 text-center mb-5">Servicios</h3></a>
    <!-- Card deck -->
    <div class="card-deck">
        <?php 
        for($i=0;$i<3;$i++){
        echo "<div class ='card md-4'>";
        echo "<div class='view overlay'>";
        echo "<img class='card-img-top' src=$img1 alt='...'>";
        echo "</div>";
        echo "<div class='card-body'";
        echo "<h4 class='card-title'>$titulo1</h4>"; 
        echo "<p class='card-text'>$desc1</p>";
        echo "</div></div>";
        } 
        ?>
    </div>    
</section>