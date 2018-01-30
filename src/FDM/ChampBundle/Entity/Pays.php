<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\PaysRepository")
 */
class Pays
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
     * @ORM\Column(name="nomPays", type="string", length=255, unique=true)
     */
    private $nomPays;

    /**
     * @var float
     *
     * @ORM\Column(name="indicePays", type="float")
     */
    private $indicePays;


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
     * Set nomPays
     *
     * @param string $nomPays
     *
     * @return Pays
     */
    public function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    /**
     * Get nomPays
     *
     * @return string
     */
    public function getNomPays()
    {
        return $this->nomPays;
    }

    /**
     * Set indicePays
     *
     * @param float $indicePays
     *
     * @return Pays
     */
    public function setIndicePays($indicePays)
    {
        $this->indicePays = $indicePays;

        return $this;
    }

    /**
     * Get indicePays
     *
     * @return float
     */
    public function getIndicePays()
    {
        return $this->indicePays;
    }
}

