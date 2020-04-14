<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlContratEspace.
 *
 * @ORM\Table(name="cml_contrat_espace", indexes={@ORM\Index(name="IDX_EA9202C5896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_EA9202C5B6885C6C", columns={"espace_id"}), @ORM\Index(name="IDX_EA9202C5B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_EA9202C51823061F", columns={"contrat_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlContratEspaceRepository")
 */
class CmlContratEspace extends BaseEntity
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
     * @var int
     *
     * @ORM\Column(name="loyer_mensuel", type="integer", nullable=false)
     */
    private $loyerMensuel;

    /**
     * @var int
     *
     * @ORM\Column(name="caution", type="integer", nullable=false)
     */
    private $caution;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_mois", type="integer", nullable=false)
     */
    private $nombreMois;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var CmlContrat
     *
     * @ORM\ManyToOne(targetEntity="CmlContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrat_id", referencedColumnName="id")
     * })
     */
    private $contrat;

    /**
     * @var PatEspace
     *
     * @ORM\ManyToOne(targetEntity="PatEspace")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="espace_id", referencedColumnName="id")
     * })
     */
    private $espace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoyerMensuel(): ?int
    {
        return $this->loyerMensuel;
    }

    public function setLoyerMensuel(int $loyerMensuel): self
    {
        $this->loyerMensuel = $loyerMensuel;

        return $this;
    }

    public function getCaution(): ?int
    {
        return $this->caution;
    }

    public function setCaution(int $caution): self
    {
        $this->caution = $caution;

        return $this;
    }

    public function getNombreMois(): ?int
    {
        return $this->nombreMois;
    }

    public function setNombreMois(int $nombreMois): self
    {
        $this->nombreMois = $nombreMois;

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

    public function getContrat(): ?CmlContrat
    {
        return $this->contrat;
    }

    public function setContrat(?CmlContrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getEspace(): ?PatEspace
    {
        return $this->espace;
    }

    public function setEspace(?PatEspace $espace): self
    {
        $this->espace = $espace;

        return $this;
    }
}
