<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\SaisonRepository")
 */
class Saison
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
     * @ORM\Column(name="anneesSaison", type="string", length=255)
     */
    private $anneesSaison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutSaison", type="datetime", nullable=true)
     */
    private $dateDebutSaison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinSaison", type="datetime", nullable=true)
     */
    private $dateFinSaison;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Championnat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $championnatSaison;


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
     * Set anneesSaison
     *
     * @param string $anneesSaison
     *
     * @return Saison
     */
    public function setAnneesSaison($anneesSaison)
    {
        $this->anneesSaison = $anneesSaison;

        return $this;
    }

    /**
     * Get anneesSaison
     *
     * @return string
     */
    public function getAnneesSaison()
    {
        return $this->anneesSaison;
    }

    /**
     * Set dateDebutSaison
     *
     * @param \DateTime $dateDebutSaison
     *
     * @return Saison
     */
    public function setDateDebutSaison($dateDebutSaison)
    {
        $this->dateDebutSaison = $dateDebutSaison;

        return $this;
    }

    /**
     * Get dateDebutSaison
     *
     * @return \DateTime
     */
    public function getDateDebutSaison()
    {
        return $this->dateDebutSaison;
    }

    /**
     * Set dateFinSaison
     *
     * @param \DateTime $dateFinSaison
     *
     * @return Saison
     */
    public function setDateFinSaison($dateFinSaison)
    {
        $this->dateFinSaison = $dateFinSaison;

        return $this;
    }

    /**
     * Get dateFinSaison
     *
     * @return \DateTime
     */
    public function getDateFinSaison()
    {
        return $this->dateFinSaison;
    }

    /**
     * Set championnatSaison
     *
     * @param \FDM\ChampBundle\Entity\Championnat $championnatSaison
     *
     * @return Saison
     */
    public function setChampionnatSaison(\FDM\ChampBundle\Entity\Championnat $championnatSaison)
    {
        $this->championnatSaison = $championnatSaison;

        return $this;
    }

    /**
     * Get championnatSaison
     *
     * @return \FDM\ChampBundle\Entity\Championnat
     */
    public function getChampionnatSaison()
    {
        return $this->championnatSaison;
    }
}
