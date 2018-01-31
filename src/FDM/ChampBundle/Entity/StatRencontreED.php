<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatRencontreED
 *
 * @ORM\Table(name="stat_rencontre_e_d")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\StatRencontreEDRepository")
 */
class StatRencontreED
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
     * @ORM\Column(name="nbrButM", type="integer", nullable=true)
     */
    private $nbrButM;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrButE", type="integer", nullable=true)
     */
    private $nbrButE;
    
    /**
     * 
     * @@ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeSRED;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Rencontre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rencontreSRED;


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
     * Set nbrButM
     *
     * @param integer $nbrButM
     *
     * @return StatRencontreED
     */
    public function setNbrButM($nbrButM)
    {
        $this->nbrButM = $nbrButM;

        return $this;
    }

    /**
     * Get nbrButM
     *
     * @return int
     */
    public function getNbrButM()
    {
        return $this->nbrButM;
    }

    /**
     * Set nbrButE
     *
     * @param integer $nbrButE
     *
     * @return StatRencontreED
     */
    public function setNbrButE($nbrButE)
    {
        $this->nbrButE = $nbrButE;

        return $this;
    }

    /**
     * Get nbrButE
     *
     * @return int
     */
    public function getNbrButE()
    {
        return $this->nbrButE;
    }

    /**
     * Set rencontreSRED
     *
     * @param \FDM\ChampBundle\Entity\Rencontre $rencontreSRED
     *
     * @return StatRencontreED
     */
    public function setRencontreSRED(\FDM\ChampBundle\Entity\Rencontre $rencontreSRED)
    {
        $this->rencontreSRED = $rencontreSRED;

        return $this;
    }

    /**
     * Get rencontreSRED
     *
     * @return \FDM\ChampBundle\Entity\Rencontre
     */
    public function getRencontreSRED()
    {
        return $this->rencontreSRED;
    }
}
