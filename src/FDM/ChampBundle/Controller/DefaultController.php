<?php

namespace FDM\ChampBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FDM\ChampBundle\Entity\Championnat;
use FDM\ChampBundle\Entity\Saison;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use FDM\ChampBundle\Entity\Equipe;
use FDM\ChampBundle\Entity\Club;

class DefaultController extends Controller {

	public function indexAction() {
		/* Recuperation de l'entityManager */
		$em = $this->getDoctrine ()->getManager ();
		
		/* Selection du championnat de france de ligue 1 et Affichage */
		$championnat = $em->getRepository ( 'FDMChampBundle:Championnat' )->find ( 1 );
		echo $championnat->getNomChampionnat () . "<br><br>";
		
		
		
		
		/* Recuperation du tableau du classement du championnat sur la page */
// 		$adresse = "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_1933-1934" ;

		
		$test = "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_" ;
		for ($a=1933; $a<1940;$a++){
			$date = $a."-".($a+1);
			$adresseParDate = $test.$date;
			echo $adresseParDate."<br>";
			
			$pageHtml = $this->telechargement ( $adresseParDate);
			echo "adresse : ".$adresseParDate."<br>";
			
			
			/*
			 * Parsage de la page telechargé
			 * Recuperation des equipes qui ont participé a la saison
			 */
			$equipes = $this->parseEquipe ( $pageHtml );
			
			echo "Nombre d'equipe : " . count ( $equipes ) . "<br><br>";
			
			foreach ( $equipes as $eq ) {
				foreach ( $eq as $i => $var ) {
					
					echo $i . "=>" . $var . "<br>";
					
					$club = $em->getRepository ( 'FDMChampBundle:Club' )->findOneBy ( array (
							'nomClub' => $i
					) );
					
					if ($club == null) {
						echo " aucun club enregistré pour cette equipe  <br>";
						$club = new Club ();
						$club->setNomClub ( $i );
						
						$creationClub = $this->rechercheCreationClub ( $i );
						$club->setCreationClub ( $creationClub );
						$em->persist ( $club );
					}
					echo "----------------------------<br>";
				}
			}
		}
		
		
		
// 		$em->flush ();
		
		return $this->render ( 'FDMChampBundle:Default:index.html.twig' );
	}

	public function rechercheCreationClub($nomClub) {
		echo "REcherche pour " . $nomClub . "<br>";
		
		$adresse = "https://fr.wikipedia.org/wiki/" . $nomClub;
		$adresse = str_replace ( " ", "_", $adresse );
		$res = file_get_contents ( $adresse );
		
		$d = strpos ( $res, ">Fondation<" );
		$dCrea = strpos ( $res, "title=", $d );
		$debut = strpos ( $res, ">", $dCrea );
		// $f = strpos($res, "");
		// echo htmlentities(substr($res, $debut+1, 4));
		return htmlentities ( substr ( $res, $debut + 1, 4 ) );
		// echo substr($res, $d, 500);
	}

	public function parseEquipe($pageEquipe) {
		echo "<br><br> parsage :<br>";
		
		$cpt = 0;
		$cond = true;
		
		$debut = 0;
		$listeEquipe = [ ];
		
		while ( $cond ) {
			
			$posDebutTR = strpos ( $pageEquipe, "<tr", $debut );
			$posFinTR = strpos ( $pageEquipe, "</tr", $posDebutTR );
			
			$debut = $posFinTR;
			
			if ($posDebutTR == 0) {
				$cond = false;
			}
			elseif ($cpt > 0) {
				// echo "Pos => ".$posDebutTR." / ". $posFinTR;
				
				$debutNom = strpos ( $pageEquipe, "title=", $posDebutTR );
				$finNom = strpos ( $pageEquipe, ">", $debutNom );
				// echo " | Nom".$debutNom." / ". $finNom;
				$finPseudo = strpos ( $pageEquipe, "<", $finNom );
				// echo "NOM equipe : " . substr ( $pageEquipe, $debutNom + 7, ($finNom - $debutNom - 8) ) . " => " . substr ( $pageEquipe, $finNom + 1, ($finPseudo - $finNom - 1) ) . "<br>";
				
				$listeEquipe [] = [ 
						substr ( $pageEquipe, $debutNom + 7, ($finNom - $debutNom - 8) ) => substr ( $pageEquipe, $finNom + 1, ($finPseudo - $finNom - 1) ) 
				];
				
				// echo substr($pageEquipe, $posDebutTR, ($posFinTR - $posDebutTR));
				
				// echo $finNom . " / " .$finPseudo ." <br>";
				
				// echo ;
			}
			
			$cpt ++;
		}
		
		return $listeEquipe;
	}

	public function enregistrementEquipeParSaison() {
	}

	private function enregistrementSaison(Championnat $champ, EntityManager $em) {
		for($i = 1933; $i < 2019; $i ++) {
			$saison = new Saison ();
			$anneSa = $i . "/" . ($i + 1);
			echo $anneSa . "<br>";
			$saison->setAnneesSaison ( $anneSa );
			$saison->setChampionnatSaison ( $champ );
			$em->persist ( $saison );
		}
		$em->flush ();
	}

	private function telechargement($adresseHtml) {
		$res = file_get_contents ( $adresseHtml );
		
		$deb = strpos ( $res, "<caption>Classement</caption>" );
		$deb = $deb + strlen ( "<caption>Classement</caption>" );
		$fin = strpos ( $res, "</table>", $deb );
		// echo "pos : " . $deb . " / " . $fin . "<br>";
		
		return substr ( $res, $deb, $fin - $deb );
		
		// echo htmlentities ( $res );
		// return htmlentities ( $res );
		
		// echo $res;
	}
}
