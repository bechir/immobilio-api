<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptBanque.
 *
 * @ORM\Table(name="cpt_banque", indexes={@ORM\Index(name="IDX_D44A787B896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_D44A787BB03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptBanqueRepository")
 */
class CptBanque extends BaseEntity
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

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
}
