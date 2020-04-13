<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlFactureServiceSupplementaire
 *
 * @ORM\Table(name="cml_facture_service_supplementaire", indexes={@ORM\Index(name="IDX_C8ACA7E0896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_C8ACA7E012601DF1", columns={"service_supplmentaire_code"}), @ORM\Index(name="IDX_C8ACA7E0B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_C8ACA7E07F2DEE08", columns={"facture_id"})})
 * @ORM\Entity
 */
class CmlFactureServiceSupplementaire extends BaseEntity
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

    public function getServiceSupplmentaire(): ?CmlServiceSupplementaire
    {
        return $this->serviceSupplmentaire;
    }

    public function setServiceSupplmentaire(?CmlServiceSupplementaire $serviceSupplmentaire): self
    {
        $this->serviceSupplmentaire = $serviceSupplmentaire;

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
