<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptCompte.
 *
 * @ORM\Table(name="cpt_compte", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_AA4AE1279731415A", columns={"numero_compte"})}, indexes={@ORM\Index(name="IDX_AA4AE127896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_AA4AE127D725330D", columns={"agence_id"}), @ORM\Index(name="IDX_AA4AE127727ACA70", columns={"parent_id"}), @ORM\Index(name="IDX_AA4AE127B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_AA4AE127930B861F", columns={"typeCompte_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptCompteRepository")
 */
class CptCompte extends BaseEntity
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
     * @var AppAgence|null
     *
     * @ORM\ManyToOne(targetEntity="AppAgence")
     * @ORM\JoinColumn(name="agence_id", referencedColumnName="id", nullable=true)
     */
    private $agence;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte", type="string", length=255, nullable=false)
     */
    private $numeroCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var float|null
     *
     * @ORM\Column(name="solde", type="float", precision=10, scale=0, nullable=true)
     */
    private $solde = '0';

    /**
     * @var CptTypeCompte|null
     *
     * @ORM\ManyToOne(targetEntity="CptTypeCompte")
     * @ORM\JoinColumn(name="typeCompte_id", referencedColumnName="id", nullable=true)
     */
    private $typecompte;

    /**
     * @var CptCompte|null
     *
     * @ORM\ManyToOne(targetEntity="CptCompte")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private $parent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(string $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(?float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getAgence(): ?AppAgence
    {
        return $this->agence;
    }

    public function setAgence(?AppAgence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getTypecompte(): ?CptTypeCompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?CptTypeCompte $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
