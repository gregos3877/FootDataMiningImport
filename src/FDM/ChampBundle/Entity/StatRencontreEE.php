<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatRencontreEE
 *
 * @ORM\Table(name="stat_rencontre_e_e")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\StatRencontreEERepository")
 */
class StatRencontreEE
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
     * @ORM\Column(name="nbrButEE", type="integer", nullable=true)
     */
    private $nbrButEE;

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
    private $equipeSREE;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Rencontre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rencontreSREE;


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
     * Set nbrButEE
     *
     * @param integer $nbrButEE
     *
     * @return StatRencontreEE
     */
    public function setNbrButEE($nbrButEE)
    {
        $this->nbrButEE = $nbrButEE;

        return $this;
    }

    /**
     * Get nbrButEE
     *
     * @return int
     */
    public function getNbrButEE()
    {
        return $this->nbrButEE;
    }

    /**
     * Set nbrButEncaisseEE
     *
     * @param integer $nbrButEncaisseEE
     *
     * @return StatRencontreEE
     */
    public function setNbrButEncaisseEE($nbrButEncaisseEE)
    {
        $this->nbrButEncaisseEE = $nbrButEncaisseEE;

        return $this;
    }

    /**
     * Get nbrButEncaisseEE
     *
     * @return int
     */
    public function getNbrButEncaisseEE()
    {
        return $this->nbrButEncaisseEE;
    }
}

