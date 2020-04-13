<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppPays
 *
 * @ORM\Table(name="app_pays")
 * @ORM\Entity
 */
class AppPays
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
     * @var string|null
     *
     * @ORM\Column(name="alpha2", type="string", length=2, nullable=true)
     */
    private $alpha2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alpha3", type="string", length=3, nullable=true)
     */
    private $alpha3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fr_fr", type="string", length=255, nullable=false)
     */
    private $nomFrFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_en_gb", type="string", length=255, nullable=false)
     */
    private $nomEnGb;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tva", type="float", precision=10, scale=0, nullable=true)
     */
    private $tva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlpha2(): ?string
    {
        return $this->alpha2;
    }

    public function setAlpha2(?string $alpha2): self
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    public function getAlpha3(): ?string
    {
        return $this->alpha3;
    }

    public function setAlpha3(?string $alpha3): self
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    public function getNomFrFr(): ?string
    {
        return $this->nomFrFr;
    }

    public function setNomFrFr(string $nomFrFr): self
    {
        $this->nomFrFr = $nomFrFr;

        return $this;
    }

    public function getNomEnGb(): ?string
    {
        return $this->nomEnGb;
    }

    public function setNomEnGb(string $nomEnGb): self
    {
        $this->nomEnGb = $nomEnGb;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }


}
