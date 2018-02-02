<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomEquipe
 *
 * @ORM\Table(name="nom_equipe")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\NomEquipeRepository")
 */
class NomEquipe
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
     * @ORM\Column(name="nomEquipe", type="string", length=255)
     */
    private $nomEquipe;

    /**
     * @var int
     *
     * @ORM\Column(name="dateNomEquipe", type="integer")
     */
    private $dateNomEquipe;
    
    /**
     * @ORM\ManyToOne(targetEntity="FDM\ChampBundle\Entity\Equipe", inversedBy="nomsEquipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeNomEquipe;


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
     * Set nomEquipe
     *
     * @param string $nomEquipe
     *
     * @return NomEquipe
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set dateNomEquipe
     *
     * @param integer $dateNomEquipe
     *
     * @return NomEquipe
     */
    public function setDateNomEquipe($dateNomEquipe)
    {
        $this->dateNomEquipe = $dateNomEquipe;

        return $this;
    }

    /**
     * Get dateNomEquipe
     *
     * @return int
     */
    public function getDateNomEquipe()
    {
        return $this->dateNomEquipe;
    }

    /**
     * Set equipeNomEquipe
     *
     * @param \FDM\ChampBundle\Entity\Equipe $equipeNomEquipe
     *
     * @return NomEquipe
     */
    public function setEquipeNomEquipe(\FDM\ChampBundle\Entity\Equipe $equipeNomEquipe)
    {
        $this->equipeNomEquipe = $equipeNomEquipe;

        return $this;
    }

    /**
     * Get equipeNomEquipe
     *
     * @return \FDM\ChampBundle\Entity\Equipe
     */
    public function getEquipeNomEquipe()
    {
        return $this->equipeNomEquipe;
    }
}
