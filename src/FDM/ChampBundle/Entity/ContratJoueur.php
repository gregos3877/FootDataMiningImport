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
     * @ORM\Column(name="debutContratJoueur", type="datetime")
     */
    private $debutContratJoueur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContratJoueur", type="datetime")
     */
    private $finContratJoueur;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Joueur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joueurCJ;
    
    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeCJ;



  

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
     * Set debutContratJoueur
     *
     * @param \DateTime $debutContratJoueur
     *
     * @return ContratJoueur
     */
    public function setDebutContratJoueur($debutContratJoueur)
    {
        $this->debutContratJoueur = $debutContratJoueur;

        return $this;
    }

    /**
     * Get debutContratJoueur
     *
     * @return \DateTime
     */
    public function getDebutContratJoueur()
    {
        return $this->debutContratJoueur;
    }

    /**
     * Set finContratJoueur
     *
     * @param \DateTime $finContratJoueur
     *
     * @return ContratJoueur
     */
    public function setFinContratJoueur($finContratJoueur)
    {
        $this->finContratJoueur = $finContratJoueur;

        return $this;
    }

    /**
     * Get finContratJoueur
     *
     * @return \DateTime
     */
    public function getFinContratJoueur()
    {
        return $this->finContratJoueur;
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
     * Set equipeCJ
     *
     * @param \FDM\ChampBundle\Entity\Equipe $equipeCJ
     *
     * @return ContratJoueur
     */
    public function setEquipeCJ(\FDM\ChampBundle\Entity\Equipe $equipeCJ)
    {
        $this->equipeCJ = $equipeCJ;

        return $this;
    }

    /**
     * Get equipeCJ
     *
     * @return \FDM\ChampBundle\Entity\Equipe
     */
    public function getEquipeCJ()
    {
        return $this->equipeCJ;
    }
}
