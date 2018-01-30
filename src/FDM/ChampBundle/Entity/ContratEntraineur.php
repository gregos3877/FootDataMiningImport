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
     * @ORM\Column(name="debutContratEntraineur", type="datetime")
     */
    private $debutContratEntraineur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContratEntraineur", type="datetime")
     */
    private $finContratEntraineur;

    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Entraineur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entraineurCE;
    
    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeCE;
    
    

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
     * Set debutContratEntraineur
     *
     * @param \DateTime $debutContratEntraineur
     *
     * @return ContratEntraineur
     */
    public function setDebutContratEntraineur($debutContratEntraineur)
    {
        $this->debutContratEntraineur = $debutContratEntraineur;

        return $this;
    }

    /**
     * Get debutContratEntraineur
     *
     * @return \DateTime
     */
    public function getDebutContratEntraineur()
    {
        return $this->debutContratEntraineur;
    }

    /**
     * Set finContratEntraineur
     *
     * @param \DateTime $finContratEntraineur
     *
     * @return ContratEntraineur
     */
    public function setFinContratEntraineur($finContratEntraineur)
    {
        $this->finContratEntraineur = $finContratEntraineur;

        return $this;
    }

    /**
     * Get finContratEntraineur
     *
     * @return \DateTime
     */
    public function getFinContratEntraineur()
    {
        return $this->finContratEntraineur;
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
     * Set equipeCE
     *
     * @param \FDM\ChampBundle\Entity\Equipe $equipeCE
     *
     * @return ContratEntraineur
     */
    public function setEquipeCE(\FDM\ChampBundle\Entity\Equipe $equipeCE)
    {
        $this->equipeCE = $equipeCE;

        return $this;
    }

    /**
     * Get equipeCE
     *
     * @return \FDM\ChampBundle\Entity\Equipe
     */
    public function getEquipeCE()
    {
        return $this->equipeCE;
    }
}
