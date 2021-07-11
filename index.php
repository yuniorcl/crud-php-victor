<?php
session_start();
require("config.php");
require 'php/core/autoload.php';
$pageDetails = Page::getPageDetailsByName($currentPage);
?>

<?php include "php/pages/header.php"; ?>
   
    <div class="row main-row">
        <div class="9u">
            <section class="left-content">
                 <h2><?php echo stripslashes($pageDetails->getTitle()); ?></h2>
            <?php echo stripslashes($pageDetails->getDesc()); ?>
            </section>

        </div>               
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>[CRUD] CREATE, RETRIEVE, UPDATE &amp; DELETE</h2>
            <p class="lead">Ejemplo de ver, agregar, actualizar, eliminar con PHP y MySQL los empleados</p>
            <p>Instrucciones:</p>
            <ol>
                <li>Empleados</li>
                <li>Agregar elementos desde el boton agregar.</li>
                <li>Seleccionar el boton Editar de cualquier elemento.</li>
                <li>Seleccionar el boton Eliminar de cualquier elemento.</li>
            </ol>
            <br>
            <ul type="none">
                <li><i class="glyphicon glyphicon-ok"></i> Facil de instalar y modificar.</li>
                <li><i class="glyphicon glyphicon-ok"></i> El Script con la BBDD en la raíz del proyecto.</li>
            </ul>

        </div>
    </div>  
<?php include("php/pages/footer.php"); ?>
