<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppVille.
 *
 * @ORM\Table(name="app_ville", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9510540E6C6E55B5", columns={"nom"}), @ORM\UniqueConstraint(name="UNIQ_9510540E77153098", columns={"code"})}, indexes={@ORM\Index(name="IDX_9510540E98260155", columns={"region_id"}), @ORM\Index(name="IDX_9510540E896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_9510540EA6E44244", columns={"pays_id"}), @ORM\Index(name="IDX_9510540EB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_9510540E9500069D", columns={"ville_parent_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppVilleRepository")
 */
class AppVille extends BaseEntity
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
     * @ORM\Column(name="code", type="string", length=50, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var AppVille
     *
     * @ORM\ManyToOne(targetEntity="AppVille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_parent_id", referencedColumnName="id")
     * })
     */
    private $villeParent;

    /**
     * @var AppRegion
     *
     * @ORM\ManyToOne(targetEntity="AppRegion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;

    /**
     * @var AppPays
     *
     * @ORM\ManyToOne(targetEntity="AppPays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     * })
     */
    private $pays;

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

    public function getVilleParent(): ?self
    {
        return $this->villeParent;
    }

    public function setVilleParent(?self $villeParent): self
    {
        $this->villeParent = $villeParent;

        return $this;
    }

    public function getRegion(): ?AppRegion
    {
        return $this->region;
    }

    public function setRegion(?AppRegion $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPays(): ?AppPays
    {
        return $this->pays;
    }

    public function setPays(?AppPays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
