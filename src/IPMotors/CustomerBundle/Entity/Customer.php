<?php

namespace IPMotors\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IPMotors\CustomerBundle\Entity\CustomerRepository")
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=45)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="postal", type="string", length=10)
     */
    private $postal;

        
    /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=45)
     */
    private $town;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=10)
     */
    private $telephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=120)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="type_vehicule", type="string", length=120)
     */
    private $typeVehicule;
    
    /**
     * @var string
     *
     * @ORM\Column(name="brand_vehicule", type="string", length=120)
     */
    private $brandVehicule;
    
    /**
     * @var string
     *
     * @ORM\Column(name="model_vehicule", type="string", length=120)
     */
    private $modelVehicule;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="fk_id_survey", type="integer")
     */
    private $idSurvey;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix1", type="integer")
     */
    private $choix1 = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix2", type="integer")
     */
    private $choix2 = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix3", type="integer")
     */
    private $choix3 = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix4", type="integer")
     */
    private $choix4 = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix5", type="integer")
     */
    private $choix5 = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="choix6", type="integer")
     */
    private $choix6;
    
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
     * Set nom
     *
     * @param string $nom
     * @return Customer
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Customer
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Customer
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }


    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Customer
     */
    public function setPostal($postal  = "NULL")
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getPostal()
    {
        return $this->postal;
    }



    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Customer
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Customer
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Customer
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set type_vehicule
     *
     * @param string $email
     * @return Customer
     */
    public function setTypeVehicule($typeVehicule)
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    /**
     * Get type_vehicule
     *
     * @return string 
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }

    /**
     * Set brand_vehicule
     *
     * @param string $email
     * @return Customer
     */
    public function setBrandVehicule($brandVehicule)
    {
        $this->brandVehicule = $brandVehicule;

        return $this;
    }

    /**
     * Get brand_vehicule
     *
     * @return string 
     */
    public function getBrandVehicule()
    {
        return $this->brandVehicule;
    }

    /**
     * Set model_vehicule
     *
     * @param string $email
     * @return Customer
     */
    public function setModelVehicule($modelVehicule)
    {
        $this->modelVehicule = $modelVehicule;

        return $this;
    }

    /**
     * Get model_vehicule
     *
     * @return string 
     */
    public function getModelVehicule()
    {
        return $this->modelVehicule;
    }
    
    public function getIdSurvey() {
        return $this->idSurvey;
    }

    public function setIdSurvey($idSurvey) {
        $this->idSurvey = $idSurvey;
        
        return $this;
    }
    
    public function getChoix1() {
        return $this->choix1;
    }

    public function getChoix2() {
        return $this->choix2;
    }

    public function getChoix3() {
        return $this->choix3;
    }

    public function getChoix4() {
        return $this->choix4;
    }

    public function getChoix5() {
        return $this->choix5;
    }

    public function getChoix6() {
        return $this->choix6;
    }

    public function setChoix1($choix1) {
        $this->choix1 = $choix1;
        return $this;
    }

    public function setChoix2($choix2) {
        $this->choix2 = $choix2;
        return $this;
    }

    public function setChoix3($choix3) {
        $this->choix3 = $choix3;
        return $this;
    }

    public function setChoix4($choix4) {
        $this->choix4 = $choix4;
        return $this;
    }

    public function setChoix5($choix5) {
        $this->choix5 = $choix5;
        return $this;
    }

    public function setChoix6($choix6) {
        $this->choix6 = $choix6;
        return $this;
    }


    
}
