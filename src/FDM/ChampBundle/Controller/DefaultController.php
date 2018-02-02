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
		$cpte = 0;
		$em = $this->getDoctrine ()->getManager ();
		
		/* Recuperation du tableau contenant le classement du championnat sur la page wikipedia */
		$pageWikiChamp = "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_";
		
		/* Boucle sur les championnats en fonction des saisons */
		for($a = 1942; $a < 1943; $a ++) {
			$date = $a . "-" . ($a + 1);
			$adresseParDate = $pageWikiChamp . $date;
			
			$pageHtml = $this->telechargement ( $adresseParDate );
			echo "adresse : " . $adresseParDate . "<br>";
			// echo htmlentities($pageHtml);
			
			/*
			 * Parsage de la page telechargé
			 * Recuperation des equipes qui ont participé a la saison
			 */
			$clubs = $this->parseEquipe ( $pageHtml );
			
			echo "Nombre de club : " . count ( $clubs ) . "<br><br>";
			
			/* Pour chaque Club recuperer dans la liste */
			foreach ( $clubs as $cl ) {
				foreach ( $cl as $i => $var ) {
					
					/* Affichage du nom */
					echo "Nom club récupérer => " . $i . "<br>";
					
					/* Verification si le club existe ou pas */
					$verif = $this->verifClubExiste ( $i );
					
					if ($verif) {
						echo "Club Existe<br>";
					}
					else {
						echo "-> Pas de club correspondant trouvé en BDD...<br>";
						
						$adres = "https://fr.wikipedia.org/wiki/" . $i;
						$adresse = str_replace ( " ", "_", $adres );
						
						// echo "...adresse : " . $adres . "<br>";
						
						$creationClub = $this->rechercheCreationClub ( $i );
						echo "-> date trouvée : " . $creationClub . "<br>";
						$club = new Club ( $i, $creationClub, $adresse );
						echo "-> Nom du club créer => " . $club->getNomClub () . "......<br>";
						$em->persist ( $club );
					}
					
					/* Verification si le club existe ou pas */
					// $club = $em->getRepository ( 'FDMChampBundle:Club' )->findOneBy ( array (
					// 'nomClub' => $i
					// ) );
					
					// if ($club->clubExiste($club->getNom())) echo "Le club existe deja <br>";
					
					/* Si le le club existe .......... */
					
					/* Sinon .............. */
					
					// if ($club == null) {
					// echo " aucun club enregistré <br>";
					// $club = new Club ();
					// $club->setNomClub ( $i );
					
					// $adres = "https://fr.wikipedia.org/wiki/" . $i;
					// $adresse = str_replace ( " ", "_", $adres);
					// echo "ADDRE : " . $adres . "<br>";
					
					// $club->setHtmlClubWiki ( $adres );
					// $creationClub = $this->rechercheCreationClub ( $i );
					// $club->setCreationClub ( $creationClub );
					// $em->persist ( $club );
					// }
					// if ($club->getHtmlClubWiki () == null) {
					// echo " ===> Enregistrement de la page html A FAIRE <=== <br>";
					
					// $adres = "https://fr.wikipedia.org/wiki/" . $i;
					// $adres = str_replace ( " ", "_", $adres );
					// echo "ADDRE : " . $adres . "<br>";
					// $club->setHtmlClubWiki ( $adres );
					// }
					echo "----------------------------<br>";
				}
				
				$em->flush ();
				// if ($cpte >= 3)
				// break;
				$cpte ++;
			}
		}
		
		return $this->render ( 'FDMChampBundle:Default:index.html.twig' );
	}

	public function verifClubExiste(string $nomClub) {
		$em = $this->getDoctrine ()->getManager ();
		$res = $em->getRepository ( 'FDMChampBundle:Club' )->findOneBy ( array (
				'nomClub' => $nomClub 
		) );
		
		if ($res != null) {
			
			return true;
		}
		else {
			
			return false;
		}
		
		return false;
	}

	public function recuperationClubParSaison() {
		/* Recuperation de l'entityManager */
		$em = $this->getDoctrine ()->getManager ();
		/* Recuperation du tableau du classement du championnat sur la page */
		// $adresse = "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_1933-1934" ;
		$test = "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_";
		for($a = 1942; $a < 2018; $a ++) {
			$date = $a . "-" . ($a + 1);
			$adresseParDate = $test . $date;
			// echo "adresse : " . $adresseParDate . "<br>";
			
			$pageHtml = $this->telechargement ( $adresseParDate );
			echo "adresse : " . $adresseParDate . "<br>";
			// echo htmlentities($pageHtml);
			
			/*
			 * Parsage de la page telechargé
			 * Recuperation des equipes qui ont participé a la saison
			 */
			$equipes = $this->parseEquipe ( $pageHtml );
			
			echo "Nombre d'equipe : " . count ( $equipes ) . "<br><br>";
			
			foreach ( $equipes as $eq ) {
				foreach ( $eq as $i => $var ) {
					
					// echo $i . "=>" . $var . "<br>";
					
					$club = $em->getRepository ( 'FDMChampBundle:Club' )->findOneBy ( array (
							'nomClub' => $i 
					) );
					
					if ($club == null) {
						echo " aucun club enregistré pour cette equipe  <br>";
						$club = new Club ();
						$club->setNomClub ( $i );
						
						$adres = "https://fr.wikipedia.org/wiki/" . $i;
						$adresse = str_replace ( " ", "_", $adresse );
						echo "ADDRE : " . $adres . "<br>";
						
						$club->setHtmlClubWiki ( $adres );
						$creationClub = $this->rechercheCreationClub ( $i );
						$club->setCreationClub ( $creationClub );
						$em->persist ( $club );
					}
					if ($club->getHtmlClubWiki () == null) {
						echo " ===> Enregistrement de la page html A FAIRE <=== <br>";
						
						$adres = "https://fr.wikipedia.org/wiki/" . $i;
						$adres = str_replace ( " ", "_", $adres );
						echo "ADDRE : " . $adres . "<br>";
						$club->setHtmlClubWiki ( $adres );
					}
					// echo "----------------------------<br>";
				}
				// $em->flush();
			}
		}
	}

	public function rechercheCreationClub($nomClub) {
		echo "-> Recherche date Création pour " . $nomClub . "<br>";
		
		$adresse = "https://fr.wikipedia.org/wiki/" . $nomClub;
		$adresse = str_replace ( " ", "_", $adresse );
		$res = file_get_contents ( $adresse );
		
		$d = strpos ( $res, ">Fondation<" );
		$dCrea = strpos ( $res, "title=", $d );
		$debut = strpos ( $res, ">", $dCrea );
		
		$fin = strpos ( $res, "<", $debut );
		
		$date = htmlentities ( substr ( $res, $debut + 1, ($fin - $debut - 1) ) );
		$date = substr ( $date, strlen ( $date ) - 4 );
		if (strval ( $date ) > 1800) {
			// echo "<br>".$date."<br><br>";
		}
		else {
			$dCrea = strpos ( $res, "title=", $debut );
			$debut = strpos ( $res, ">", $dCrea );
			
			$fin = strpos ( $res, "<", $debut );
			
			$date = htmlentities ( substr ( $res, $debut + 1, ($fin - $debut - 1) ) );
			$date = substr ( $date, strlen ( $date ) - 4 );
			// echo "<br>".$date."<br><br>";
		}
		echo "date : " . $date . " | <br>";
		if (strlen($date) < 4) {
			echo "changement<br>";
			$date = strval("404");
		}
		echo "date : " . strlen($date) . " | <br>";
		// var_dump($date);
		
		// echo "<br>".htmlentities(substr($res, $debut+1, 4))."<br><br>";
		
		return $date;
		// echo substr($res, $d, 500);
	}

	// <th scope="row" style="width:10em;">Fondation</th>
	// <td>
	// <time class="nowrap date-lien" datetime="1908-07-06">
	// <a href="/wiki/6_juillet_en_sport" title="6 juillet en sport">6 juillet</a>
	// <a href="/wiki/1908_en_football" title="1908 en football">1908</a>
	// </time> (section football)<br>
	// <time class="nowrap date-lien" datetime="1904-07-09">
	// <a href="/wiki/9_juillet_en_sport" title="9 juillet en sport">9 juillet</a>
	// <a href="/wiki/1904_en_football" title="1904 en football">1904</a>
	// </time> (club omnisports)</td>
	
	// <th scope="row" style="width:10em;">Fondation</th>
	// <td>
	// <a href="/wiki/1899_en_sport" title="1899 en sport">31 août 1899</a>
	// <br>
	// <small>......</small>
	// </td>
	
	// <th scope="row" style="width:10em;">Fondation</th>
	// <td>
	// <a href="/wiki/1900_en_sport" title="1900 en sport">1900</a>
	// ou
	// <a href="/wiki/1914_en_sport" title="1914 en sport">1914</a>
	// <sup id="cite_ref-1" class="reference">
	// <a href="#cite_note-1"><span class="cite_crochet">[</span>Note 1<span class="cite_crochet">]</span></a>
	// </sup>
	// </td>
	
	// <th scope="row" style="width:10em;">Fondation</th>
	// <td>
	// <a href="/wiki/1901_en_football" title="1901 en football">1901</a>
	// </td>
	public function parseEquipe($pageEquipe) {
		// echo "<br><br> parsage :<br>";
		$cpt = 0;
		$cond = true;
		
		$debut = 0;
		$listeEquipe = [ ];
		$listeClub = [ ];
		
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
		
		// echo htmlentities($res);
		
		// $deb = strpos ( $res, "<caption>Classement</caption>" );
		$deb = strpos ( $res, "<caption>Classement" );
		$deb = $deb + strlen ( "<caption>Classement</caption>" );
		$fin = strpos ( $res, "</table>", $deb );
		// echo "pos : " . $deb . " / " . $fin . "<br>";
		
		return substr ( $res, $deb, $fin - $deb );
		
		// echo htmlentities ( $res );
		// return htmlentities ( $res );
		
		// echo $res;
	}
}
