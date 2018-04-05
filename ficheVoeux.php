<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

    require_once("session.php");

    require_once("class.user.php");
    $auth_user = new USER();

    $grade = $_SESSION['grade'];

		if(isset($_POST['OUI']))
		{
			header('location:logout.php?logout=true');
		}
		
		$etud=$auth_user->runQuery1("SELECT * FROM etudiants where compt_id =".$_SESSION['user_session']);
		$etud=$etud->fetch();

	if(isset($_POST['choix'])){

		$auth_user->runQuery1("DELETE FROM fiche__de__vues where etud_id =".$etud['id']);
		$cmpt=1;

		while($cmpt <= 5){
			if(strip_tags($_POST['choix'.$cmpt])!= "vide"){
				$test=$auth_user->runQuery1("SELECT id FROM fiche__de__vues where etud_id =".$etud['id']." and sujet_id =".strip_tags($_POST['choix'.$cmpt]));

		         if($test->rowCount() ==0){
				    $array=array(':etud_id' => $etud['id'],
					    ':sujet_id'=> strip_tags($_POST['choix'.$cmpt]));
		            $ajouter=$auth_user->runQuery2("INSERT INTO fiche__de__vues (etud_id, sujet_id) VALUES (:etud_id, :sujet_id)",$array);

		            if ($ajouter) {
		                echo '<script language="javascript">';
		                echo 'alert("Fiche de vue est bien enregistré")';
		                echo '</script>';
		               }else{
		                echo '<script language="javascript">';
		                echo 'alert("Erreur d\'enregistrement")';
		                echo '</script>';
		               }
		           }
		    
			}
        $cmpt++;
        }
	}

    

?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>
<title>Gestion des PFE :Etudiants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Graduation a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- default-css-files -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- default-css-files -->

<!-- gallery css file-->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery css file-->

<!-- Online fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
<!-- //Online fonts -->

<!-- style.css-file -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- //style.css-file -->

<!-- Script-for-nav-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //Script-for-nav-scrolling -->

<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //Default-JavaScript-File -->
</head>
<!-- Head -->
<body>

<!-- banner section -->
<!-- popup for sign in form -->
<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div id="small-dialog1" class="mfp-hide book-form">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Déconnexion </h3>
					<form action="logout.php" method="post">
						<h5> voulez vous déconnecter ?</h5>
							<input type="submit" value="OUI"> <input type="submit" value="NON">

					</form>
			</div>
		</div>
	</div>
</div>
<!-- //popup for sign in form -->

<!-- popup for sign up form
<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div id="small-dialog2" class="mfp-hide book-form">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Inscription</h3>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="votre nom" required=""/>
						<input type="text" name="Prenom" placeholder="votre Prénom" required=""/>
						<input type="text" name="specialite" placeholder="Spécialité" required=""/>
						<input type="email" name="Email" class="email" placeholder="Email" required=""/>
						<input type="password" name="Password" class="password" placeholder="mot de passe" required=""/>
						<input type="password" name="Password" class="password" placeholder="Confirmer mot de passe" required=""/>
						<input type="submit" value="Inscription">
					</form>
			</div>
		</div>
	</div>
</div>-->
<!-- //popup for sign up form -->

<!-- TOP HEADER -->
<div class="top">
	<div class="container">
		<div class="col-md-4 top-left">
			<p><i class="fa fa-map-marker" aria-hidden="true"></i> Nouveau Pole ,Mansourah Tlemcen </p>
		</div>
		<div class="col-md-4 top-middle">
			<ul>
				<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
				
				<li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
				
				<li><a href="https://www.gmail.com"><i class="fa fa-google-plus"></i></a></li>

			</ul>
		</div>
		<div class="col-md-4 top-right">
			<a href="#" data-toggle="modal" data-target="#myModal1"><span></span> Déconnexion</a>
			<!--<a href="#" data-toggle="modal" data-target="#myModal2"><span></span> Inscription</a>-->
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!-- //TOP HEADER -->

		<div class="navigation">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
					</div>
					<div class="logo">
						<h1><a class="navber-brand" href="/pfemaster/Etudiant.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Gestion des PFE</a></h1>
					</div>
					<div class="collapse navbar-collapse navbar-right navigation-right" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-3" id="link-effect-3">

							<ul class="nav1 navbar-nav nav nav-wil">
								<li class="active"><a data-hover="Acceuil" href="Etudiant.php">Acceuil</a></li>
								<li><a data-hover="Thémes" href="Etudiant.php#theme" >Thémes </a></li>
								<li><a data-hover="Fiche de Voeux" href="ficheVoeux.php#fiche" >Fiche de Voeux </a></li>
								<li><a data-hover="Notifications" href="notification.php#notif" >Notifications</a></li>

								<li><a data-hover="Profile" href="profileET.php#prfl" >Profile</a></li>
							</ul>

						</nav>
					</div>
				</nav>
			<div class="clearfix"></div>
			</div>

		</div>
