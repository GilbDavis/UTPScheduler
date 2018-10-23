<?php session_start() ?>
<!DOCTYPE html>
<!-- Este documento contiene el header principal que se utiliza en todo el proyecto
junto con su Css -->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'LEMS - Perfil ' . $_SESSION['user_nom'] . ' ' . $_SESSION['user_ape']; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <style> header, body, footer{font-family: 'Lato';}</style>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../Css/Perfil.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php require '../Header_Footer/Header.php'; ?>

        <div class="container col-lg-100 col-lg-offset-3">
	<div class="row">
       <div class="col-md-7 ">

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
            <h4 style="color:#00b1b1;">Prasad Shankar Huddedar </h4></span>
              <span><p>Aspirant</p></span>
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">


<div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 ">Prasad</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Middle Name:</div><div class="col-sm-7"> Shankar</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> Huddedar</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7">15 Jun 2016</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">11 Jun 1998</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div><div class="col-sm-7">Shirdi</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7">Indian</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Relition:</div><div class="col-sm-7">Hindu</div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>


    </div>
    </div>
</div>

    </body>
</html>
