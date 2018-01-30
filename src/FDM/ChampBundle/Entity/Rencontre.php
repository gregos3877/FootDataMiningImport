<?php

namespace FDM\ChampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rencontre
 *
 * @ORM\Table(name="rencontre")
 * @ORM\Entity(repositoryClass="FDM\ChampBundle\Repository\RencontreRepository")
 */
class Rencontre
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
     * @ORM\Column(name="dateRencontre", type="datetime")
     */
    private $dateRencontre;

    /**
     * @var int
     *
     * @ORM\Column(name="journeeRencontre", type="integer")
     */
    private $journeeRencontre;


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
     * Set dateRencontre
     *
     * @param \DateTime $dateRencontre
     *
     * @return Rencontre
     */
    public function setDateRencontre($dateRencontre)
    {
        $this->dateRencontre = $dateRencontre;

        return $this;
    }

    /**
     * Get dateRencontre
     *
     * @return \DateTime
     */
    public function getDateRencontre()
    {
        return $this->dateRencontre;
    }

    /**
     * Set journeeRencontre
     *
     * @param integer $journeeRencontre
     *
     * @return Rencontre
     */
    public function setJourneeRencontre($journeeRencontre)
    {
        $this->journeeRencontre = $journeeRencontre;

        return $this;
    }

    /**
     * Get journeeRencontre
     *
     * @return int
     */
    public function getJourneeRencontre()
    {
        return $this->journeeRencontre;
    }
}

