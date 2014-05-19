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
     * @var integer
     *
     * @ORM\Column(name="vehicule_id_vehicule", type="smallint")
     */
    private $vehiculeIdVehicule;

    /**
     * @var integer
     *
     * @ORM\Column(name="liste_choix_id_list_choix", type="smallint")
     */
    private $listeChoixIdListChoix;

    /**
     * @var integer
     *
     * @ORM\Column(name="modele_vehicule_id_modele_vehicule", type="smallint")
     */
    private $modeleVehiculeIdModeleVehicule;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_vehicule_id_type_vehicule", type="smallint")
     */
    private $typeVehiculeIdTypeVehicule;


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
    public function setPostal($postal)
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
        $this->postal = $town;

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
     * Set vehiculeIdVehicule
     *
     * @param integer $vehiculeIdVehicule
     * @return Customer
     */
    public function setVehiculeIdVehicule($vehiculeIdVehicule)
    {
        $this->vehiculeIdVehicule = $vehiculeIdVehicule;

        return $this;
    }

    /**
     * Get vehiculeIdVehicule
     *
     * @return integer 
     */
    public function getVehiculeIdVehicule()
    {
        return $this->vehiculeIdVehicule;
    }

    /**
     * Set listeChoixIdListChoix
     *
     * @param integer $listeChoixIdListChoix
     * @return Customer
     */
    public function setListeChoixIdListChoix($listeChoixIdListChoix)
    {
        $this->listeChoixIdListChoix = $listeChoixIdListChoix;

        return $this;
    }

    /**
     * Get listeChoixIdListChoix
     *
     * @return integer 
     */
    public function getListeChoixIdListChoix()
    {
        return $this->listeChoixIdListChoix;
    }

    /**
     * Set modeleVehiculeIdModeleVehicule
     *
     * @param integer $modeleVehiculeIdModeleVehicule
     * @return Customer
     */
    public function setModeleVehiculeIdModeleVehicule($modeleVehiculeIdModeleVehicule)
    {
        $this->modeleVehiculeIdModeleVehicule = $modeleVehiculeIdModeleVehicule;

        return $this;
    }

    /**
     * Get modeleVehiculeIdModeleVehicule
     *
     * @return integer 
     */
    public function getModeleVehiculeIdModeleVehicule()
    {
        return $this->modeleVehiculeIdModeleVehicule;
    }

    /**
     * Set typeVehiculeIdTypeVehicule
     *
     * @param integer $typeVehiculeIdTypeVehicule
     * @return Customer
     */
    public function setTypeVehiculeIdTypeVehicule($typeVehiculeIdTypeVehicule)
    {
        $this->typeVehiculeIdTypeVehicule = $typeVehiculeIdTypeVehicule;

        return $this;
    }

    /**
     * Get typeVehiculeIdTypeVehicule
     *
     * @return integer 
     */
    public function getTypeVehiculeIdTypeVehicule()
    {
        return $this->typeVehiculeIdTypeVehicule;
    }
}
