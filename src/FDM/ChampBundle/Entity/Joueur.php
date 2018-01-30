<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\JoueurRepository")
 */
class Joueur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomJoueur", type="string", length=255)
     */
    private $nomJoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomJoueur", type="string", length=255, nullable=true)
     */
    private $prenomJoueur;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paysJoueur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomJoueur
     *
     * @param string $nomJoueur
     *
     * @return Joueur
     */
    public function setNomJoueur($nomJoueur)
    {
        $this->nomJoueur = $nomJoueur;

        return $this;
    }

    /**
     * Get nomJoueur
     *
     * @return string
     */
    public function getNomJoueur()
    {
        return $this->nomJoueur;
    }

    /**
     * Set prenomJoueur
     *
     * @param string $prenomJoueur
     *
     * @return Joueur
     */
    public function setPrenomJoueur($prenomJoueur)
    {
        $this->prenomJoueur = $prenomJoueur;

        return $this;
    }

    /**
     * Get prenomJoueur
     *
     * @return string
     */
    public function getPrenomJoueur()
    {
        return $this->prenomJoueur;
    }
}

