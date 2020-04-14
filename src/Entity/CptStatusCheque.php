<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptStatusCheque.
 *
 * @ORM\Table(name="cpt_status_cheque", indexes={@ORM\Index(name="IDX_D9CC9DAC896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_D9CC9DACB03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptStatusChequeRepository")
 */
class CptStatusCheque
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

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
     * @var bool|null
     *
     * @ORM\Column(name="archived", type="boolean", nullable=true, options={"comment"="Indique si l'élément est archivé"})
     */
    private $archived = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

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

    public function getCode(): ?string
    {
        return $this->code;
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

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(?bool $archived): self
    {
        $this->archived = $archived;

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
