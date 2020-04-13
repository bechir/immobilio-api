<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatEspace
 *
 * @ORM\Table(name="pat_espace", indexes={@ORM\Index(name="IDX_1435D6F3896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_1435D6F35992120A", columns={"bien_immobilier_id"}), @ORM\Index(name="IDX_1435D6F3DD842E46", columns={"position_id"}), @ORM\Index(name="IDX_1435D6F3B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_1435D6F376C50E4A", columns={"proprietaire_id"}), @ORM\Index(name="IDX_1435D6F3ABC9EDAD", columns={"nature_espace_id"})})
 * @ORM\Entity
 */
class PatEspace extends BaseEntity
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
     * @var PatBienImmobilier|null
     *
     * @ORM\ManyToOne(targetEntity="PatBienImmobilier")
     * @ORM\JoinColumn(name="bien_immobilier_id", referencedColumnName="id", nullable=true)
     */
    private $bienImmobilier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=15, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="superfice", type="integer", nullable=true)
     */
    private $superfice;

    /**
     * @var PatProprietaire|null
     *
     * @ORM\ManyToOne(targetEntity="PatProprietaire")
     * @ORM\JoinColumn(name="proprietaire_id", referencedColumnName="id", nullable=true)
     */
    private $proprietaire;

    /**
     * @var PatNatureEspace|null
     *
     * @ORM\ManyToOne(targetEntity="PatNatureEspace")
     * @ORM\JoinColumn(name="nature_espace_id", referencedColumnName="id", nullable=true)
     */
    private $natureEspace;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var PatPosition|null
     *
     * @ORM\ManyToOne(targetEntity="PatPosition")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id", nullable=true)
     */
    private $position;

    /**
     * @var int|null
     *
     * @ORM\Column(name="num_position", type="integer", nullable=true)
     */
    private $numPosition;

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSuperfice(): ?int
    {
        return $this->superfice;
    }

    public function setSuperfice(?int $superfice): self
    {
        $this->superfice = $superfice;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNumPosition(): ?int
    {
        return $this->numPosition;
    }

    public function setNumPosition(?int $numPosition): self
    {
        $this->numPosition = $numPosition;

        return $this;
    }

    public function getCodeAgence(): ?string
    {
        return $this->codeAgence;
    }

    public function setCodeAgence(string $codeAgence): self
    {
        $this->codeAgence = $codeAgence;

        return $this;
    }

    public function getBienImmobilier(): ?PatBienImmobilier
    {
        return $this->bienImmobilier;
    }

    public function setBienImmobilier(?PatBienImmobilier $bienImmobilier): self
    {
        $this->bienImmobilier = $bienImmobilier;

        return $this;
    }

    public function getProprietaire(): ?PatProprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?PatProprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getNatureEspace(): ?PatNatureEspace
    {
        return $this->natureEspace;
    }

    public function setNatureEspace(?PatNatureEspace $natureEspace): self
    {
        $this->natureEspace = $natureEspace;

        return $this;
    }

    public function getPosition(): ?PatPosition
    {
        return $this->position;
    }

    public function setPosition(?PatPosition $position): self
    {
        $this->position = $position;

        return $this;
    }


}
