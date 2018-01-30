<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rencontre
 *
 * @ORM\Table(name="rencontre")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\RencontreRepository")
 */
class Rencontre
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
     * @ORM\Column(name="dateRencontre", type="datetime")
     */
    private $dateRencontre;

    /**
     * @var int
     *
     * @ORM\Column(name="journeeRencontre", type="integer")
     */
    private $journeeRencontre;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Saison")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saisonRencontre;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeDomRencontre;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeExtRencontre;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Stade")
     * @ORM\JoinColumn(nullable=true)
     */
    private $stadeRencontre;


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
     * Set dateRencontre
     *
     * @param \DateTime $dateRencontre
     *
     * @return Rencontre
     */
    public function setDateRencontre($dateRencontre)
    {
        $this->dateRencontre = $dateRencontre;

        return $this;
    }

    /**
     * Get dateRencontre
     *
     * @return \DateTime
     */
    public function getDateRencontre()
    {
        return $this->dateRencontre;
    }

    /**
     * Set journeeRencontre
     *
     * @param integer $journeeRencontre
     *
     * @return Rencontre
     */
    public function setJourneeRencontre($journeeRencontre)
    {
        $this->journeeRencontre = $journeeRencontre;

        return $this;
    }

    /**
     * Get journeeRencontre
     *
     * @return int
     */
    public function getJourneeRencontre()
    {
        return $this->journeeRencontre;
    }

    /**
     * Set equipeDomRencontre
     *
     * @param \FDM\ChampBundle\Entity\Equipe $equipeDomRencontre
     *
     * @return Rencontre
     */
    public function setEquipeDomRencontre(\FDM\ChampBundle\Entity\Equipe $equipeDomRencontre)
    {
        $this->equipeDomRencontre = $equipeDomRencontre;

        return $this;
    }

    /**
     * Get equipeDomRencontre
     *
     * @return \FDM\ChampBundle\Entity\Equipe
     */
    public function getEquipeDomRencontre()
    {
        return $this->equipeDomRencontre;
    }

    /**
     * Set equipeExtRencontre
     *
     * @param \FDM\ChampBundle\Entity\Equipe $equipeExtRencontre
     *
     * @return Rencontre
     */
    public function setEquipeExtRencontre(\FDM\ChampBundle\Entity\Equipe $equipeExtRencontre)
    {
        $this->equipeExtRencontre = $equipeExtRencontre;

        return $this;
    }

    /**
     * Get equipeExtRencontre
     *
     * @return \FDM\ChampBundle\Entity\Equipe
     */
    public function getEquipeExtRencontre()
    {
        return $this->equipeExtRencontre;
    }

    /**
     * Set stadeRencontre
     *
     * @param \FDM\ChampBundle\Entity\Stade $stadeRencontre
     *
     * @return Rencontre
     */
    public function setStadeRencontre(\FDM\ChampBundle\Entity\Stade $stadeRencontre = null)
    {
        $this->stadeRencontre = $stadeRencontre;

        return $this;
    }

    /**
     * Get stadeRencontre
     *
     * @return \FDM\ChampBundle\Entity\Stade
     */
    public function getStadeRencontre()
    {
        return $this->stadeRencontre;
    }

    /**
     * Set saisonRencontre
     *
     * @param \FDM\ChampBundle\Entity\Saison $saisonRencontre
     *
     * @return Rencontre
     */
    public function setSaisonRencontre(\FDM\ChampBundle\Entity\Saison $saisonRencontre)
    {
        $this->saisonRencontre = $saisonRencontre;

        return $this;
    }

    /**
     * Get saisonRencontre
     *
     * @return \FDM\ChampBundle\Entity\Saison
     */
    public function getSaisonRencontre()
    {
        return $this->saisonRencontre;
    }
}
