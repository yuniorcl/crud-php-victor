<?php 
require("../../config.php");
require '../core/autoload.php';
$employees = Employee::getAll();
?>

<?php if (!empty($employees) && count($employees) > 0): ?>
    <table class="table table-bordered table-hover">
        <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th></th>
    </thead>
    <?php foreach ($employees as $employee) { ?>
        <tr>
            <td><?php echo $employee->getName(); ?></td>
            <td><?php echo $employee->getLastName(); ?></td>
            <td><?php echo $employee->getEmail(); ?></td>
            <td><?php echo $employee->getAddress(); ?></td>
            <td><?php echo $employee->getPhone(); ?></td>
            <td style="width:150px;">
                <a data-id="<?php echo  $employee->getId(); ?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
                <a href="#" id="del-<?php echo  $employee->getId(); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                <script>
                    $("#del-" +<?php echo  $employee->getId(); ?>).click(function (e) {
                        e.preventDefault();
                        p = confirm("Estas seguro?");
                        if (p) {
                            $.get("./php/employee/eliminar.php", "id=" +<?php echo  $employee->getId(); ?>, function (data) {
                                loadTabla();
                            });
                        }

                    });
                </script>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php else: ?>
    <p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>
<!-- Modal -->
<script>
    $(".btn-edit").click(function () {
        id = $(this).data("id");
        $.get("./php/employee/formulario.php", "id=" + id, function (data) {
            $("#form-edit").html(data);
        });
        $('#editModal').modal('show');
    });
</script>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Actualizar</h4>
            </div>
            <div class="modal-body">
                <div id="form-edit"></div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->