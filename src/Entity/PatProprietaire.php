<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatProprietaire.
 *
 * @ORM\Table(name="pat_proprietaire", indexes={@ORM\Index(name="IDX_717E7E4896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_717E7E4B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\PatProprietaireRepository")
 */
class PatProprietaire extends BaseEntity
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenoms", type="string", length=255, nullable=false)
     */
    private $prenoms;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone1", type="string", length=30, nullable=false)
     */
    private $telephone1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone2", type="string", length=30, nullable=true)
     */
    private $telephone2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getTelephone1(): ?string
    {
        return $this->telephone1;
    }

    public function setTelephone1(string $telephone1): self
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    public function getTelephone2(): ?string
    {
        return $this->telephone2;
    }

    public function setTelephone2(?string $telephone2): self
    {
        $this->telephone2 = $telephone2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
