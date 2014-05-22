<?php

namespace IPMotors\ChoicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choices
 */
class Choices
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $choixUn;

    /**
     * @var integer
     */
    private $choixDeux;

    /**
     * @var integer
     */
    private $choixTrois;

    /**
     * @var integer
     */
    private $choixQuatre;

    /**
     * @var integer
     */
    private $choixCinq;

    /**
     * @var integer
     */
    private $choixSix;


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
     * Set choixUn
     *
     * @param integer $choixUn
     * @return Choices
     */
    public function setChoixUn($choixUn)
    {
        $this->choixUn = $choixUn;
    
        return $this;
    }

    /**
     * Get choixUn
     *
     * @return string 
     */
    public function getChoixUn()
    {
        return $this->choixUn;
    }

    /**
     * Set choixDeux
     *
     * @param integer $choixDeux
     * @return Choices
     */
    public function setChoixDeux($choixDeux)
    {
        $this->choixDeux = $choixDeux;
    
        return $this;
    }

    /**
     * Get choixDeux
     *
     * @return integer 
     */
    public function getChoixDeux()
    {
        return $this->choixDeux;
    }

    /**
     * Set choixTrois
     *
     * @param integer $choixTrois
     * @return Choices
     */
    public function setChoixTrois($choixTrois)
    {
        $this->choixTrois = $choixTrois;
    
        return $this;
    }

    /**
     * Get choixTrois
     *
     * @return integer 
     */
    public function getChoixTrois()
    {
        return $this->choixTrois;
    }

    /**
     * Set choixQuatre
     *
     * @param integer $choixQuatre
     * @return Choices
     */
    public function setChoixQuatre($choixQuatre)
    {
        $this->choixQuatre = $choixQuatre;
    
        return $this;
    }

    /**
     * Get choixQuatre
     *
     * @return integer 
     */
    public function getChoixQuatre()
    {
        return $this->choixQuatre;
    }

    /**
     * Set choixCinq
     *
     * @param integer $choixCinq
     * @return Choices
     */
    public function setChoixCinq($choixCinq)
    {
        $this->choixCinq = $choixCinq;
    
        return $this;
    }

    /**
     * Get choixCinq
     *
     * @return integer 
     */
    public function getChoixCinq()
    {
        return $this->choixCinq;
    }

    /**
     * Set choixSix
     *
     * @param integer $choixSix
     * @return Choices
     */
    public function setChoixSix($choixSix)
    {
        $this->choixSix = $choixSix;
    
        return $this;
    }

    /**
     * Get choixSix
     *
     * @return integer 
     */
    public function getChoixSix()
    {
        return $this->choixSix;
    }
}
