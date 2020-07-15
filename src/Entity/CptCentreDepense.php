<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptCentreDepense.
 *
 * @ORM\Table(name="cpt_centre_depense", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_727BA9E8A4D60759", columns={"libelle"})}, indexes={@ORM\Index(name="IDX_727BA9E8B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_727BA9E8896DBBDE", columns={"updated_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptCentreDepenseRepository")
 */
class CptCentreDepense extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    public function getCode(): ?string
    {
        return $this->code;
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
