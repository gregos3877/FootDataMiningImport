<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @var int
     *
     * @ORM\Column(name="numEquipe", type="integer")
     */
    private $numEquipe;

    /**
     * @var bool
     *
     * @ORM\Column(name="estProEquipe", type="boolean")
     */
    private $estProEquipe;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Club")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clubEquipe;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Stade")
     * @ORM\JoinColumn(nullable=true)
     */
    private $stadeEquipe;


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
     * Set numEquipe
     *
     * @param integer $numEquipe
     *
     * @return Equipe
     */
    public function setNumEquipe($numEquipe)
    {
        $this->numEquipe = $numEquipe;

        return $this;
    }

    /**
     * Get numEquipe
     *
     * @return int
     */
    public function getNumEquipe()
    {
        return $this->numEquipe;
    }

    /**
     * Set estProEquipe
     *
     * @param boolean $estProEquipe
     *
     * @return Equipe
     */
    public function setEstProEquipe($estProEquipe)
    {
        $this->estProEquipe = $estProEquipe;

        return $this;
    }

    /**
     * Get estProEquipe
     *
     * @return bool
     */
    public function getEstProEquipe()
    {
        return $this->estProEquipe;
    }

    /**
     * Set clubEquipe
     *
     * @param \FDM\ChampBundle\Entity\Club $clubEquipe
     *
     * @return Equipe
     */
    public function setClubEquipe(\FDM\ChampBundle\Entity\Club $clubEquipe)
    {
        $this->clubEquipe = $clubEquipe;

        return $this;
    }

    /**
     * Get clubEquipe
     *
     * @return \FDM\ChampBundle\Entity\Club
     */
    public function getClubEquipe()
    {
        return $this->clubEquipe;
    }
}
