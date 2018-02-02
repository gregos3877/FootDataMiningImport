<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AncienNomClub
 *
 * @ORM\Table(name="ancien_nom_club")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\AncienNomClubRepository")
 */
class AncienNomClub
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
     * @ORM\Column(name="ancienNomClub", type="string", length=255)
     */
    private $ancienNomClub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateANC", type="integer")
     */
    private $dateANC;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Club", inversedBy="equipeNomEquipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clubANC;
    
    public function __construct(string $ancienNomClub, int $dateANC){
    	$this->ancienNomClub = $ancienNomClub ;
    	$this->dateANC = $dateANC ;
    }


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
     * Set ancienNomClub
     *
     * @param string $ancienNomClub
     *
     * @return AncienNomClub
     */
    public function setAncienNomClub($ancienNomClub)
    {
        $this->ancienNomClub = $ancienNomClub;

        return $this;
    }

    /**
     * Get ancienNomClub
     *
     * @return string
     */
    public function getAncienNomClub()
    {
        return $this->ancienNomClub;
    }

    /**
     * Set dateANC
     *
     * @param \DateTime $dateANC
     *
     * @return AncienNomClub
     */
    public function setDateANC($dateANC)
    {
        $this->dateANC = $dateANC;

        return $this;
    }

    /**
     * Get dateANC
     *
     * @return \DateTime
     */
    public function getDateANC()
    {
        return $this->dateANC;
    }

    /**
     * Set clubANC
     *
     * @param \FDM\ChampBundle\Entity\Club $clubANC
     *
     * @return AncienNomClub
     */
    public function setClubANC(\FDM\ChampBundle\Entity\Club $clubANC)
    {
        $this->clubANC = $clubANC;

        return $this;
    }

    /**
     * Get clubANC
     *
     * @return \FDM\ChampBundle\Entity\Club
     */
    public function getClubANC()
    {
        return $this->clubANC;
    }
}
