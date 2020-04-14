<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatBienImmobilier.
 *
 * @ORM\Table(name="pat_bien_immobilier", indexes={@ORM\Index(name="IDX_FD3D670C896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_FD3D670C3DC877FA", columns={"sci_id"}), @ORM\Index(name="IDX_FD3D670CA73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_FD3D670CB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_FD3D670C76C50E4A", columns={"proprietaire_id"}), @ORM\Index(name="IDX_FD3D670CABC9EDAD", columns={"nature_espace_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\PatBienImmobilierRepository")
 */
class PatBienImmobilier extends BaseEntity
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
     * @var PatProprietaire|null
     *
     * @ORM\ManyToOne(targetEntity="PatProprietaire")
     * @ORM\JoinColumn(name="proprietaire_id", referencedColumnName="id", nullable=true)
     */
    private $proprietaire;

    /**
     * @var PatSci|null
     *
     * @ORM\ManyToOne(targetEntity="PatSci")
     * @ORM\JoinColumn(name="sci_id", referencedColumnName="id", nullable=true)
     */
    private $sci;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=15, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

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
     * @var PatNatureEspace|null
     *
     * @ORM\ManyToOne(targetEntity="PatNatureEspace")
     * @ORM\JoinColumn(name="nature_espace_id", referencedColumnName="id", nullable=true)
     */
    private $natureEspace;

    /**
     * @var AppVille|null
     *
     * @ORM\ManyToOne(targetEntity="AppVille")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_commun", type="string", length=255, nullable=true)
     */
    private $nomCommun;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getNomCommun(): ?string
    {
        return $this->nomCommun;
    }

    public function setNomCommun(?string $nomCommun): self
    {
        $this->nomCommun = $nomCommun;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

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

    public function getProprietaire(): ?PatProprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?PatProprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getSci(): ?PatSci
    {
        return $this->sci;
    }

    public function setSci(?PatSci $sci): self
    {
        $this->sci = $sci;

        return $this;
    }

    public function getNatureEspace(): ?PatNatureEspace
    {
        return $this->natureEspace;
    }

    public function setNatureEspace(?PatNatureEspace $natureEspace): self
    {
        $this->natureEspace = $natureEspace;

        return $this;
    }

    public function getVille(): ?AppVille
    {
        return $this->ville;
    }

    public function setVille(?AppVille $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
