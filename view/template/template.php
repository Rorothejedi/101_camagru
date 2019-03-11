<?php
	require_once('./config/initRessources.php');
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<title>Instagru | <?= $title ?></title>
		<?= $meta ?>

		<!-- Tags Open Graph -->
		<meta property="og:title" content="<?= $title ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?= $urlAdress ?>">
		<meta property="og:image" content="<?= $urlAdress ?>/public/img/imgOpenGraph.jpg">
		<meta property="og:description" content="<?= $catchword ?>"/>
		<meta property="og:locale" content="fr_FR" />

		<!-- Tags Twitter Card -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="<?= $twitterTag ?>">
		<meta name="twitter:title" content="<?= $title ?>">
		<meta name="twitter:description" content="<?= $catchword ?>">
		<meta name="twitter:creator" content="<?= $twitterTag ?>">
		<meta name="twitter:image" content="<?= $urlAdress ?>/public/img/imgTwitterCard.jpg">

		<!-- Tags Google -->
		<meta name="description" content="<?= $title ?>">
		<meta name="keywords" content="<?= $keywords ?>">

		<!-- CSS Bootstrap / Icons FontAwesome / Stylesheet / Favicon -->
		<?php
			echo $cdnBootstrap;
			echo $cdnFontAwesome;
			echo $cdnGoogleFont;
			if (isset($_SESSION['user_theme']) && $_SESSION['user_theme'] == '0')
				echo $lightTheme;
			else
				echo $darkTheme;
			echo $stylesheet;
			echo $animateCSS;
			echo $favicon;
			if ($title == 'Studio')
			{
				echo $miniSlider;
				echo $webcam;
			}
		?>
	</head>

	<body <?php if ($title == 'Studio') { echo 'onload="init();"';} ?>>
		<header>
			<nav class="navbar">
				<div class="container">
					<a class="navbar-brand" href="<?= \App\model\App::getDomainPath() ?>/" title="Instagru">Instagru</a>
					<?php if (isset($_SESSION['user_username'])) { ?>
						<div>
							<a href="<?= \App\model\App::getDomainPath() ?>/studio" title="Studio" class="style-button studio-button">
							Studio</a>
							<a href="<?= \App\model\App::getDomainPath() ?>/parametres" title="Paramètres (<?= $_SESSION['user_username'] ?>)">
								<i class="fas fa-user-alt"></i></a>
							<a href="<?= \App\model\App::getDomainPath() ?>/disconnect" title="Déconnexion">
								<i class="fas fa-power-off"></i>
							</a>
						</div>
					<?php } else { ?>
						<div>
							<a href="<?= \App\model\App::getDomainPath() ?>/connexion" class="style-button button-color-first mainButtons">Connexion</a>
							<a href="<?= \App\model\App::getDomainPath() ?>/inscription" class="style-button button-color-second mainButtons">Inscription</a>
						</div>
					<?php } ?>
				</div>
			</nav>
		</header>

		<section>
			<?php
				include('alerts.php');
				echo $content;
			?>
		</section>

		<footer class="d-flex align-items-center">
			<div class="container d-flex justify-content-center">
				<?php if ($title != "Mentions légales") { ?>
					<a href="<?= \App\model\App::getDomainPath() ?>/mentions_legales" class="small">Mentions légales</a>
				<?php } else { ?>
					<a href="<?= \App\model\App::getDomainPath() ?>/" class="small">Retour à la galerie</a>
				<?php } ?>
			</div>
		</footer>

		<?php 
			echo $alertJs;
		?>
	</body>

</html>
