<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptMoyenPaiement.
 *
 * @ORM\Table(name="cpt_moyen_paiement", indexes={@ORM\Index(name="IDX_E35BA228896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_E35BA228B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptMoyenPaiementRepository")
 */
class CptMoyenPaiement extends BaseEntity
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="decsription", type="text", length=0, nullable=true)
     */
    private $decsription;

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

    public function getDecsription(): ?string
    {
        return $this->decsription;
    }

    public function setDecsription(?string $decsription): self
    {
        $this->decsription = $decsription;

        return $this;
    }
}
