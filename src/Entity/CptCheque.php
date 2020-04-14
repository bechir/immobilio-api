<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptCheque
 *
 * @ORM\Table(name="cpt_cheque", indexes={@ORM\Index(name="IDX_C5074EAE37E080D9", columns={"banque_id"}), @ORM\Index(name="IDX_C5074EAE182EF3BE", columns={"status_cheque_code"}), @ORM\Index(name="IDX_C5074EAE896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_C5074EAE19EB6921", columns={"client_id"}), @ORM\Index(name="IDX_C5074EAED725330D", columns={"agence_id"}), @ORM\Index(name="IDX_C5074EAEB03A8386", columns={"created_by_id"})})
 * @ORM\Entity
 */
class CptCheque extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var CmlClient|null
     *
     * @ORM\ManyToOne(targetEntity="CmlClient")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=true)
     */
    private $client;

    /**
     * @var CptBanque|null
     *
     * @ORM\ManyToOne(targetEntity="CptBanque")
     * @ORM\JoinColumn(name="banque_id", referencedColumnName="id", nullable=true)
     */
    private $banque;

    /**
     * @var AppAgence
     *
     * @ORM\ManyToOne(targetEntity="AppAgence")
     * @ORM\JoinColumn(name="agence_id", referencedColumnName="id", nullable=true)
     */
    private $agence;

    /**
     * @var CptStatusCheque|null
     *
     * @ORM\ManyToOne(targetEntity="CptStatusCheque")
     * @ORM\JoinColumn(name="status_cheque_code", referencedColumnName="code", nullable=true)
     */
    private $statusCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="num_cheque", type="string", length=100, nullable=false)
     */
    private $numCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_cheque", type="date", nullable=true)
     */
    private $dateCheque;

    /**
     * @var float|null
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=true)
     */
    private $montant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remis_a", type="string", length=255, nullable=true)
     */
    private $remisA;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_banque", type="string", length=255, nullable=false)
     */
    private $nomBanque;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNumCheque(): ?string
    {
        return $this->numCheque;
    }

    public function setNumCheque(string $numCheque): self
    {
        $this->numCheque = $numCheque;

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

    public function getDateCheque(): ?\DateTimeInterface
    {
        return $this->dateCheque;
    }

    public function setDateCheque(?\DateTimeInterface $dateCheque): self
    {
        $this->dateCheque = $dateCheque;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getRemisA(): ?string
    {
        return $this->remisA;
    }

    public function setRemisA(?string $remisA): self
    {
        $this->remisA = $remisA;

        return $this;
    }

    public function getNomBanque(): ?string
    {
        return $this->nomBanque;
    }

    public function setNomBanque(string $nomBanque): self
    {
        $this->nomBanque = $nomBanque;

        return $this;
    }

    public function getClient(): ?CmlClient
    {
        return $this->client;
    }

    public function setClient(?CmlClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getBanque(): ?CptBanque
    {
        return $this->banque;
    }

    public function setBanque(?CptBanque $banque): self
    {
        $this->banque = $banque;

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

    public function getStatusCheque(): ?CptStatusCheque
    {
        return $this->statusCheque;
    }

    public function setStatusCheque(?CptStatusCheque $statusCheque): self
    {
        $this->statusCheque = $statusCheque;

        return $this;
    }
}
