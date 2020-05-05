<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlContratServiceDomestique.
 *
 * @ORM\Table(name="cml_contrat_service_domestique", indexes={@ORM\Index(name="IDX_543B68D0896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_543B68D01CD4A87E", columns={"service_domestique_code"}), @ORM\Index(name="IDX_543B68D0B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_543B68D01823061F", columns={"contrat_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlContratServiceDomestiqueRepository")
 */
class CmlContratServiceDomestique extends BaseEntity
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
     * @var CmlContrat
     *
     * @ORM\ManyToOne(targetEntity="CmlContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrat_id", referencedColumnName="id")
     * })
     */
    private $contrat;

    /**
     * @var CmlServiceDomestique
     *
     * @ORM\ManyToOne(targetEntity="CmlServiceDomestique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_domestique_code", referencedColumnName="code")
     * })
     */
    private $serviceDomestique;

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

    public function getContrat(): ?CmlContrat
    {
        return $this->contrat;
    }

    public function setContrat(?CmlContrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getServiceDomestique(): ?CmlServiceDomestique
    {
        return $this->serviceDomestique;
    }

    public function setServiceDomestique(?CmlServiceDomestique $serviceDomestique): self
    {
        $this->serviceDomestique = $serviceDomestique;

        return $this;
    }
}
