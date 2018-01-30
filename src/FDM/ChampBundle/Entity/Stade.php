<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stade
 *
 * @ORM\Table(name="stade")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\StadeRepository")
 */
class Stade
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
     * @ORM\Column(name="nomStade", type="string", length=255)
     */
    private $nomStade;

    /**
     * @var string
     *
     * @ORM\Column(name="villeStade", type="string", length=255)
     */
    private $villeStade;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrPlaceStade", type="integer")
     */
    private $nbrPlaceStade;


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
     * Set nomStade
     *
     * @param string $nomStade
     *
     * @return Stade
     */
    public function setNomStade($nomStade)
    {
        $this->nomStade = $nomStade;

        return $this;
    }

    /**
     * Get nomStade
     *
     * @return string
     */
    public function getNomStade()
    {
        return $this->nomStade;
    }

    /**
     * Set villeStade
     *
     * @param string $villeStade
     *
     * @return Stade
     */
    public function setVilleStade($villeStade)
    {
        $this->villeStade = $villeStade;

        return $this;
    }

    /**
     * Get villeStade
     *
     * @return string
     */
    public function getVilleStade()
    {
        return $this->villeStade;
    }

    /**
     * Set nbrPlaceStade
     *
     * @param integer $nbrPlaceStade
     *
     * @return Stade
     */
    public function setNbrPlaceStade($nbrPlaceStade)
    {
        $this->nbrPlaceStade = $nbrPlaceStade;

        return $this;
    }

    /**
     * Get nbrPlaceStade
     *
     * @return int
     */
    public function getNbrPlaceStade()
    {
        return $this->nbrPlaceStade;
    }
}

