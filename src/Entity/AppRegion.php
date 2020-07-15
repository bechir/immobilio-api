<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppRegion.
 *
 * @ORM\Table(name="app_region", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_EA619CF66C6E55B5", columns={"nom"}), @ORM\UniqueConstraint(name="UNIQ_EA619CF677153098", columns={"code"})}, indexes={@ORM\Index(name="IDX_EA619CF6896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_EA619CF6B03A8386", columns={"created_by_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppRegionRepository")
 */
class AppRegion extends BaseEntity
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
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
