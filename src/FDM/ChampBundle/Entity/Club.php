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
     * @ORM\Column(name="creationClub", type="integer", nullable=true)
     */
    private $creationClub;
    
    /**
     * @var int
     *
     * @ORM\Column(name="creationClub2", type="integer", nullable=true)
     */
    private $creationClub2;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="htmlClubWiki", type="string", length=255)
     */
    private $htmlClubWiki;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="FDM\ChampBundle\Entity\AncienNomClub", mappedBy="clubANC", cascade={"persist"})
     */
    private $anciensNomsClub;


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

    /**
     * Set htmlClubWiki
     *
     * @param string $htmlClubWiki
     *
     * @return Club
     */
    public function setHtmlClubWiki($htmlClubWiki)
    {
        $this->htmlClubWiki = $htmlClubWiki;

        return $this;
    }

    /**
     * Get htmlClubWiki
     *
     * @return string
     */
    public function getHtmlClubWiki()
    {
        return $this->htmlClubWiki;
    }
    /**
     * Constructor
     */
    public function __construct(string $nomClub, int $creationClub, string $htmlClubWiki)
    {
        $this->nomClub = $nomClub ;
        $this->creationClub = $creationClub;
        $this->htmlClubWiki = $htmlClubWiki;
    	$this->anciensNomsClub = new \Doctrine\Common\Collections\ArrayCollection();
    	
//     	$date = new \DateTime('NOW');
//     	$ancienNom = new AncienNomClub($nomClub, date_format($date, "Y"));
//     	$ancienNom = new AncienNomClub($nomClub, $creationClub);
//     	$this->addAnciensNomsClub($ancienNom);
        
    }
    
    
    protected function clubExiste(Club $club)
    {
    	foreach ($this->getAnciensNomsClub() as $ancN){
    		if ($club->getNomClub() == $ancN->getAncienNomClub()) return true ;
    	}
    	return false;
    	
    }

    /**
     * Add anciensNomsClub
     *
     * @param \FDM\ChampBundle\Entity\AncienNomClub $anciensNomsClub
     *
     * @return Club
     */
    public function addAnciensNomsClub(\FDM\ChampBundle\Entity\AncienNomClub $anciensNomsClub)
    {
        $this->anciensNomsClub[] = $anciensNomsClub;
        
        $anciensNomsClub->setClubANC($this);

        return $this;
    }

    /**
     * Remove anciensNomsClub
     *
     * @param \FDM\ChampBundle\Entity\AncienNomClub $anciensNomsClub
     */
    public function removeAnciensNomsClub(\FDM\ChampBundle\Entity\AncienNomClub $anciensNomsClub)
    {
        $this->anciensNomsClub->removeElement($anciensNomsClub);
    }

    /**
     * Get anciensNomsClub
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnciensNomsClub()
    {
        return $this->anciensNomsClub;
    }

    /**
     * Set creationClub2
     *
     * @param integer $creationClub2
     *
     * @return Club
     */
    public function setCreationClub2($creationClub2)
    {
        $this->creationClub2 = $creationClub2;

        return $this;
    }

    /**
     * Get creationClub2
     *
     * @return integer
     */
    public function getCreationClub2()
    {
        return $this->creationClub2;
    }
}
