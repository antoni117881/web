
            <?php
             //require_once __DIR__ . '/web/controller/Usuario/listarUsuarios.php';
            require_once __DIR__. '/../../../controller/Usuario/listarUsuarios.php';

            ?>
    <div class="">
                <div class="">
                <table class="tabla"> 
                    <tr>
                        <th>Fecha de registro</th>
                        <th> Nombre de Cuenta</th>
                        <th> Pregunta</th>
                        <th> Respuesta</th>
                        <th> Id </th>
                        <th> Nombre </th>
                        <th> Apellido</th>
                        <th> Email</th>
                        <th> Telefono</th>
                        <th> Direccion</th>
                        <th> Contraseña</th>
                        <th> Rol</th>
                    </tr>
                    <?php 
                    if ($usuarios) {   
                        foreach ($usuarios as $usuario) {
                            ?> 
                    <tr>
                        <td><?php echo $usuario['fecha_registro']; ?> </td>
                        <td><?php echo $usuario['nombre_cuenta']; ?> </td>
                        <td><?php echo $usuario['pregunta']; ?> </td>
                        
                        <td><?php echo $usuario['respuesta']; ?> </td>
                        <td><?php echo $usuario['id_usuario' ]; ?></td>
                        <td><?php echo $usuario['nombre' ]; ?></td>
                        
                        <td><?php echo $usuario['apellido' ]; ?></td>
                        <td><?php echo $usuario['email' ]; ?></td>
                        <td><?php echo $usuario['telefono' ]; ?></td>
                        
                        <td><?php echo $usuario['direccion' ]; ?></td>
                        <td><?php echo $usuario['contraseña' ]; ?></td>
                        <td><?php echo $usuario['rol' ]; ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
                </div>
            </div>

<style>
 table {
    width: 50%;
    border-collapse: collapse; /* Para que los bordes no se dupliquen */
    }
    th, td {
        border: 2px solid black; /* Borde en cada celda */
        padding: 8px;
        text-align: center;
        background-color:rgb(198, 198, 198);
    }
    th {
        background-color: #f2f2f2; /* Color de fondo para los encabezados */
    }
</style>