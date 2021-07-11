<?php
require("../../config.php");
require '../core/autoload.php';
$employee = Employee::getById($_GET["id"]);
?>

<?php if ($employee != null): ?>

    <form role="form" id="actualizar" >
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $employee->getName(); ?>" name="name" required>
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input type="text" class="form-control" value="<?php echo $employee->getLastName(); ?>" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="address">Domicilio</label>
            <input type="text" class="form-control" value="<?php echo $employee->getAddress(); ?>" name="address" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo $employee->getEmail(); ?>" name="email" >
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" class="form-control" value="<?php echo $employee->getPhone(); ?>" name="phone" >
        </div>
        <input type="hidden" name="id" value="<?php echo $employee->getId(); ?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>

    <script>
        $("#actualizar").submit(function (e) {
            e.preventDefault();
            $.post("./php/employee/actualizar.php", $("#actualizar").serialize(), function (data) {
            });
            //alert("Agregado exitosamente!");
            //$("#actualizar")[0].reset();
            $('#editModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            loadTabla();
        });

        function loadTabla() {
            $('#editModal').modal('hide');

            $.get("./php/employee/tabla.php", "", function (data) {
                $("#tabla").html(data);
            });

        }
    </script>

<?php else: ?>
    <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>