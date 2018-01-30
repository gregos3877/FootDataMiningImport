<?php

namespace FDM\ChampBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FDMChampBundle:Default:index.html.twig');
    }
}
