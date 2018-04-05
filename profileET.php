<?php

    require_once("session.php");

    require_once("class.user.php");
    $auth_user = new USER();

		if(isset($_POST['OUI']))
		{
			header('location:logout.php?logout=true');
		}
		
		$etud=$auth_user->runQuery1("SELECT * FROM etudiants where compt_id =".$_SESSION['user_session']);
		$etud=$etud->fetch();

		$compte=$auth_user->runQuery1("SELECT * FROM comptes where id =".$_SESSION['user_session']);
		$compte=$compte->fetch();

		$specialites=$auth_user->runQuery1("SELECT * FROM specialites");

	if(isset($_POST['enregistrer'])){

		$auth_user->runQuery1("UPDATE etudiants SET nom='".strip_tags($_POST['nom'])."' , prenom='".strip_tags($_POST['prenom'])."' , specialite='".strip_tags($_POST['specialite'])."' , tlf='".strip_tags($_POST['tlf'])."' , datNai='".strip_tags($_POST['datNai'])."' , adress='".strip_tags($_POST['adress'])."' WHERE id =".$etud['id']);

		if($compte['login']!=strip_tags($_POST['email'])){
			$auth_user->runQuery1("UPDATE comptes SET login='".strip_tags($_POST['email'])."' WHERE id =".$compte['id']);
		}

		echo '<script language="javascript">';
		echo 'alert("Les modifications sont bien enregistrés")';
		echo '</script>';

		$auth_user->redirect('profileET.php#prfl');
	}

	if(isset($_POST['modifier'])){
		echo $compte['mdp']." ".strip_tags($_POST['mdp']);
        if($compte['mdp']==strip_tags($_POST['mdp'])){
        	echo "string";
			/*if(strip_tags($_POST['nvmpd'])==strip_tags($_POST['cnfmdp'])){
			$auth_user->runQuery1("UPDATE comptes SET mdp='".strip_tags($_POST['nvmdp'])."' WHERE id =".$compte['id']);
		    }else{}*/
		}else{}
	}

?>





<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>
<title>Gestion des PFE :profile</title>
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
					<form action="#" method="post">
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
				
					<a href="https://www.twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com" class="facebook"><i class="fa fa-facebook"></i></a>
					<a href="https://www.gmail.com" class="google"><i class="fa fa-google-plus"></i></a>
				
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
						<h1><a class="navber-brand" href="Etudiant.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Gestion des PFE</a></h1>
					</div>
					<div class="collapse navbar-collapse navbar-right navigation-right" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-3" id="link-effect-3">

							<ul class="nav1 navbar-nav nav nav-wil">
								<li class="active"><a data-hover="Acceuil" href="Etudiant.php">Acceuil</a></li>
								<li><a data-hover="Thémes" href="Etudiant.php#theme" >Thémes</a></li>
								<li><a data-hover="Fiche de Voeux" href="Etudiant.php#fiche" >Fiche de Voeux </a></li>
								<li><a data-hover="Notifications" href="notifications.php" >Notifications</a></li>

								<li><a data-hover="Profile" href="profileET.php#prfl" > Profile</a></li>
							</ul>

						</nav>
					</div>
				</nav>
			</div>
			<div class="clearfix"></div>
		</div>
<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="images/g8.jpeg">

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
			<div id="prfl"></div>
			</div>

			</div>

	</div>
<!-- //banner section -->



<!-- profile form -->
<div class="admission">
	   <div class="container">
	   <div class="heading">
			<h3>profile</h3><!--afficher ici le nom de la personne connecter PHP-->
		</div>
			<p>vos information peuvent etre changer en toute sécurité</P>
			<form action="#" method="post">
				<div class="col-md-6 admission_left">
				<h2>Modifier vos Information</h2>
				    <!-- input pour le nom d'etudaint -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="nom" id="slider-name" value="<?php echo $etud['nom'];  ?>" type="text" required=""> 
				 </div>
				    <!-- input pour le prenom d'etudaint -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="prenom" id="slider-name1" value="<?php echo $etud['prenom'];  ?>" type="text" required="">
				 </div>
				    <!-- input pour la date de naissance d'etudaint -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="datNai" id="slider-name" value="<?php echo $etud['datNai'];  ?>" type="date" required="">
				 </div>
				    <!-- select pour la specialité d'etudaint -->
					<div class="select-block1">
					<select name="specialite">
						<option disabled="">Specialités</option>
						<?php

						while($spt = $specialites->fetch())
						{
							if($etud['specialite'] == $spt['specialite']){
                                echo "<option value='".$spt['specialite']."' selected>".$spt['specialite']."</option>";
							}else{
                                echo "<option value='".$spt['specialite']."'>".$spt['specialite']."</option>";
							}
						}

						  ?>
						
				   </select>
				 </div>
				    <!-- input pour l'adress' d'etudaint -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="adress" id="slider-name" placeholder="Adresse..." value="<?php echo $etud['adress'];?>" type="text" required>
				 </div>
				    <!-- input pour l'email' d'etudaint -->
	             <div class="input-group input-group1">
	                <input class="form-control has-dark-background" name="email" id="slider-name2" value="<?php echo $compte['login'];  ?>" type="email" required="">
	             </div>
				    <!-- input pour le telephon d'etudaint -->
	             <div class="input-group input-group1">
	                <input class="form-control has-dark-background" name="tlf" id="slider-name4" placeholder="N° Tél ..." value="<?php echo $etud['tlf'];  ?>" type="tel" required="">
	             </div>

	            <input type="submit" name="enregistrer" value="Enregistrer" class="course-submit">
	   	   </div>
             </form>

			<form action="#" method="post">
				<div class="col-md-6 admission_left">
				<h2>Modifier le mot de passe</h2>
				    <!-- input pour l'encient mot de passe' -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="mdp " id="slider-name" placeholder="Votre mot de passe ..." type="text" required=""> 
				 </div>
				    <!-- input pour le nouveau mot de passe -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="nvmpd" id="slider-name1" placeholder="Votre nouveau mot de passe ..." type="text" required="">
				 </div>
				    <!-- input pour la connfiremation de mot de passe -->
				 <div class="input-group input-group1">
					<input class="form-control has-dark-background" name="cnfmdp" id="slider-name" placeholder="Connfirmer votre nouveau mot de passe ..." type="text" required="">
				 </div>

	            <input type="submit" name="modifier" value="Enregistrer" class="course-submit">
	   	   </div>
             </form>

	   	   </div>
	   	</div>


	   	  <div class="clearfix"> </div>
</div>
<!-- //profile form -->





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
