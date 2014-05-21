<?php

namespace IPMotors\FormEditBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Survey
 */
class Survey
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $actualVehiculName;

    /**
     * @var string
     */
    private $actualVehiculStrenghs;

    /**
     * @var string
     */
    private $futurVehiculName;

    /**
     * @var string
     */
    private $futurVehiculStrenghs;

    /**
     * @var string
     */
    private $mailId;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $activated;


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
     * Set name
     *
     * @param string $name
     * @return Survey
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set actualVehiculName
     *
     * @param string $actualVehiculName
     * @return Survey
     */
    public function setActualVehiculName($actualVehiculName)
    {
        $this->actualVehiculName = $actualVehiculName;

        return $this;
    }

    /**
     * Get actualVehiculName
     *
     * @return string 
     */
    public function getActualVehiculName()
    {
        return $this->actualVehiculName;
    }

    /**
     * Set actualVehiculStrenghs
     *
     * @param string $actualVehiculStrenghs
     * @return Survey
     */
    public function setActualVehiculStrenghs($actualVehiculStrenghs)
    {
        $this->actualVehiculStrenghs = $actualVehiculStrenghs;

        return $this;
    }

    /**
     * Get actualVehiculStrenghs
     *
     * @return string 
     */
    public function getActualVehiculStrenghs()
    {
        return $this->actualVehiculStrenghs;
    }

    /**
     * Set futurVehiculName
     *
     * @param string $futurVehiculName
     * @return Survey
     */
    public function setFuturVehiculName($futurVehiculName)
    {
        $this->futurVehiculName = $futurVehiculName;

        return $this;
    }

    /**
     * Get futurVehiculName
     *
     * @return string 
     */
    public function getFuturVehiculName()
    {
        return $this->futurVehiculName;
    }

    /**
     * Set futurVehiculStrenghs
     *
     * @param string $futurVehiculStrenghs
     * @return Survey
     */
    public function setFuturVehiculStrenghs($futurVehiculStrenghs)
    {
        $this->futurVehiculStrenghs = $futurVehiculStrenghs;

        return $this;
    }

    /**
     * Get futurVehiculStrenghs
     *
     * @return string 
     */
    public function getFuturVehiculStrenghs()
    {
        return $this->futurVehiculStrenghs;
    }

    /**
     * Set mailContent
     *
     * @param string $mailContent
     * @return Survey
     */
    public function setMailId($mailId)
    {
        $this->mailId = $mailId;

        return $this;
    }

    /**
     * Get mailId
     *
     * @return string 
     */
    public function getMailId()
    {
        return $this->mailId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Survey
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set activated
     *
     * @param boolean $activated
     * @return Survey
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated
     *
     * @return boolean 
     */
    public function getActivated()
    {
        return $this->activated;
    }
}
