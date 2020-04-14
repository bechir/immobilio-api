<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatSci.
 *
 * @ORM\Table(name="pat_sci", indexes={@ORM\Index(name="IDX_199BDC0896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_199BDC0B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\PatSciRepository")
 */
class PatSci extends BaseEntity
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
     * @ORM\Column(name="reference", type="string", length=15, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_nom", type="string", length=255, nullable=false)
     */
    private $contactNom;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_telephone1", type="string", length=30, nullable=false)
     */
    private $contactTelephone1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact_telephone2", type="string", length=30, nullable=true)
     */
    private $contactTelephone2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact_email", type="string", length=255, nullable=true)
     */
    private $contactEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_file", type="string", length=20, nullable=true)
     */
    private $logoFile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rccm", type="string", length=20, nullable=true)
     */
    private $rccm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_contribuable", type="string", length=30, nullable=true)
     */
    private $numContribuable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque", type="string", length=30, nullable=true)
     */
    private $banque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_compte", type="string", length=255, nullable=true)
     */
    private $numeroCompte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="domiciliation_bancaire", type="string", length=20, nullable=true)
     */
    private $domiciliationBancaire;

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContactNom(): ?string
    {
        return $this->contactNom;
    }

    public function setContactNom(string $contactNom): self
    {
        $this->contactNom = $contactNom;

        return $this;
    }

    public function getContactTelephone1(): ?string
    {
        return $this->contactTelephone1;
    }

    public function setContactTelephone1(string $contactTelephone1): self
    {
        $this->contactTelephone1 = $contactTelephone1;

        return $this;
    }

    public function getContactTelephone2(): ?string
    {
        return $this->contactTelephone2;
    }

    public function setContactTelephone2(?string $contactTelephone2): self
    {
        $this->contactTelephone2 = $contactTelephone2;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    public function getLogoFile(): ?string
    {
        return $this->logoFile;
    }

    public function setLogoFile(?string $logoFile): self
    {
        $this->logoFile = $logoFile;

        return $this;
    }

    public function getRccm(): ?string
    {
        return $this->rccm;
    }

    public function setRccm(?string $rccm): self
    {
        $this->rccm = $rccm;

        return $this;
    }

    public function getNumContribuable(): ?string
    {
        return $this->numContribuable;
    }

    public function setNumContribuable(?string $numContribuable): self
    {
        $this->numContribuable = $numContribuable;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(?string $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function getDomiciliationBancaire(): ?string
    {
        return $this->domiciliationBancaire;
    }

    public function setDomiciliationBancaire(?string $domiciliationBancaire): self
    {
        $this->domiciliationBancaire = $domiciliationBancaire;

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
}
