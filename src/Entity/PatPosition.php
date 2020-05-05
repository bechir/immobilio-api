<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatPosition.
 *
 * @ORM\Table(name="pat_position", indexes={@ORM\Index(name="IDX_BF829EBA896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_BF829EBA5992120A", columns={"bien_immobilier_id"}), @ORM\Index(name="IDX_BF829EBAB03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\PatPositionRepository")
 */
class PatPosition extends BaseEntity
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
     * @var PatBienImmobilier|null
     *
     * @ORM\ManyToOne(targetEntity="PatBienImmobilier")
     * @ORM\JoinColumn(name="bien_immobilier_id", referencedColumnName="id", nullable=true)
     */
    private $bienImmobilier;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBienImmobilier(): ?PatBienImmobilier
    {
        return $this->bienImmobilier;
    }

    public function setBienImmobilier(?PatBienImmobilier $bienImmobilier): self
    {
        $this->bienImmobilier = $bienImmobilier;

        return $this;
    }
}
