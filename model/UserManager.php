<?php
namespace App\model;

/**
 * Permet de gérer les requêtes concernant les utilisateurs.
 */
class UserManager
{
	/**
	 * Permet l'ajout d'un utilisateur dans la base de données.
	 * @param User $user Prends l'objet User en paramètre.
	 */
	public function addUser(User $user)
	{
		$data = App::getDb()->prepare('
			INSERT INTO 
				user (username, email, password, token) 
			VALUES 
				(:username, :email, :password, :token)', 
			['username' => $user->username(),
			'email'     => $user->email(),
			'password'  => $user->password(),
			'token'     => $user->token()],
		false);
	}

	/**
	 * Permet de vérifier si un nom d'utilisateur ou une adresse mail est déjà présente dans la base de données
	 * @param  string $username Nom d'utilisateur renseigné lors d'une inscription
	 * @param  string $email    Mot de passe renseigné lors d'une inscription
	 * @return int          	Affiche le nombre de résultat obtenu. Pour poursuivre l'inscription, celui-ci doit être 0.
	 */
	public function existUser($username, $email)
	{
		$data = App::getDb()->prepare('
			SELECT * 
			FROM user
			WHERE
				username = :username 
				OR email = :email',
			[':username' => $username,
			':email'     => $email],
		true, false, true);
		return $data;
	}

	/**
	 * Permet d'obtenir toutes les données d'un utilisateur.
	 * @param  User   $user Classe User contenant certaines données unique de l'utilisateur (id, username ou email).
	 * @return object       Renvoi l'objet User avec toutes les données de l'utilisateur passé en paramètre.
	 */
	public function getUser(User $user)
	{
		$data = App::getDb()->prepare('
			SELECT * 
			FROM user 
			WHERE 
				id          = :id 
				OR username = :username 
				OR email    = :email',
			['id'       => $user->id(),
			':username' => $user->username(),
			':email'    => $user->email()],
		true, true, false);
		return new \App\model\User($data);
	}

	/**
	 * Permet d'éditer les informations d'un utilisateur, pour que celui-ci puisse être identifié, l'objet passé en paramètre doit au moins contenir id ou username ou email.
	 * @param  User   $user Prend l'objet User en paramètre.
	 */
	public function editUser(User $user)
	{
		$data = App::getDb()->prepare('
			UPDATE user 
			SET 
				username = :username, 
				email    = :email, 
				password = :password, 
				token    = :token
			WHERE 
				id          = :id 
				OR username = :username 
				OR email    = :email',
			['id'      => $user->id(),
			'username' => $user->username(),
			'email'    => $user->email(),
			'password' => $user->password(),
			'token'    => $user->token()],
		false);
	}

	/**
	 * Permet la validation d'un utilisateur en modifiant le contenu du champ 'confirm' dans la base de données. 
	 * (0: inactif; 1: actif)
	 * @param  User   $user Classe User contenant au moins le nom d'utilisateur.
	 */
	public function validateUser(User $user)
	{
		$data = App::getDb()->prepare('
			UPDATE user 
			SET 
				confirm = 1,
				token   = null 
			WHERE
				username = :username', 
			[':username' => $user->username()],
		false);
	}

	/**
	 * Permet d'éditer les préférences de l'utilisateur.
	 * @param  User   $user Classe User contenant au moins l'id de l'utilisateur.
	 */
	public function editPreference(User $user)
	{
		$data = App::getDb()->prepare('
			UPDATE user
			SET
				prefTheme   = :prefTheme,
				prefComment = :prefComment,
				prefLike    = :prefLike
			WHERE
				id = :id',
			['id'         => $user->id(),
			'prefTheme'   => $user->prefTheme(),
			'prefComment' => $user->prefComment(),
			'prefLike'    => $user->prefLike()],
		false);
	}

}