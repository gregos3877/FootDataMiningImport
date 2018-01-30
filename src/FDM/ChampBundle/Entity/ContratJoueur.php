<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratJoueur
 *
 * @ORM\Table(name="contrat_joueur")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\ContratJoueurRepository")
 */
class ContratJoueur
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
     * @ORM\Column(name="debutContrat", type="datetime")
     */
    private $debutContrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContrat", type="datetime")
     */
    private $finContrat;


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
     * Set debutContrat
     *
     * @param \DateTime $debutContrat
     *
     * @return ContratJoueur
     */
    public function setDebutContrat($debutContrat)
    {
        $this->debutContrat = $debutContrat;

        return $this;
    }

    /**
     * Get debutContrat
     *
     * @return \DateTime
     */
    public function getDebutContrat()
    {
        return $this->debutContrat;
    }

    /**
     * Set finContrat
     *
     * @param \DateTime $finContrat
     *
     * @return ContratJoueur
     */
    public function setFinContrat($finContrat)
    {
        $this->finContrat = $finContrat;

        return $this;
    }

    /**
     * Get finContrat
     *
     * @return \DateTime
     */
    public function getFinContrat()
    {
        return $this->finContrat;
    }
}

