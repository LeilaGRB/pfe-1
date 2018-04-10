
<?php




$bdd = new PDO('mysql:host=127.0.0.1;dbname=test2;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$id = $bdd->prepare('SELECT * FROM etudiants');
$id->execute();




/* Supprimer un medecin de la base de donnee*/

if(isset($_GET['supprimer_ens'])){
    $id_ens = (int) $_GET['supprimer_ens'];
    $id = $bdd->prepare("SELECT compt_id FROM etudiants WHERE id=".$id_ens);
    $id->execute();
    $compte=$id->fetch();
    $supp = $bdd->prepare("DELETE FROM comptes WHERE id=".$compte['compt_id']);
    $supp->execute();
     $suppr = $bdd->prepare("DELETE FROM etudiants WHERE id=".$id_ens);
     $suppr->execute();
    header('Location: Etudiants.php');
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Etudiants
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>CODE</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Specialite</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while($m=$id->fetch()) { ?>
          <tr>
        <td>  <?=$m['id']?>  </td>
        <td>  <?=$m['code']?>  </td>
        <td>  <?=$m['nom']?>  </td>
        <td>  <?=$m['prenom']?>  </td>
        <td>  <?=$m['specialite']?>  </td>
        <?php
         $req=$bdd->prepare("SELECT login FROM comptes WHERE id=".$m['compt_id']);
         $req->execute();
         while($mm=$req->fetch()){
         ?>
        <td>  <?=$mm['login']?>  </td>
      <?php }?>
        <td>


      <button class="btn btn-danger btn-md" onclick="deleteme(<?php echo $m['id'] ?>)" > Supprimer</button>
      <a href="profileETU.php?&id_ens=<?= $m['id'] ?>">
      <button class="btn btn-default btn-md" ><i class="fa fa-ey "></i> Détail</button></a>

      </td>
        </tr>
      <?php }?>
        </tbody>
      </table>

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
  function deleteme (delid)
     {
       swal({
        title: "Êtes-vous sûr?",
        text: "Vous ne pourrez pas récupérer ces informations",
          type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Oui, supprimez !",
            cancelButtonText: "Non, annulez!",
            closeOnConfirm: false,
            closeOnCancel: false
             },
            function(isConfirm){
            if (isConfirm) {
          window.location.href='?supprimer_ens='+delid+'';
          swal("Supprimé!", "infirmier supprimé .", "success");
           } else {
             swal("Annulé", "infirmier non supprime :)", "error");
             }
          });
        }
</script>
</body>
</body>
</html>
