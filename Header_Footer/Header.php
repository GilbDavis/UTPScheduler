<?php
//Si la sesion no ha sido iniciada este script la inicia automaticamente
if (!isset($_SESSION)) {
    session_start();
}
//Si el usuario intenta acceder a las funciones del sistema sin estar logueado
//Este lo redirecciona al inicio de sesion
if (empty($_SESSION["user_id"])) {
    header("Location: ../index.php");
    die("Redireccionando al Login");
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../Css/Header.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style> header, body{font-family: 'Lato';}</style>
        <style type="text/css">#titulo{transform: translate(-50%, -50%);transition: all 500ms ease;}
            #titulo:hover{font-size: 51px;background: black;border-radius: 10px;}</style>
    </head>
    <body>
        <header>
            <div class="wrapper">
                <a href="<?php if($_SESSION['user_rol'] == 'Admin'){ echo '../SeccionAdmin/AdminMenu.php'; }else if($_SESSION['user_rol'] == 'Member'){ echo '../SeccionMember/MemberMenu.php'; } ?>"><img src='../Imagenes/LOGO.png' alt='Logo LEMS'/></a>
                <div class="logo">
                    <a id="titulo" href="<?php if($_SESSION['user_rol'] == 'Admin'){ echo '../SeccionAdmin/AdminMenu.php'; }else if($_SESSION['user_rol'] == 'Member'){ echo '../SeccionMember/MemberMenu.php'; } ?>">Agenda LEMS 2018</a>
                </div>
                <nav>
                    <a data-toggle="modal" data-target="#myModal"><?php echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></a>
                    <a href="../Login/CerrarSesion.php">Cerrar Sesión</a>
                </nav>
            </div>
        </header>

        <div class="container">

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Mi perfil</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">  <h4 >Perfil de usuario</h4></div>
                                <div class="panel-body">

                                    <div class="box box-info">

                                        <div class="box-body">
                                            <div class="col-sm-6">
                                                <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

                                                    <input id="profile-image-upload" class="hidden" type="file">
                                                    <div style="color:#999;" ></div>
                                                    <!--Upload Image Js And Css-->
                                                </div>

                                                <br>

                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 style="color:#00b1b1;"><?php echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></h4></span>
                                                <span><p><?php echo $_SESSION['user_cargo']; ?></p></span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr style="margin:5px 0 5px 0;">


                                            <div class="col-sm-5 col-xs-6 tital " >Nombre:</div><div class="col-sm-7 col-xs-6 "><?php echo $_SESSION['user_nom']; ?></div>
                                            <div class="clearfix"></div>
                                            <div class="bot-border"></div>

                                            <div class="col-sm-5 col-xs-6 tital " >Apellido:</div><div class="col-sm-7"> <?php echo $_SESSION['user_ape']; ?></div>
                                            <div class="clearfix"></div>
                                            <div class="bot-border"></div>

                                            <div class="col-sm-5 col-xs-6 tital " >Cedula:</div><div class="col-sm-7"> <?php $split =
                                            explode("-", $_SESSION['user_ced']); $union = array(str_pad($split[0], 2, 0, STR_PAD_LEFT), str_pad($split[1], 4, 0, STR_PAD_LEFT), str_pad($split[2], 5, 0, STR_PAD_LEFT));
                                            echo implode("-", $union); ?></div>
                                            <div class="clearfix"></div>
                                            <div class="bot-border"></div>

                                            <div class="col-sm-5 col-xs-6 tital " >Correo electronico:</div><div class="col-sm-7"><?php echo $_SESSION['user_corr']; ?></div>

                                            <div class="clearfix"></div>
                                            <div class="bot-border"></div>

                                            <div class="col-sm-5 col-xs-6 tital " >Rol:</div><div class="col-sm-7"><?php echo $_SESSION['user_rol']; ?></div>

                                            <div class="clearfix"></div>
                                            <div class="bot-border"></div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>
</html>
