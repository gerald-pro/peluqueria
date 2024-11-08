<body class="login" style background ="vistas/img/login.png">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            
            <div class="animate form login_form" style="border:10px solid; border-radius:10px; background-color:#E1877E">
                <section class="login_content">

                    <form method="post">
                        <h1> </br>SALON DE BELLEZA XIOMI</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required=""
                                style="width:90%; margin-left:5%" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword"
                                required="" style="width:90%; margin-left:5%" />
                        </div>
                        <div>

                            <button class="btn btn-success btn-block" type="submit"
                                style="width:90%; margin-left:5%">Entrar al sistema</button>


                            <a class="reset_pass" href="#"></a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                <a href="#signup" class="to_register"> </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />


                        </div>
                        <?php

                        $login =  new ControladorUsuarios();
                        $login->ctrIngresoUsuario();

                        ?>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>