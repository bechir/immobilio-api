<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppAgence.
 *
 * @ORM\Table(name="app_agence", uniqueConstraints={@ORM\UniqueConstraint(name="code_UNIQUE", columns={"code"}), @ORM\UniqueConstraint(name="UNIQ_81C2F7296C6E55B5", columns={"nom"})}, indexes={@ORM\Index(name="IDX_81C2F729B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_81C2F729A73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_81C2F729896DBBDE", columns={"updated_by_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppAgenceRepository")
 */
class AppAgence extends BaseEntity
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
     * @var AppVille
     *
     * @ORM\ManyToOne(targetEntity="AppVille")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $code = 'DLA01';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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
