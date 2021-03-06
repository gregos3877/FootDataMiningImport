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
     * @ORM\Column(name="nbrButMarqueEE", type="integer", nullable=true)
     */
    private $nbrButMarqueED;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrButEncaisseEE", type="integer", nullable=true)
     */
    private $nbrButEncaisseEE;
    
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbrButMarqueED
     *
     * @param integer $nbrButMarqueED
     *
     * @return StatRencontreED
     */
    public function setNbrButMarqueED($nbrButMarqueED)
    {
        $this->nbrButMarqueED = $nbrButMarqueED;

        return $this;
    }

    /**
     * Get nbrButMarqueED
     *
     * @return integer
     */
    public function getNbrButMarqueED()
    {
        return $this->nbrButMarqueED;
    }

    /**
     * Set nbrButEncaisseEE
     *
     * @param integer $nbrButEncaisseEE
     *
     * @return StatRencontreED
     */
    public function setNbrButEncaisseEE($nbrButEncaisseEE)
    {
        $this->nbrButEncaisseEE = $nbrButEncaisseEE;

        return $this;
    }

    /**
     * Get nbrButEncaisseEE
     *
     * @return integer
     */
    public function getNbrButEncaisseEE()
    {
        return $this->nbrButEncaisseEE;
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
