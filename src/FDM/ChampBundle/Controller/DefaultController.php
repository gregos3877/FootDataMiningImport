<?php

namespace FDM\ChampBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//     	$ch = curl_init ( "http://www.lfp.fr/ligue1/calendrier_resultat?sai=100#sai=2&jour=1" );
//     	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
//     	$res = curl_exec ( $ch );
//     	curl_close ( $ch );
//     	echo htmlentities($res);
//     	echo $res;
        return $this->render('FDMChampBundle:Default:index.html.twig');
    }
}
