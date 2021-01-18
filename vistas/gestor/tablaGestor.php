<?php 
    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT 
            archivos.id_archivo AS idArchivo,
            usuario.nombre AS nombreUsuario,
            categorias.nombre AS categoria,
            archivos.nombre AS nombreArchivo, 
            archivos.tipo AS tipoArchivo,
            archivos.ruta AS rutaArchivo,
            archivos.fecha AS fecha
            FROM 
            t_archivos AS archivos 
            INNER JOIN 
            t_usuarios AS usuario on archivos.id_usuario = usuario.id_usuario
            INNER JOIN
            t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
            AND archivos.id_usuario = '$idUsuario'";
    $resul = mysqli_query($conexion,$sql);
 ?>
<div class="row">
    <dir class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark" id="tablaGestorDataTable">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Extensión del archivo</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    /*Arreglo de extensiones*/
                    $extensionesValidas = array('png','jpg','pdf','mp3','mp4');

                    while ($mostrar = mysqli_fetch_array($resul)) {
                      $rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];  
                      $nombreArchivo = $mostrar['nombreArchivo'];
                      $idArchivo = $mostrar['idArchivo'];
                    ?>
                    <tr>
                        <td> <?php echo $mostrar['categoria'];?> </td>
                        <td> <?php echo $mostrar['nombreArchivo'];?> </td>
                        <td> <?php echo $mostrar['tipoArchivo'];?> </td>
                        <td>
                            <a href="<?php echo $rutaDescarga; ?>" 
                                download="<?php echo $nombreArchivo; ?>"
                                class = "btn btn-success btn-sm">
                                <span class="fas fa-download"></span>
                            </a>
                        </td>
                        <td>
                            <?php
                                for ($i=0; $i <count($extensionesValidas) ; $i++) { 
                                     if ($extensionesValidas[$i]== $mostrar['tipoArchivo']) {      
                            ?>
                                        <span class="btn btn-primary btn-sm" 
                                        data-bs-toggle="modal" data-bs-target="#modalVisualizarArchivo"
                                        onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                            <span class="fas fa-eye"></span>
                                        </span>
                            <?php
                                     }
                                 } 
                             ?>
                        </td>
                        <td>
                            <span class="btn btn-danger" onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
                                <span class="fas fa-trash"></span>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </dir>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorDataTable').DataTable();
    });
</script>