<?php
	//-----------------------------------------------
	// VARIABLES RECUPERER DU FORMULAIRE 
	//-----------------------------------------------
	//$db_date_demande = addslashes($_POST['db_date_demande']);
	$db_nom = addslashes($_POST['db_nom']);
	$db_prenom = addslashes($_POST['db_prenom']);
	$db_service = addslashes($_POST['db_service']);
	$db_telephone = addslashes($_POST['db_telephone']);
	$db_matricule = addslashes($_POST['db_matricule']);
	$db_email = addslashes($_POST['db_email']);
	$db_code_postal = addslashes($_POST['db_code_postal']);
	$db_ville = addslashes($_POST['db_ville']);
	$db_liste_electorale = addslashes($_POST['db_liste_electorale']);	
	$db_date_formation_1 = addslashes($_POST['db_date_formation_1']);
	$db_disposescrutin1 = implode(' <br>', (array)$_POST['db_disposescrutin1']);
	$db_remuneration = addslashes($_POST['db_remuneration']);
	//Email de l'expéditeur
	$email_expediteur='noreply@montreuil.fr';
    $email_reply='noreply@montreuil.fr'; 
	//Sujet du mail
	$sujet = "Formulaire - Votre candidature au élections 2022";
	$date = date("d/m/Y");
	$heure = date("H:i");
	
	//BOUNDARY
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
  
	// Entête du mail
	$headers = 'From: noreply@montreuil.fr' . "\r\n";
    $headers .= 'Reply-To: noreply@montreuil.fr' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	// Corp du mail
	$message = '<title>Votre candidature aux élections 2022</title>';	
	$message .= '<html><body>';
	$message .= '<br>';
	$message .= '<p><strong>Votre demande à bien été prise en compte.</strong></p>';
	$message .= '<p>Voici les informations transmises le '.$date.' à '.$heure.':<p><br>';
	$message .= '<center><table rules="all" style="border:solid 1px Gray; font-size:12pt; font-family:calibri;" cellpadding="10">';
	$message .= '<tr><td> Nom: '.$db_nom.'</td><td> Prénom: '.$db_prenom.'</td><td> Email: '.$db_email.'</td></tr>';
	$message .= '<tr><td> Service: '.$db_service.'</td><td> Matricule: '.$db_matricule.'</td><td> Téléphone: '.$db_telephone.'</td></tr>';
	$message .= '<tr><td> Code postal: '.$db_code_postal.'</td><td> Ville: '.$db_ville.'</td><td>Formation le '.$db_date_formation_1.' </td></tr>';
	$message .= '<tr><td> Inscrit sur les liste électorale '.$db_liste_electorale.' </td><td> Candidature:<br> '.$db_disposescrutin1.' </td><td>Rémunération: '.$db_remuneration.' </td></tr>';
	$message .= '</table></center><br>';
	$message .= '<p>Pour toutes modifications de votre demande ou information complémentaires, merci de vous adressez au service élections (elections@montreuil.fr) </p><br>';
	$message .= '<strong><center>Ceci est un e-mail automatique, merci de ne pas répondre</center></strong>';
	$message .= '</body></html>';
	
	//ENVOI DU MAIL
	if (mail($db_email,utf8_decode($sujet),$message,$headers))
    {
		require 'index.html';
    }
	else
    {
        $erreur = 'l\'envoi du mail à échoué.'."\n";
		$erreur .= 'Veuillez recomencer votre inscription.';
		//require 'incomplet.php';
		require 'index.html';
    } 
?>