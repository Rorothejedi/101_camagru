<?php 
	$title = 'Paramètres';
	ob_start();
?>

<div class="container">
	<div id="alertNone"></div>
	<h2 class="title">Informations du compte</h1>
	<hr>
	<form class="form-horizontal pt-5 pb-5" action="processEditUser" method="POST">
		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="username">Nom d'utilisateur</label>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="text" name="username" class="form-control" id="username" pattern=".{2,25}" value="<?= $userData->username() ?>" required>
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
						<input type="email" name="email" id="email" class="form-control" value="<?= $userData->email() ?>" required>
					</div>
				</div>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-md-4 field-label-responsive">
				<label for="pass">Mot de passe</label>
			</div>
			<div class="col-md-8">
				<div class="form-group has-danger">
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<input type="password" name="pass" class="form-control" id="pass" pattern=".{8,}">
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
						<input type="password" name="passconfirm" class="form-control" id="passconfirm" pattern=".{8,}">
					</div>
				</div>
			</div>
		</div>

		<br>
		
		<div class="row">
			<div class="col-md-5">
				<button type="submit" class="style-button button-color-settings">Modifier mes informations</button>
			</div>
		</div>
	</form>

	<h2 class="title">Préférences</h1>
	<hr>
	<form class="form-horizontal pt-5 pb-5" action="processEditPreference" method="POST">
		<div class="row">
			<div class="col-md-10 ml-4">
				<input type="checkbox" name="darkMode" id="darkMode" class="form-check-input">
				<label for="darkMode">
					Mode nuit (par défaut)
				</label>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-md-10 ml-4">
				<input type="checkbox" name="informCommentMail" id="informCommentMail" class="form-check-input">
				<label for="informCommentMail">
					Etre informé par email qu'un nouveau commentaire viens d'être posté sur l'un de mes Instashot
				</label>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 ml-4">
				<input type="checkbox" name="informLikeMail" id="informLikeMail" class="form-check-input">
				<label for="informLikeMail">
					Etre informé par email qu'un de mes Instashot viens d'être liké par un autre utilisateur
				</label>
			</div>
		</div>

		<br><br>
		
		<div class="row">
			<div class="col-md-5">
				<button type="submit" class="style-button button-color-settings">Modifier mes préférences</button>
			</div>
		</div>
	</form>
</div>


<?php 
	$content = ob_get_clean();
	require('./view/template/templatePublic.php');
?>