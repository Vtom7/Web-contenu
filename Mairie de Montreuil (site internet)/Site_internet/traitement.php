<?php 
$DB = NULL;
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$DB = new PDO('mysql:host=localhost;dbname=formulaire', 'root', '', $pdo_options);
	$DB->exec("SET CHARACTER SET utf8");
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

// Gestion des pieces_jointes.
// Renommage du fichier uploader en prenom + nom + telephone + mail + service + matricule + code postal + ville + liste + disposescrutin1 + disposescrutin2 + remuneration

$nom = $_POST['id_nom'];
$prenom = $_POST['id_prenom'];
$telephone = $_POST['id_telephone'];
$mail = $_POST['id_email'];
$service = $_POST['id_service'];
$matricule = $_POST['id_matricule'];
$code_postal = $_POST['id_zipcode'];
$ville = $_POST['id_city'];
$liste = $_POST['id_liste'];
$disposescrutin1 = $_POST['id_disposescrutin1'];
$disposescrutin2 = $_POST['id_disposescrutin2'];


if
	//echo "Déplacement réussi dans le dossier ".$chemin;
	//INSERTION BASE DE DONNEES
	(	$sql= ("INSERT INTO candidature (`id_nom`, `id_prenom`, `id_telephone`, `id_email`, `id_service`, `id_matricule`, `id_zipcode`, `id_city`, `id_liste`, `id_disposescrutin1`, `id_disposescrutin2`, `id_remuneration`)
	VALUES (NOW(), UPPER(:id_nom), UPPER(:id_prenom), UPPER(:id_telephone), UPPER(:id_email),	UPPER(:id_service), UPPER(:id_matricule), UPPER(:id_zipcode), UPPER(:id_city), UPPER(:id_liste), UPPER(:id_disposescrutin1), UPPER(:id_disposescrutin2), UPPER(:id_remuneration)")
	$req->prepare($sql);
	$req->execute(array(;
		':id_nom' => $_POST['id_nom'],
		':id_prenom' => $_POST['id_prenom'],
		':id_telephone' => $_POST['id_telephone'],
		':id_email' => $_POST['id_email'],
		':id_service' => $_POST['id_service'],
		':id_matricule' => $_POST['id_matricule'],
		':id_zipcode' => $_POST['id_zipcode'],
		':id_city' => $_POST['id_city'],
		':id_liste' => $_POST['id_liste'],
		':id_disposescrutin1' => $_POST['id_disposescrutin1'],
		':id_disposescrutin2' => $_POST['id_disposescrutin2'],
		':id_remuneration' => $_POST['id_remuneration'],
		));
	
	$_SESSION['success'] = '<div class="row g-3">
								<div class="col-sm-6">
									<div class="alert alert-success alert-white rounded">
										<button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
										<div class="icon"><i class="fas fa-check-circle"></i></div>
										<center>Merci <strong>'.$_POST['id_nom'].' '.$_POST['id_prenom'].'</strong>! Votre candidature a bien été enregistrée. Un email récapitulatif vous a été envoyé à l\'adresse '.$_POST['id_email'].'.</center>
									</div>
								</div>
							</div>';
	include 'mail2.php';

	}
$bdd = NULL;

?>