<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlStatusFacture.
 *
 * @ORM\Table(name="cml_status_facture", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_68923DD1A4D60759", columns={"libelle"})}, indexes={@ORM\Index(name="IDX_68923DD1B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_68923DD1896DBBDE", columns={"updated_by_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlStatusFactureRepository")
 */
class CmlStatusFacture extends BaseEntity
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
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
