<?php
	$title = 'Inscription';
	ob_start();
?>

<div class="container">
	<div id="alertNone"></div>
	<h1 class="title">Inscrivez-vous...</h1>
	<p class="details">... pour prendre vos propres photos, faire vos propres montages et les partager avec les autres utilisateurs ! <br>Vous pourrez également liker et commenter leurs photos !</p>
	<hr>
	<form class="form-horizontal pt-5 pb-5" action="processRegistration" method="POST">
		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="username">Nom d'utilisateur</label>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="text" name="username" class="form-control" placeholder="ex: toto" id="username" pattern=".{2,25}" value="<?php if(isset($_SESSION['save_username'])){ echo $_SESSION['save_username']; } ?>" required autofocus>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="email">Adresse e-mail</label>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="email" name="email" id="email" class="form-control" placeholder="ex: toto@exemple.com" value="<?php if(isset($_SESSION['save_email'])){ echo $_SESSION['save_email']; } ?>" required>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="pass">Mot de passe</label>
			</div>
			<div class="col-md-8">
				<div class="form-group has-danger">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="password" name="pass" class="form-control" id="pass" pattern=".{8,}" required>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="passconfirm">Confirmation mot de passe</label>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="password" name="passconfirm" class="form-control" id="passconfirm" pattern=".{8,}" required>
					</div>
				</div>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-md-10 ml-4">
				<input type="checkbox" name="consent" id="consent" class="form-check-input" required>
				<label for="consent">
					J'ai lu et j'accepte la <a href="mentions_legales">politique d'utilisation des données</a>
				</label>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-md-5">
				<button type="submit" class="style-button button-color-submit">C'est parti !</button>
			</div>
		</div>
	</form>
</div>

<?php
	$content = ob_get_clean();
	require('./view/template/templatePublic.php');
?>
