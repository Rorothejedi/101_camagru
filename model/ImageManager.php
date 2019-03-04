<?php
namespace App\model;

/**
 * Permet de gérer les requêtes concernant les utilisateurs.
 */
class ImageManager
{
	/**
	 * Permet d'insérer le nom de l'image générer dans la base de données.
	 * @param Image $image Prends l'objet Image en paramètre.
	 */
	public function addImage(Image $image)
	{
		$data = App::getDb()->prepare('
			INSERT INTO 
				image (id_user, name, date) 
			VALUES 
				(:id_user, :name, NOW())',
			['id_user' => $image->idUser(),
			'name' => $image->name()],
		false);
	}

	/**
	 * Permet de supprimer une image.
	 */
	public function deleteImage(Image $image)
	{
		$data = App::getDb()->prepare('
			DELETE FROM image
			WHERE id = :id',
			['id' => $image->id()],
		false);
	}

	/**
	 * Permet de vérifier si un utilisateur peux accéder à une photo en particulier.
	 */
	public function checkImage(Image $image)
	{
		$data = App::getDb()->prepare('
			SELECT *
			FROM image i
			WHERE 
				i.id = :id
				AND i.id_user = :id_user',
			['id' => $image->id(),
			'id_user' => $image->idUser()],
		true, false, true);
		return $data;
	}

	/**
	 * Permet de retourner les 4 dernières images prises par l'utilisateur en cours.
	 */
	public function lastImages(User $user)
	{
		$data = App::getDb()->prepare('
			SELECT *
			FROM image i
			WHERE i.id_user = :id_user
			ORDER BY i.date DESC
			LIMIT 4',
			['id_user' => $user->id()],
		true, false, false);
		return $data;
	}
}