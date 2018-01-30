<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="nomClub", type="string", length=255)
     */
    private $nomClub;

    /**
     * @var int
     *
     * @ORM\Column(name="creationClub", type="integer")
     */
    private $creationClub;


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
     * Set nomClub
     *
     * @param string $nomClub
     *
     * @return Club
     */
    public function setNomClub($nomClub)
    {
        $this->nomClub = $nomClub;

        return $this;
    }

    /**
     * Get nomClub
     *
     * @return string
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }

    /**
     * Set creationClub
     *
     * @param integer $creationClub
     *
     * @return Club
     */
    public function setCreationClub($creationClub)
    {
        $this->creationClub = $creationClub;

        return $this;
    }

    /**
     * Get creationClub
     *
     * @return int
     */
    public function getCreationClub()
    {
        return $this->creationClub;
    }
}

