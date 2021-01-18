<?php 
    session_start();
    if (isset($_SESSION['usuario'])) {
        
    include "header.php";
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">Gestor de Archivos</h1>
        <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArchivos">
            <span class="fas fa-plus-circle"></span> Agregar archivos
        </span>
        <hr>
        <div id="tablaGestorArchivos"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar archivos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmArchivos" enctype="multipart/form-data" method="post">
                        <label>Categoría</label>
                        <div id="categoriasLoad"></div>
                        <label>Selecciona archivos</label>
                        <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarArchivo">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="modalVisualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


 <?php include "footer.php"; ?>
<script src="../js/gestor.js" ></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");

        agregarArchivosGestor();
    });
 </script>

 <?php 
    }else{
        header("Location:../index.php");
    }
  ?>