<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlFacture
 *
 * @ORM\Table(name="cml_facture", indexes={@ORM\Index(name="IDX_D313E6A1896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_D313E6A11823061F", columns={"contrat_id"}), @ORM\Index(name="IDX_D313E6A1B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_D313E6A16BF700BD", columns={"status_id"}), @ORM\Index(name="IDX_D313E6A119EB6921", columns={"client_id"})})
 * @ORM\Entity
 */
class CmlFacture extends BaseEntity
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
     * @ORM\Column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=0, nullable=true)
     */
    private $note;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montant_total_net", type="integer", nullable=true)
     */
    private $montantTotalNet;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_facture", type="date", nullable=true)
     */
    private $dateFacture;

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_limite", type="date", nullable=true, options={"comment"="A payer avant la date"})
     */
    private $dateLimite;

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
     * @var CmlClient
     *
     * @ORM\ManyToOne(targetEntity="CmlClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var CmlStatusFacture
     *
     * @ORM\ManyToOne(targetEntity="CmlStatusFacture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="code")
     * })
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getMontantTotalNet(): ?int
    {
        return $this->montantTotalNet;
    }

    public function setMontantTotalNet(?int $montantTotalNet): self
    {
        $this->montantTotalNet = $montantTotalNet;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(?\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

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

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(?\DateTimeInterface $dateLimite): self
    {
        $this->dateLimite = $dateLimite;

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

    public function getClient(): ?CmlClient
    {
        return $this->client;
    }

    public function setClient(?CmlClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getStatus(): ?CmlStatusFacture
    {
        return $this->status;
    }

    public function setStatus(?CmlStatusFacture $status): self
    {
        $this->status = $status;

        return $this;
    }
}
