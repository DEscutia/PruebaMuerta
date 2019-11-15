<section>
    <a name="servicios">
        <h3 class="h3 text-center mb-5">Servicios</h3>
    </a>
    <!-- Card deck -->
    <div class="card-deck">
        <?php
        require_once("admon/crud/crud.php");
        require_once('admon/Modelos/servicios.php');
        $crud = new Crud();
        $servicio = new Servicio();
        $listaServicios = [];
        $listaServicios = $crud->mostrarServicios();

        foreach ($listaServicios as $servicio) {
            echo "<div class ='card md-4'>";
            echo "<div class='view overlay'>";
            echo "<img class='card-img-top' src='admon/img/Servicios/" . $servicio->getImagen() . "' height=400 weight=400 alt='...'>";
            echo "</div>";
            echo "<div class='card-body'";
            echo "<h4 class='card-title'>" . $servicio->getTitulo() . "</h4>";
            echo "<p class='card-text'>" . $servicio->getDescripcion() . "</p>";
            echo "</div></div>";
        }
        ?>
    </div>
</section>