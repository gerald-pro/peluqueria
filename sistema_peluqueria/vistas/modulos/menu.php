<div class="col-md-3 left_col">

    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class='fa fa-pagelines fa-2x fa-rotate-180 fa-spin fa-border'
                    style='color:#20c997'></i> <span>SALON XIOMI</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">



            </div>
            <div class="profile_info">

                <h2> <?php echo $_SESSION["nombre"]; ?> </h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />


        <!-- sidebar menu -->

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            <li class="nav-item">
                <a href="inicio" class="nav-link">
                    <samp>INICIO</samp>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="usuarios">
                    <i class="fa fa-female fa-2x"></i>
                    <samp>USUARIOS</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="clientes" class="nav-link">
                    <i class="fa fa-group fa-2x"></i>
                    <samp>CLIENTES</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="servicios" class="nav-link">
                    <i class="fa fa-cut fa-2x" style="color:#0E0D0D"></i>
                    <samp>SERVICIOS</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="fichas" class="nav-link">
                    <i class='fa fa-calendar fa-2x' style='color:#0E0D0D'></i>
                    <samp>CITAS</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="crear-pago" class="nav-link">
                    <i class='fa fa-money fa-2x' style='color:#0E0D0D'></i>
                    <samp>TIPO SERVICIO</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="pagos" class="nav-link">
                    <i class='fa fa-dollar fa-2x' style='color:#0E0D0D'></i>
                    <samp>PAGOS</samp>
                </a>
            </li>

            <li class="nav-item">
                <a href="reportes" class="nav-link">
                    <i class='fa fa-file-pdf-o fa-2x' style='color:#0E0D0D'></i>
                    <samp>REPORTES</samp>
                </a>
            </li>

        </ul>


    </div>
    <!-- /sidebar menu -->
</div>

