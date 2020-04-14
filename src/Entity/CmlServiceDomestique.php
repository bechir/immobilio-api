<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlServiceDomestique.
 *
 * @ORM\Table(name="cml_service_domestique", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_DF80FEF6A4D60759", columns={"libelle"})}, indexes={@ORM\Index(name="IDX_DF80FEF6B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_DF80FEF6A73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_DF80FEF6896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_DF80FEF63DC877FA", columns={"sci_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CmlServiceDomestiqueRepository")
 */
class CmlServiceDomestique extends BaseEntity
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
     * @var AppVille
     *
     * @ORM\ManyToOne(targetEntity="AppVille")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=false)
     */
    private $ville;

    /**
     * @var PatSci
     *
     * @ORM\ManyToOne(targetEntity="PatSci")
     * @ORM\JoinColumn(name="sci_id", referencedColumnName="id", nullable=false)
     */
    private $sci;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", length=0, nullable=true)
     */
    private $commentaire;

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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getSci(): ?PatSci
    {
        return $this->sci;
    }

    public function setSci(?PatSci $sci): self
    {
        $this->sci = $sci;

        return $this;
    }
}
