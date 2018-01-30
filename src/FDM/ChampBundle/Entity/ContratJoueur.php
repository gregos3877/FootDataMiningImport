<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratJoueur
 *
 * @ORM\Table(name="contrat_joueur")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\ContratJoueurRepository")
 */
class ContratJoueur
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
     * @var \DateTime
     *
     * @ORM\Column(name="debutContrat", type="datetime")
     */
    private $debutContrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContrat", type="datetime")
     */
    private $finContrat;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Joueur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joueurCJ;
    
    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Club")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clubCJ;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set debutContrat
     *
     * @param \DateTime $debutContrat
     *
     * @return ContratJoueur
     */
    public function setDebutContrat($debutContrat)
    {
        $this->debutContrat = $debutContrat;

        return $this;
    }

    /**
     * Get debutContrat
     *
     * @return \DateTime
     */
    public function getDebutContrat()
    {
        return $this->debutContrat;
    }

    /**
     * Set finContrat
     *
     * @param \DateTime $finContrat
     *
     * @return ContratJoueur
     */
    public function setFinContrat($finContrat)
    {
        $this->finContrat = $finContrat;

        return $this;
    }

    /**
     * Get finContrat
     *
     * @return \DateTime
     */
    public function getFinContrat()
    {
        return $this->finContrat;
    }

    /**
     * Set joueurCJ
     *
     * @param \FDM\ChampBundle\Entity\Joueur $joueurCJ
     *
     * @return ContratJoueur
     */
    public function setJoueurCJ(\FDM\ChampBundle\Entity\Joueur $joueurCJ)
    {
        $this->joueurCJ = $joueurCJ;

        return $this;
    }

    /**
     * Get joueurCJ
     *
     * @return \FDM\ChampBundle\Entity\Joueur
     */
    public function getJoueurCJ()
    {
        return $this->joueurCJ;
    }

    /**
     * Set clubCJ
     *
     * @param \FDM\ChampBundle\Entity\Club $clubCJ
     *
     * @return ContratJoueur
     */
    public function setClubCJ(\FDM\ChampBundle\Entity\Club $clubCJ)
    {
        $this->clubCJ = $clubCJ;

        return $this;
    }

    /**
     * Get clubCJ
     *
     * @return \FDM\ChampBundle\Entity\Club
     */
    public function getClubCJ()
    {
        return $this->clubCJ;
    }
}
