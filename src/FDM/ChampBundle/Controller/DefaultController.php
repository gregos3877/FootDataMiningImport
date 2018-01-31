<?php

namespace FDM\ChampBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FDM\ChampBundle\Entity\Championnat;
use FDM\ChampBundle\Entity\Saison;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller {

	public function indexAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$championnat = $em->getRepository ( 'FDMChampBundle:Championnat' )->find ( 1 );
		echo $championnat->getNomChampionnat () . "<br>";
		
		/* Recuperation des equipes pour une saison */
		$pageHtml = $this->telechargementCurl ( "https://fr.wikipedia.org/wiki/Championnat_de_France_de_football_1933-1934" );
		
		$this->parserClub ( $pageHtml );
		// $file = file_get_contents("http://www.lfp.fr/ligue1/classement?saison=100#sai=2&journee1=1&journee2=26&cat=Gen");
		
		// $find = htmlentities('<td class="club">');
		// echo "find : ".$find."<br>";
		// $debut = strpos(htmlentities($file), $find);
		// // echo htmlentities($file);
		
		// echo "parse".$debut." -<br>";
		// $html = $this->telechargementCurl("http://www.lfp.fr/ligue1/classement?saison=100#sai=2&journee1=1&journee2=26&cat=Gen");
		// $this->parserClub($html);
		
		return $this->render ( 'FDMChampBundle:Default:index.html.twig' );
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

	private function telechargementCurl($adresseHtml) {
// 		$ch = curl_init ( $adresseHtml );
// 		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
// 		$res = curl_exec ( $ch );
// 		curl_close ( $ch );
// 		echo "Curl ok<br>";
// 		echo htmlentities ( $res );
		
		$res = file_get_contents($adresseHtml);
// 		echo htmlentities ( $res );
		return htmlentities ( $res );
		
		// echo $res;
	}

	public function parserClub($html) {
// 		<tr bgcolor="#DCE5E5">
// 		<td><b><span class="nowrap">2</span></b></td>
// 		<td align="left"><span class="nowrap"><a href="/wiki/Sporting_Club_fivois" title="Sporting Club fivois">SC Fives</a></span></td>
// 		<td><b>33</b></td>
// 		<td>26</td>
// 		<td style="border-right-style:hidden">13</td>
// 		<td style="border-right-style:hidden">7</td>
// 		<td>6</td>
// 		<td style="border-right-style:hidden">57</td>
// 		<td style="border-right-style:hidden">31</td>
// 		<td>1,839</td>
// 		</tr>

		
		
// 		$next = true;
		$debut = 70572;
// 		$cpt = 0 ;
// 		while ( $next == true ) {
// 			$cpt++;
			$findMe = htmlentities ( '<tr bgcolor="' );
			
			$debut = strpos ( $html, $findMe, $debut );
			$debutTag = strpos($html, htmlentities ('title="'), $debut);
// 			$debut = $debut + 1;
			$fin = strpos ( $html, htmlentities ( '">' ), $debutTag );
			
// 			echo "pos => " . $debut . " | " . $fin . "<br>";
// 			echo "Teg => ".$debutTag."<br>";
			$htmlResearch = substr ( $html, $debutTag+12, ($fin - $debutTag-12) );
			
// 			if (strlen ( $htmlResearch ) > 100) {
// 				echo "fin<br>";
// 				$next = false;
// 			}
// 			else {
				echo $htmlResearch . "<br>";
// 				$debut = $fin ;
// 			}
// 		}
// 		echo "cpt => ".$cpt."<br>";
		echo "parse ok <br>";
	}
}
