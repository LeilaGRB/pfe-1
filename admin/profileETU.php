
<?php




$bdd = new PDO('mysql:host=127.0.0.1;dbname=test2;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$compte=(int) $_GET['id_ens'];
$id = $bdd->prepare("SELECT * FROM etudiants where id=".$compte);
$id->execute();

$compt=$id->fetch();



/*Requete mise a jour bdd*/
if(isset($_POST['update'])){
  $code=$_POST['code'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $spes=$_POST['spes'];
    $moy=$_POST['moy'];
    $date=$_POST['datNai'];
    $telephone=$_POST['telephone'];
    $adress=$_POST['adress'];
    $login=$_POST['login'];
    $mp=$_POST['mp'];
   $exu = $bdd->prepare("UPDATE ensegniants set code='".$code."', nom='".$nom."',prenom='".$prenom."'
   ,grade='".$grade."',commitent='".$comittent."',datNai='".$date."',tlf='".$telephone."',adress='".$adress."' where id='".$compte."'");
   $exu->execute();
    $exu = $bdd->prepare("select compt_id from ensegniants where id=".$compte);
    $exu->execute();
    $m=$exu->fetch();
    $cp=$m['compt_id'];
    $exu = $bdd->prepare("UPDATE comptes set login='".$login."',mdp='".$mp."' where id=".$cp);
    $exu->execute();
   header('location:profileEns.php?&id_ens='.$compte);
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PFE ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" type="text/css" href="dist/css/sweetalert.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>DP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gestion</b>PFE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small>Université Tlemcen</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Se Deconnecter</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <p>Administrateur</p>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Principale</li>
       <li><a href="index.php"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <li><a href="Enseignants.php"><i class="fa fa-book"></i> <span>Enseignants</span></a></li>
        <li><a href="Etudiants.php"><i class="fa fa-book"></i> <span>Etudiants</span></a></li>
        <li><a href="Themes.php"><i class="fa fa-book"></i> <span>Themes</span></a></li>
        <li><a href="Soutenances.php"><i class="fa fa-book"></i> <span>Soutenances</span></a></li>
          <li><a href="Voeux.php"><i class="fa fa-book"></i> <span>Voeux</span></a></li>
          <li><a href="Configuration.php"><i class="fa fa-book"></i> <span>Configuration</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adminstration
      </h1>
    </section>


    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$compt['nom']?> <?=$compt['prenom']?> </h3>

              <p class="text-muted text-center"><?=$compt['specialite']?></p>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">A propos de l'etudiant</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar margin-r-5"></i> DateNaissance</strong>

              <p class="text-muted">
              <?=$compt['datNai']?>
              </p>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Addresse</strong>

              <p class="text-muted"><?=$compt['adress']?></p>

              <strong><i class="fa fa-phone margin-r-5"></i> Numero Telephone</strong>

              <p class="text-muted"><?=$compt['tlf']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">ThemesChoisi</a></li>
              <li><a href="#settings" data-toggle="tab">ModfierProfile</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                  <h1>A programmer plus tard</h1>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Code</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="code" name="code" value="<?= $compt['code'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Nom</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nom" name="nom" value="<?= $compt['nom'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Prenom</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $compt['prenom'] ?>">
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="datNai" class="col-sm-2 control-label">DateNaisance</label>

                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="datNai" name="datNai" value="<?= $compt['datNai'] ?>">
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Specialite</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="spes" name="spes" value="<?= $compt['specialite'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="commitent" class="col-sm-2 control-label">Moyenne</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="commitent" name ="commitent" value="<?= $compt['moyenne_id'] ?>">
                    </div>
                  </div>


                  
                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Telephone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="telephone" name="telephone" value="<?= $compt['tlf'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Adress</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="adress" name="adress" value="<?= $compt['adress'] ?>">
                    </div>
                  </div>
                  <?php
                   $rec=$bdd->prepare("SELECT * FROM comptes where id=".$compt['compt_id']);
                   $rec->execute();

                   $pp=$rec->fetch();

                   ?>
                  <div class="form-group">
                    <label for="login" class="col-sm-2 control-label">Login</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="login" name="login" value="<?= $pp['login'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mp" class="col-sm-2 control-label"> MotDePasse  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mp" name="mp" value="<?= $pp['mdp'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="update" id="update" value="Modifier" class="btn btn-success" />
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://univ-tlemcen.dz">Université Tlemcen</a>.</strong> All rights
    reserved.
  </footer>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/sweetalert-dev.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
  $(function () {
    $('#example1').DataTable({
      'iDisplayLength': 5,
      'aLengthMenu': [[5, 10, 100, -1], [5, 10, "TOUT"]],
      "oLanguage": {
          "sSearch": "Rechercher: :",
          "oPaginate": { "sNext": "Suivant" ,"sPrevious": "Precedent" },
          "sEmptyTable": "Table Vide",
          "sInfo": "",
          "sLengthMenu": "Afficher _MENU_ Ligne",
          "sZeroRecords": "Aucun Resultat Trouve",
          "sInfoFiltered": "",
          "sInfoEmpty": ""
      }
    })
  })
  </script>
  </body>
  </body>
  </html>
