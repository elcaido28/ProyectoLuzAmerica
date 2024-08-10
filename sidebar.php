        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><!-- sidebar menu -->
            <div class="menu_section">
                <ul class="nav side-menu abajo_linea">

                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="dashboard.php"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="registro_siembra.php"><i class="fab fa-houzz"></i> Planeación General</a>
                    </li>
                    <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="registro_aplicacion_productos_postcosecha.php"><i class="fas fa-book-open"></i> Tareas</a>
                    </li>
                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="registro_transporte.php"><i class="fas fa-project-diagram"></i>  asignación de TH</a>
                    </li>
                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="ingreso_planificacion.php"><i class="fas fa-boxes"></i>  Producción</a>
                    </li>
                    <li class="<?php if(isset($active6)){echo $active6;}?>">
                        <a href="ingreso_planificacion.php"><i class="fas fa-people-carry"></i>  Post Cosecha</a>
                    </li>
                    <li class="<?php if(isset($active7)){echo $active7;}?>">
                        <a href="ingreso_planificacion.php"><i class="fas fa-user-tie"></i>  Clientes</a>
                    </li>


                    <li class="nav-item dropdown <?php if(isset($active8)){echo $active8;}?>"> <a class="" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cogs"></i> Administración</a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown2">
                          <li class="dropdown-item">
                            <a class="a_ul_li" href="ingreso_empleados.php"><i class="far fa-user"></i> Empleados</a>
                          </li>
                          <li class="dropdown-item">
                            <a class="a_ul_li" href="ingreso_privilegios.php"><i class="fas fa-user-shield"></i> Privilegios</a>
                          </li>
                          <li class="dropdown-item">
                            <a class="a_ul_li" href="ingreso_cargos.php"><i class="fas fa-sitemap"></i> Cargos</a>
                          </li>
                          <li class="dropdown-item">
                            <a class="a_ul_li" href="ingreso_estudiantes.php"><i class="fas fa-archive"></i> Insumos Agricolas</a>
                          </li>
                          <li class="dropdown-item">
                            <a class="a_ul_li" href="ingreso_estudiantes.php"><i class="fas fa-pallet"></i> Insumos Cosecha</a>
                          </li>
                      </ul>
                   </li>

                  <li class="<?php if(isset($active9)){echo $active9;}?>">
                      <a href="ingreso_planificacion.php"><i class="fas fa-paste"></i> Reportes</a>
                  </li>



                </ul>
            </div>
        </div><!-- /sidebar menu -->
    </div>
</div>

    <div class="top_nav"><!-- top navigation -->
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $_SESSION['FOTO']; ?>" alt="">
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="dashboard.php"><i class="fa fa-user"></i> Mi cuenta</a></li>
                            <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div><script type="text/javascript">
        $(document).ready(function () {

  $('.navbar .dropdown-item').on('click', function (e) {
      var $el = $(this).children('.dropdown-toggle');
      var $parent = $el.offsetParent(".dropdown-menu");
      $(this).parent("li").toggleClass('open');

      if (!$parent.parent().hasClass('navbar-nav')) {
          if ($parent.hasClass('show')) {
              $parent.removeClass('show');
              $el.next().removeClass('show');
              $el.next().css({"top": -999, "left": -999});
          } else {
              $parent.parent().find('.show').removeClass('show');
              $parent.addClass('show');
              $el.next().addClass('show');
              $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
          }
          e.preventDefault();
          e.stopPropagation();
      }
  });

  $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
      $(this).find('li.dropdown').removeClass('show open');
      $(this).find('ul.dropdown-menu').removeClass('show open');
  });

});

        </script>
    </div><!-- /top navigation -->
