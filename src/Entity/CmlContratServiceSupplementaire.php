<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlContratServiceSupplementaire.
 *
 * @ORM\Table(name="cml_contrat_service_supplementaire", indexes={@ORM\Index(name="IDX_7B48CC73896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_7B48CC7312601DF1", columns={"service_supplmentaire_code"}), @ORM\Index(name="IDX_7B48CC73B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_7B48CC731823061F", columns={"contrat_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlContratServiceSupplementaireRepository")
 */
class CmlContratServiceSupplementaire extends BaseEntity
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
     * @ORM\Column(name="montant_mensuel", type="integer", nullable=false)
     */
    private $montantMensuel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nombre_mois", type="integer", nullable=true)
     */
    private $nombreMois;

    /**
     * @var CmlServiceSupplementaire
     *
     * @ORM\ManyToOne(targetEntity="CmlServiceSupplementaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_supplmentaire_code", referencedColumnName="code")
     * })
     */
    private $serviceSupplmentaire;

    /**
     * @var CmlContrat
     *
     * @ORM\ManyToOne(targetEntity="CmlContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrat_id", referencedColumnName="id")
     * })
     */
    private $contrat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantMensuel(): ?int
    {
        return $this->montantMensuel;
    }

    public function setMontantMensuel(int $montantMensuel): self
    {
        $this->montantMensuel = $montantMensuel;

        return $this;
    }

    public function getNombreMois(): ?int
    {
        return $this->nombreMois;
    }

    public function setNombreMois(?int $nombreMois): self
    {
        $this->nombreMois = $nombreMois;

        return $this;
    }

    public function getServiceSupplmentaire(): ?CmlServiceSupplementaire
    {
        return $this->serviceSupplmentaire;
    }

    public function setServiceSupplmentaire(?CmlServiceSupplementaire $serviceSupplmentaire): self
    {
        $this->serviceSupplmentaire = $serviceSupplmentaire;

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
}
