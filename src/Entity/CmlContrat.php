<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlContrat.
 *
 * @ORM\Table(name="cml_contrat", indexes={@ORM\Index(name="IDX_4DA11B22896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_4DA11B22B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_4DA11B2219EB6921", columns={"client_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlContratRepository")
 */
class CmlContrat extends BaseEntity
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
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenu", type="text", length=0, nullable=true)
     */
    private $contenu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=0, nullable=true)
     */
    private $note;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montant_total", type="integer", nullable=true)
     */
    private $montantTotal;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_signature", type="date", nullable=true)
     */
    private $dateSignature;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_contrat", type="string", length=20, nullable=true)
     */
    private $numContrat;

    /**
     * @var int
     *
     * @ORM\Column(name="cycle_facturation", type="integer", nullable=false, options={"default"="1","comment"="Périodicité de facturation en mois du contrat"})
     */
    private $cycleFacturation = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA"})
     */
    private $codeAgence = 'DLA';

    /**
     * @var CmlClient
     *
     * @ORM\ManyToOne(targetEntity="CmlClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
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

    public function getMontantTotal(): ?int
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(?int $montantTotal): self
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->dateSignature;
    }

    public function setDateSignature(?\DateTimeInterface $dateSignature): self
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getNumContrat(): ?string
    {
        return $this->numContrat;
    }

    public function setNumContrat(?string $numContrat): self
    {
        $this->numContrat = $numContrat;

        return $this;
    }

    public function getCycleFacturation(): ?int
    {
        return $this->cycleFacturation;
    }

    public function setCycleFacturation(int $cycleFacturation): self
    {
        $this->cycleFacturation = $cycleFacturation;

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

    public function getClient(): ?CmlClient
    {
        return $this->client;
    }

    public function setClient(?CmlClient $client): self
    {
        $this->client = $client;

        return $this;
    }
}
