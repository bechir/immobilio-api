<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlClient
 *
 * @ORM\Table(name="cml_client", indexes={@ORM\Index(name="IDX_502938AA896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_502938AAB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_502938AAAD2D2831", columns={"type_client_id"})})
 * @ORM\Entity
 */
class CmlClient extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=0, nullable=true)
     */
    private $note;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="raison_sociale", type="string", length=255, nullable=true)
     */
    private $raisonSociale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registre_commerce", type="string", length=255, nullable=true)
     */
    private $registreCommerce;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_ninea", type="string", length=255, nullable=true)
     */
    private $numNinea;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_principal_nom", type="string", length=255, nullable=true)
     */
    private $personnePrincipalNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_principal_tel1", type="string", length=255, nullable=true)
     */
    private $personnePrincipalTel1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_principal_tel2", type="string", length=255, nullable=true)
     */
    private $personnePrincipalTel2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_principal_email", type="string", length=255, nullable=true)
     */
    private $personnePrincipalEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_principal_titre", type="string", length=255, nullable=true)
     */
    private $personnePrincipalTitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_second_nom", type="string", length=255, nullable=true)
     */
    private $personneSecondNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_second_tel1", type="string", length=255, nullable=true)
     */
    private $personneSecondTel1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_second_tel2", type="string", length=255, nullable=true)
     */
    private $personneSecondTel2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_second_email", type="string", length=255, nullable=true)
     */
    private $personneSecondEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="personne_second_titre", type="string", length=255, nullable=true)
     */
    private $personneSecondTitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dg_nom", type="string", length=255, nullable=true)
     */
    private $dgNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dg_tel1", type="string", length=255, nullable=true)
     */
    private $dgTel1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dg_tel2", type="string", length=255, nullable=true)
     */
    private $dgTel2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dg_email", type="string", length=255, nullable=true)
     */
    private $dgEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_client", type="string", length=255, nullable=true)
     */
    private $codeClient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activite", type="text", length=0, nullable=true)
     */
    private $activite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel_client", type="string", length=200, nullable=true)
     */
    private $telClient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_client", type="string", length=200, nullable=true)
     */
    private $emailClient;

    /**
     * @var array|null
     *
     * @ORM\Column(name="configuration", type="array", length=0, nullable=true)
     */
    private $configuration;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sigle", type="string", length=20, nullable=true)
     */
    private $sigle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

    /**
     * @var CmlTypeClient
     *
     * @ORM\ManyToOne(targetEntity="CmlTypeClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_client_id", referencedColumnName="id")
     * })
     */
    private $typeClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(?string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getRegistreCommerce(): ?string
    {
        return $this->registreCommerce;
    }

    public function setRegistreCommerce(?string $registreCommerce): self
    {
        $this->registreCommerce = $registreCommerce;

        return $this;
    }

    public function getNumNinea(): ?string
    {
        return $this->numNinea;
    }

    public function setNumNinea(?string $numNinea): self
    {
        $this->numNinea = $numNinea;

        return $this;
    }

    public function getPersonnePrincipalNom(): ?string
    {
        return $this->personnePrincipalNom;
    }

    public function setPersonnePrincipalNom(?string $personnePrincipalNom): self
    {
        $this->personnePrincipalNom = $personnePrincipalNom;

        return $this;
    }

    public function getPersonnePrincipalTel1(): ?string
    {
        return $this->personnePrincipalTel1;
    }

    public function setPersonnePrincipalTel1(?string $personnePrincipalTel1): self
    {
        $this->personnePrincipalTel1 = $personnePrincipalTel1;

        return $this;
    }

    public function getPersonnePrincipalTel2(): ?string
    {
        return $this->personnePrincipalTel2;
    }

    public function setPersonnePrincipalTel2(?string $personnePrincipalTel2): self
    {
        $this->personnePrincipalTel2 = $personnePrincipalTel2;

        return $this;
    }

    public function getPersonnePrincipalEmail(): ?string
    {
        return $this->personnePrincipalEmail;
    }

    public function setPersonnePrincipalEmail(?string $personnePrincipalEmail): self
    {
        $this->personnePrincipalEmail = $personnePrincipalEmail;

        return $this;
    }

    public function getPersonnePrincipalTitre(): ?string
    {
        return $this->personnePrincipalTitre;
    }

    public function setPersonnePrincipalTitre(?string $personnePrincipalTitre): self
    {
        $this->personnePrincipalTitre = $personnePrincipalTitre;

        return $this;
    }

    public function getPersonneSecondNom(): ?string
    {
        return $this->personneSecondNom;
    }

    public function setPersonneSecondNom(?string $personneSecondNom): self
    {
        $this->personneSecondNom = $personneSecondNom;

        return $this;
    }

    public function getPersonneSecondTel1(): ?string
    {
        return $this->personneSecondTel1;
    }

    public function setPersonneSecondTel1(?string $personneSecondTel1): self
    {
        $this->personneSecondTel1 = $personneSecondTel1;

        return $this;
    }

    public function getPersonneSecondTel2(): ?string
    {
        return $this->personneSecondTel2;
    }

    public function setPersonneSecondTel2(?string $personneSecondTel2): self
    {
        $this->personneSecondTel2 = $personneSecondTel2;

        return $this;
    }

    public function getPersonneSecondEmail(): ?string
    {
        return $this->personneSecondEmail;
    }

    public function setPersonneSecondEmail(?string $personneSecondEmail): self
    {
        $this->personneSecondEmail = $personneSecondEmail;

        return $this;
    }

    public function getPersonneSecondTitre(): ?string
    {
        return $this->personneSecondTitre;
    }

    public function setPersonneSecondTitre(?string $personneSecondTitre): self
    {
        $this->personneSecondTitre = $personneSecondTitre;

        return $this;
    }

    public function getDgNom(): ?string
    {
        return $this->dgNom;
    }

    public function setDgNom(?string $dgNom): self
    {
        $this->dgNom = $dgNom;

        return $this;
    }

    public function getDgTel1(): ?string
    {
        return $this->dgTel1;
    }

    public function setDgTel1(?string $dgTel1): self
    {
        $this->dgTel1 = $dgTel1;

        return $this;
    }

    public function getDgTel2(): ?string
    {
        return $this->dgTel2;
    }

    public function setDgTel2(?string $dgTel2): self
    {
        $this->dgTel2 = $dgTel2;

        return $this;
    }

    public function getDgEmail(): ?string
    {
        return $this->dgEmail;
    }

    public function setDgEmail(?string $dgEmail): self
    {
        $this->dgEmail = $dgEmail;

        return $this;
    }

    public function getCodeClient(): ?string
    {
        return $this->codeClient;
    }

    public function setCodeClient(?string $codeClient): self
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(?string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(?string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(?string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }

    public function setConfiguration(?array $configuration): self
    {
        $this->configuration = $configuration;

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->sigle;
    }

    public function setSigle(?string $sigle): self
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getCodeAgence(): ?string
    {
        return $this->codeAgence;
    }

    public function setCodeAgence(string $codeAgence): self
    {
        $this->codeAgence = $codeAgence;

        return $this;
    }

    public function getTypeClient(): ?CmlTypeClient
    {
        return $this->typeClient;
    }

    public function setTypeClient(?CmlTypeClient $typeClient): self
    {
        $this->typeClient = $typeClient;

        return $this;
    }
}
