<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlFactureServiceDomestique.
 *
 * @ORM\Table(name="cml_facture_service_domestique", indexes={@ORM\Index(name="IDX_34CE5E621CD4A87E", columns={"service_domestique_code"}), @ORM\Index(name="IDX_34CE5E62896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_34CE5E62B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_34CE5E627F2DEE08", columns={"facture_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CmlFactureServiceDomestiqueRepository")
 */
class CmlFactureServiceDomestique extends BaseEntity
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
     * @var CmlServiceDomestique
     *
     * @ORM\ManyToOne(targetEntity="CmlServiceDomestique")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_domestique_code", referencedColumnName="code")
     * })
     */
    private $serviceDomestique;

    /**
     * @var CmlFacture
     *
     * @ORM\ManyToOne(targetEntity="CmlFacture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="facture_id", referencedColumnName="id")
     * })
     */
    private $facture;

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

    public function getServiceDomestique(): ?CmlServiceDomestique
    {
        return $this->serviceDomestique;
    }

    public function setServiceDomestique(?CmlServiceDomestique $serviceDomestique): self
    {
        $this->serviceDomestique = $serviceDomestique;

        return $this;
    }

    public function getFacture(): ?CmlFacture
    {
        return $this->facture;
    }

    public function setFacture(?CmlFacture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}
