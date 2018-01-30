<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratEntraineur
 *
 * @ORM\Table(name="contrat_entraineur")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\ContratEntraineurRepository")
 */
class ContratEntraineur
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
     * @ORM\Column(name="debutContratE", type="datetime")
     */
    private $debutContratE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContratE", type="datetime")
     */
    private $finContratE;

    /**
     *
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Entraineur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entraineurCE;
    
    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Club")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clubCE;
    
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
     * Set debutContratE
     *
     * @param \DateTime $debutContratE
     *
     * @return ContratEntraineur
     */
    public function setDebutContratE($debutContratE)
    {
        $this->debutContratE = $debutContratE;

        return $this;
    }

    /**
     * Get debutContratE
     *
     * @return \DateTime
     */
    public function getDebutContratE()
    {
        return $this->debutContratE;
    }

    /**
     * Set finContratE
     *
     * @param \DateTime $finContratE
     *
     * @return ContratEntraineur
     */
    public function setFinContratE($finContratE)
    {
        $this->finContratE = $finContratE;

        return $this;
    }

    /**
     * Get finContratE
     *
     * @return \DateTime
     */
    public function getFinContratE()
    {
        return $this->finContratE;
    }

    /**
     * Set entraineurCE
     *
     * @param \FDM\ChampBundle\Entity\Entraineur $entraineurCE
     *
     * @return ContratEntraineur
     */
    public function setEntraineurCE(\FDM\ChampBundle\Entity\Entraineur $entraineurCE)
    {
        $this->entraineurCE = $entraineurCE;

        return $this;
    }

    /**
     * Get entraineurCE
     *
     * @return \FDM\ChampBundle\Entity\Entraineur
     */
    public function getEntraineurCE()
    {
        return $this->entraineurCE;
    }

    /**
     * Set clubCE
     *
     * @param \FDM\ChampBundle\Entity\Club $clubCE
     *
     * @return ContratEntraineur
     */
    public function setClubCE(\FDM\ChampBundle\Entity\Club $clubCE)
    {
        $this->clubCE = $clubCE;

        return $this;
    }

    /**
     * Get clubCE
     *
     * @return \FDM\ChampBundle\Entity\Club
     */
    public function getClubCE()
    {
        return $this->clubCE;
    }
}
