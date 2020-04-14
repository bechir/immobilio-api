<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptSousCentreDepense
 *
 * @ORM\Table(name="cpt_sous_centre_depense", indexes={@ORM\Index(name="IDX_A08FDA31896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_A08FDA31B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_A08FDA31E68B3940", columns={"centre_depense_code"})})
 * @ORM\Entity
 */
class CptSousCentreDepense extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=15, nullable=false)
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
     * @var CptCentreDepense|null
     *
     * @ORM\ManyToOne(targetEntity="CptCentreDepense")
     * @ORM\JoinColumn(name="centre_depense_code", referencedColumnName="code", nullable=true)
     */
    private $centreDepense;

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

    public function getCentreDepense(): ?CptCentreDepense
    {
        return $this->centreDepense;
    }

    public function setCentreDepense(?CptCentreDepense $centreDepense): self
    {
        $this->centreDepense = $centreDepense;

        return $this;
    }

}
