<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptGestionnaireCompte.
 *
 * @ORM\Table(name="cpt_gestionnaire_compte", indexes={@ORM\Index(name="IDX_EF0F6DA96885AC1B", columns={"gestionnaire_id"}), @ORM\Index(name="IDX_EF0F6DA9896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_EF0F6DA9F2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_EF0F6DA9B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptGestionnaireCompteRepository")
 */
class CptGestionnaireCompte
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
     * @var int
     *
     * @ORM\Column(name="compte_id", type="integer", nullable=false)
     */
    private $compteId;

    /**
     * @var int
     *
     * @ORM\Column(name="gestionnaire_id", type="integer", nullable=false)
     */
    private $gestionnaireId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actived", type="boolean", nullable=true, options={"default"="1"})
     */
    private $actived = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="created_by_id", type="integer", nullable=true)
     */
    private $createdById;

    /**
     * @var int|null
     *
     * @ORM\Column(name="updated_by_id", type="integer", nullable=true)
     */
    private $updatedById;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="archived", type="boolean", nullable=true, options={"comment"="Indique si l'élément est archivé"})
     */
    private $archived = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true, options={"default"="1","comment"="Indique si l'élément est actif ou non"})
     */
    private $enabled = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true, options={"comment"="Indique si l'élément est supprimé"})
     */
    private $deleted = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteId(): ?int
    {
        return $this->compteId;
    }

    public function setCompteId(int $compteId): self
    {
        $this->compteId = $compteId;

        return $this;
    }

    public function getGestionnaireId(): ?int
    {
        return $this->gestionnaireId;
    }

    public function setGestionnaireId(int $gestionnaireId): self
    {
        $this->gestionnaireId = $gestionnaireId;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
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

    public function getActived(): ?bool
    {
        return $this->actived;
    }

    public function setActived(?bool $actived): self
    {
        $this->actived = $actived;

        return $this;
    }

    public function getCreatedById(): ?int
    {
        return $this->createdById;
    }

    public function setCreatedById(?int $createdById): self
    {
        $this->createdById = $createdById;

        return $this;
    }

    public function getUpdatedById(): ?int
    {
        return $this->updatedById;
    }

    public function setUpdatedById(?int $updatedById): self
    {
        $this->updatedById = $updatedById;

        return $this;
    }

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(?bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }
}
