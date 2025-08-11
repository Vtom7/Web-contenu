
<?php
/*************************************************
	Identifiant pour Télécharger le .csv
	Login : elections
	Mot de passe : elections
**************************************************/
if(isset($_POST['login'], $_POST['password']) && $_POST['login']=='elections' && sha1($_POST['password'])=='83755ce5d33076334970119f42a8656ff909c978')
{
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'formulaires_rh';
 
	//Connexion à la bdd MySQL en PDO.
	$pdo = new PDO("mysql:host=localhost;dbname=*********", $user, $password);

	//Création de la requête.
	$sql = "SELECT * FROM ****** ORDER BY db_nom";
	 
	//Preparation PDO de la requête.
	$statement = $pdo->prepare($sql);
	 
	//Exécution de la requête.
	$statement->execute();
	 
	//Récupérez toutes les lignes de notre table MySQL
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	 
	//Récupération des noms de colonne.
	$columnNames = array();
	if(!empty($rows)){
		//Nous avons seulement besoin de parcourir la première ligne de notre résultat
		//afin de collationner les noms de colonnes.
		$firstRow = $rows[0];
		foreach($firstRow as $colName => $val){
			$columnNames[] = $colName;
		}
	}
	 
	 
	//Définissez les en-têtes Content-Type et Content-Disposition pour forcer le téléchargement.
	header('Content-type: text/csv');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
	 
	//Ouverture un pointeur de fichier
	$fp = fopen('php://output', 'w');
	 
	//Ecriture des colonne dans le fichier.
	fputcsv($fp, $columnNames);
	 
	//Ensuite, parcoure les lignes et écrit dans le fichier CSV.
	foreach ($rows as $row) {
		fputcsv($fp, $row);
	}
	 
	//Fermeture du fichier CSV.
	fclose($fp);
	exit();
}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>FORMULAIRE CANDIDATURE</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>
	<style>
	
	</style>
	<body >
		<div class="container">
			<div class="row justify-content-center align-items-center" style="height:100vh">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<center><h5><i class="fas fa-download"></i> Téléchargement des données</h5></center>
						</div>
						<div class="card-body">
							<form action="telechargement.php" method="post" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input type="text" class="form-control" name="login">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="password" class="form-control" name="password">
									</div>
								</div>
								<center>
									<button type="submit" class="btn btn-primary">Télécharger</button>
								</center>
							</form>
						</div>
					</div><br><center><a href="rh_demande_scolaire.html">Retour</a> | <a href="visualisation.php"><i class="fas fa-eye" title="Visualiser"></i></a></center>
					<br>
					<div class="alert alert-primary" role="alert">
						<i class="fas fa-info-circle"> </i><small> A l'ouverture du fichier, si l'affichage des accents pose problème, il faut utiliser dans LibreOffice CALC le jeux de caractères : <b>Système</b></small>
					</div>
					<br>
					<center><a href="http://mtrv-outils/formulaires/images/rh_calc.png"><img height=212 width=200 src="images/rh_calc.png"></a></center>
				</div>
			</div>
		</div>
	</body>
	
	<!--Librairie Bootstrap / JavaScript -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/e442ae886e.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
</html>