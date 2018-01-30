<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Championnat
 *
 * @ORM\Table(name="championnat")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\ChampionnatRepository")
 */
class Championnat
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
     * @ORM\Column(name="nomChampionnat", type="string", length=255)
     */
    private $nomChampionnat;

    /**
     * @var int
     *
     * @ORM\Column(name="divisionChampionnat", type="integer")
     */
    private $divisionChampionnat;


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
     * Set nomChampionnat
     *
     * @param string $nomChampionnat
     *
     * @return Championnat
     */
    public function setNomChampionnat($nomChampionnat)
    {
        $this->nomChampionnat = $nomChampionnat;

        return $this;
    }

    /**
     * Get nomChampionnat
     *
     * @return string
     */
    public function getNomChampionnat()
    {
        return $this->nomChampionnat;
    }

    /**
     * Set divisionChampionnat
     *
     * @param integer $divisionChampionnat
     *
     * @return Championnat
     */
    public function setDivisionChampionnat($divisionChampionnat)
    {
        $this->divisionChampionnat = $divisionChampionnat;

        return $this;
    }

    /**
     * Get divisionChampionnat
     *
     * @return int
     */
    public function getDivisionChampionnat()
    {
        return $this->divisionChampionnat;
    }
}

