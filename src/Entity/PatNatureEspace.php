<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatNatureEspace.
 *
 * @ORM\Table(name="pat_nature_espace", indexes={@ORM\Index(name="IDX_FA1E0E44896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_FA1E0E44B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\PatNatureEspaceRepository")
 */
class PatNatureEspace extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=false)
     */
    private $libelle;

    public function getId(): ?string
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
}