<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="images/g8.jpg">

			<div class="w3ls_banner_info">
				<div class="container">
				<div class="w3l-banner-grids">
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider4">
									<li>
										<div class="w3ls-text">
											<h3>Université Abou Baker Belkaid</h3>
							                <h3>Tlemcen</h3>
											<p>Site réservé aux étudiants Master 2<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Département d'informatique</h3>
							                <h3>GL,SIC,RSD,MID</h3>
											<p>Site réservé aux étudiants Master 2<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Université Abou Baker Belkaid</</h3>
							                <h3>Tlemcen</h3>
											<p>Site réservé aux étudiants Master 2<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Département d'informatique</h3>
							                <h3>GL,SIC,RSD,MID</h3>
											<p>Site réservé aux étudiants Master 2<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
								</ul>
							</div>
							<script src="js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });

								});
							 </script>
							<!--banner Slider starts Here-->
						</div>
			<div class="clearfix"> </div>
				</div>
					<!--modal-video-->
					<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">

							</div>
						</div>
					</div>
				</div>
			<div id="fiche"></div>
			</div>

	</div>
<!-- //banner section -->
<!--fiche de voeux-->
<div class="admission" >
	   <div class="container">
	   <div class="heading">
			<h3>fiche de voeux</h3><!--afficher ici le nom de la personne connecter PHP-->
		</div>
			<p>remplir les 05 thémes souhaités parmi les thémes proposer afin d'obtenir un théme a travailler sur.</P>
			<form action="#" method="post">
				<div class="col-md-6 admission_left">
				<h2>Liste des thémes suggérés</h2>
			        <?php  
			          $cmpt=1;

			          $exist=$auth_user->runQuery1("SELECT id,titre FROM sujets where  id in (SELECT sujet_id FROM fiche__de__vues where etud_id =".$etud['id'].")");

			          while ( $cmpt <= 5) {
			        ?>

				   <div class="select-block1">
					<select name="<?php echo "choix".$cmpt;  ?>">
					    <option value="vide"> </option>
			        <?php 
			          $spec_id=$auth_user->runQuery1("SELECT id FROM specialites where specialite ='".$etud['specialite']."'");
			          $spec_id=$spec_id->fetch();

			          $themes=$auth_user->runQuery1("SELECT id,titre FROM sujets where  id in (SELECT  sujet_id FROM specialite__sujets where specialite_id =".$spec_id['id'].")");

			            $fch=$exist->fetch();
			            $val=0;
			             while($theme=$themes->fetch()){ 
			          	if($fch and $val == 0){$val++;
                            echo "<option value='".$fch['id']."' selected>".$fch['titre']."</option>";
			          	}else {
			        ?>
						<option value="<?php echo $theme['id'];  ?>"><?php echo $theme['titre'];  ?></option>
                    <?php }}?>
				   </select>
				 </div>
                    <?php $cmpt++; } ?>

				 <input type="submit" name="choix" value="Valider" class="course-submit" >

</div>
</div>
</div>
<!--//fiche de voeux-->






<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<p>© 2018 Gestion des PFE . tout droits réservés| créer par <a href="#">SML Company</a></p>
			</div>
			<div class="footer-right">
				<div class="wthree-icon">
					<a href="https://www.twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com" class="facebook"><i class="fa fa-facebook"></i></a>
					<a href="https://www.gmail.com" class="google"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->

<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- For Gallery js files -->
<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});
		});
    </script>
<!-- //For Gallery js files -->



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
