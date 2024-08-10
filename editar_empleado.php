<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $ide=$_REQUEST['ide'];
    $consulta="SELECT * FROM empleados E INNER JOIN cargo C ON E.cargo=C.cargo_id INNER JOIN privilegio P ON E.privilegio=P.privilegio_id INNER JOIN estado ES ON E.estado=ES.estado_id WHERE E.id_empleados='$ide'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
?>
    <div class="right_col" role=""> <!-- page content -->
      <div class="">
        <div class="page-title">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Editar Empleado</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
<!-- form search -->
<!-- end form search -->
              <div class="x_content">
                <div class="">
                  <!-- ajax -->
                  <form id="formulario" class="formulario" action="modificar_empleado.php?id=<?php echo $ide; ?>" method="post" enctype="multipart/form-data">
                    <fieldset class="fieldset_normal">
                      <h2>Datos</h2>
                      <hr>
                      <!-- <h3>algunas configuraciones</h3> -->
                      <div class="cont_cajas_peque">
                        <div class="cont_cajas_peque_x2">
                          <div class="cont_cajas_peque_x2_colum1">
                            <!-- <label class="etiq_caja">Foto</label> -->
                            <img src=" <?php echo $row['foto']; ?>" alt="" width="70" height="70">
                          </div>
                          <div class="cont_cajas_peque_x2_colum2">
                            <label class="etiq_caja">Cambiar foto</label>
                            <input type="file" name="foto" value="" placeholder="" accept="image/jpeg">
                          </div>
                        </div>
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Cedula</label>
                        <input type="text" name="cedula" value="<?php echo $row['cedula']; ?>" placeholder="" required maxlength="10" onkeypress="return solonumeroRUC(event)" >
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Nombres</label>
                        <input type="txt" name="nombres" value="<?php echo $row['nombre']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Apellidos</label>
                        <input type="txt" name="apellidos" value="<?php echo $row['apellido']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Fecha de nacimineto</label>
                        <input type="date" name="fecha_naci" value="<?php echo $row['fecha_nacimiento']; ?>" required placeholder="">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Cargo</label>
                        <select class="F_combo" name="cargo" required><option value="<?php echo $row['cargo_id']; ?>" ><?php echo $row['cargo_dscrp']; ?></option>
                        <?php $consulta4=mysqli_query($con,"SELECT * from cargo");
                          while($row4=mysqli_fetch_array($consulta4)){
                          echo "<option value='".$row4['cargo_id']."'>"; echo $row4['cargo_dscrp']; echo "</option>"; } ?> </select>
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Privilegio</label>
                        <select class="F_combo" name="privilegio" required><option value="<?php echo $row['privilegio_id']; ?>"><?php echo $row['privilegio_dscrp']; ?></option>
                        <?php $consulta4=mysqli_query($con,"SELECT * from privilegio");
                          while($row4=mysqli_fetch_array($consulta4)){
                          echo "<option value='".$row4['privilegio_id']."'>"; echo $row4['privilegio_dscrp']; echo "</option>"; } ?> </select>
                      </div>
                      <div class="conten_botom_formu">
                        <input  type="submit" name="enviar" value="Modificar" class="acao">
                        <a href="ingreso_empleados.php" class="cancelar">Cancelar</a>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /page content -->
<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<?php include "footer.php" ?>
