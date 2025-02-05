<?php
  $title ="Sistema Educativo";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Registro de Transporte</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="" method="post" enctype="multipart/form-data">
                <fieldset class="fieldset_normal">
                  <h2>Datos del Transporte</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Placa</label>
                    <input type="txt" name="nombres" value="" placeholder="0001245" onkeypress="return sololetras(event)" onpaste="return false">
                    <!-- <input type="file" name="foto" value="" placeholder="" accept="image/jpeg"> -->
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Empresa</label>
                    <input type="txt" name="nombres" value="" placeholder="Nombre del Encargado" onkeypress="return sololetras(event)" onpaste="return false">
                    <!-- <input type="file" name="foto" value="" placeholder="" accept="image/jpeg"> -->
                  </div>

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Limpieza</label>
                    <input type="txt" name="nombres" value="" placeholder="Buena, mala, regular." onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Fecha de embarque</label>
                    <input type="date" id="fecha" name="fecha_naci" value="" placeholder="" onchange="fecha_edad(this.value);" >
                  </div>

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Hora de salida</label>
                    <input type="txt" name="apellidos" value="" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Tipo de Transporte</label>
                    <input type="text" name="telefono" id="telefono">
                  </div>
                  
                
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad de productos</label>
                    <input type="text" name="cedula" id="cedula" value="" placeholder="" onkeypress="return solonumeroRUC(event)" >
                  </div>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Enviar" class="acao">
                    <a href="dashboard.php" class="cancelar">Cancelar</a>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        <div class="table-responsive">
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                <th>FOTO</th>
                <th>CEDULA</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>ASIG. USUARIO</th>
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from empleados WHERE estado = 1");
                while($row=mysqli_fetch_array($consulta)){
              ?>
                <td> <img src=" <?php echo $row['foto']; ?>" alt="" width="100" height="100"> </td>
                <td><?php echo $row['cedula']; ?> </td>
                <td><?php echo $row['nombre'] ?> </td>
                <td><?php echo $row['apellido']; ?> </td>
                <td> <a href="asignar_usuario.php?id=<?php echo $row['id_empleados'] ?>"><button type="button" title="Asignar Usuario" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_empleado.php?ide=<?php echo $row['id_empleados']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /page content -->


<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script>
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>
<script type="text/javascript">
  $('.eliminar').click(function(e){
    if (confirm("¿Está segur@ de ELIMINAR?")){
      document.location.href="eliminar_empleado.php?id=<?php echo $row['id_empleados'];?>";
    }else{
      document.location.href="ingreso_empleados.php";
    }
  })
</script>
<script type="text/javascript">
  function fecha_edad() {
    var fecha_actual = new Date();
    var fecha = document.getElementById('fecha').value;
    var ano=fecha.substr(0,4);
    var ano_actual= fecha_actual.getFullYear();
    var mayor=parseInt(ano)+18;
    if (mayor>ano_actual) {
      alert("Tiene que ser Mayor de edad");
      var fecha = document.getElementById('fecha').value="00-00-0000";

    }
  }
</script>
<script type="text/javascript">
  $(document).on('keyup','#cedula', function(){
    var cedula = document.getElementById('cedula').value;
    array = cedula.split( "" );
    num = array.length;
    if ( num == 10 )
    {
      total = 0;
      digito = (array[9]*1);
      for( i=0; i < (num-1); i++ )
      {
        mult = 0;
        if ( ( i%2 ) != 0 ) {
          total = total + ( array[i] * 1 );
        }
        else
        {
          mult = array[i] * 2;
          if ( mult > 9 )
            total = total + ( mult - 9 );
          else
            total = total + mult;
        }
      }
      decena = total / 10;
      decena = Math.floor( decena );
      decena = ( decena + 1 ) * 10;
      final = ( decena - total );
      if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
        $("#cedula").css({
          "background-color": "rgba(56,208,49,0.5)"
        });
        return true;
      }
      else
      {
        alert( "La c\xe9dula NO es v\xe1lida!!!" );
        document.getElementById('cedula').value="";
        $("#cedula").css({
          "background-color": "rgba(0,0,0,0)"
        });
        return false;
      }
    }
    else
    {
      return false;
    }
  });
</script>
<?php include "footer.php" ?>
