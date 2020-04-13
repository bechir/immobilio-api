<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptOperationCaisse
 *
 * @ORM\Table(name="cpt_operation_caisse", indexes={@ORM\Index(name="IDX_9A7BAA815332C612", columns={"coentre_depense_code"}), @ORM\Index(name="IDX_9A7BAA8132ECC4F2", columns={"type_operation_caisse_id"}), @ORM\Index(name="IDX_9A7BAA8119EB6921", columns={"client_id"}), @ORM\Index(name="IDX_9A7BAA818E122D7C", columns={"status_operation_id"}), @ORM\Index(name="IDX_9A7BAA81B2C090B7", columns={"operation_annule_id"}), @ORM\Index(name="IDX_9A7BAA813DC877FA", columns={"sci_id"}), @ORM\Index(name="IDX_9A7BAA81896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_9A7BAA81F2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_9A7BAA814BCFA944", columns={"sous_centre_depense_code"}), @ORM\Index(name="IDX_9A7BAA81D725330D", columns={"agence_id"}), @ORM\Index(name="IDX_9A7BAA8195D9453A", columns={"journal_caisse_id"}), @ORM\Index(name="IDX_9A7BAA813BCB2E4B", columns={"nature_id"}), @ORM\Index(name="IDX_9A7BAA81B6885C6C", columns={"espace_id"}), @ORM\Index(name="IDX_9A7BAA81B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_9A7BAA815992120A", columns={"bien_immobilier_id"})})
 * @ORM\Entity
 */
class CptOperationCaisse
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
     * @var int|null
     *
     * @ORM\Column(name="created_by_id", type="integer", nullable=true)
     */
    private $createdById;

    /**
     * @var int|null
     *
     * @ORM\Column(name="updated_by_id", type="integer", nullable=true)
     */
    private $updatedById;

    /**
     * @var int|null
     *
     * @ORM\Column(name="compte_id", type="integer", nullable=true)
     */
    private $compteId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type_operation_caisse_id", type="integer", nullable=true)
     */
    private $typeOperationCaisseId;

    /**
     * @var int
     *
     * @ORM\Column(name="agence_id", type="integer", nullable=false)
     */
    private $agenceId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="client_id", type="integer", nullable=true)
     */
    private $clientId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="journal_caisse_id", type="integer", nullable=true)
     */
    private $journalCaisseId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status_operation_id", type="integer", nullable=true)
     */
    private $statusOperationId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nature_id", type="integer", nullable=true)
     */
    private $natureId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="operation_annule_id", type="integer", nullable=true)
     */
    private $operationAnnuleId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="archived", type="boolean", nullable=true, options={"comment"="Indique si l'élément est archivé"})
     */
    private $archived = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="solde_avant_operation", type="float", precision=10, scale=0, nullable=true)
     */
    private $soldeAvantOperation = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", precision=10, scale=0, nullable=false)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", length=0, nullable=false)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="beneficiaire", type="string", length=255, nullable=true)
     */
    private $beneficiaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="effectue_par", type="string", length=255, nullable=true)
     */
    private $effectuePar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remi_a", type="string", length=255, nullable=true)
     */
    private $remiA;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_facture_piece", type="string", length=255, nullable=true, options={"comment"="il va contenir le numéro de facture ou de la piece qui a provoqué l'écriture en caisse"})
     */
    private $numFacturePiece;

    /**
     * @var float|null
     *
     * @ORM\Column(name="solde_apres_operation", type="float", precision=10, scale=0, nullable=true)
     */
    private $soldeApresOperation = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=true)
     */
    private $dateOperation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="espace_id", type="integer", nullable=true)
     */
    private $espaceId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $dateFin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sci_id", type="integer", nullable=true)
     */
    private $sciId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bien_immobilier_id", type="integer", nullable=true)
     */
    private $bienImmobilierId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coentre_depense_code", type="string", length=15, nullable=true)
     */
    private $coentreDepenseCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_centre_depense_code", type="string", length=15, nullable=true)
     */
    private $sousCentreDepenseCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="moyen_paiement_code", type="string", length=10, nullable=true)
     */
    private $moyenPaiementCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_cheque_virement", type="string", length=30, nullable=true, options={"comment"="il va contenir le numéro de chèque ou reçu de versement/virement"})
     */
    private $numChequeVirement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="banque_compte_bancaire", type="string", length=30, nullable=true, options={"comment"="il va contenir le nom de la banque emettrice du chèque ou le numéro de compte bancaire qui a reçu le versement/virement"})
     */
    private $banqueCompteBancaire;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true, options={"default"="1","comment"="Indique si l'élément est actif ou non"})
     */
    private $enabled = true;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true, options={"comment"="Indique si l'élément est supprimé"})
     */
    private $deleted = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedById(): ?int
    {
        return $this->createdById;
    }

    public function setCreatedById(?int $createdById): self
    {
        $this->createdById = $createdById;

        return $this;
    }

    public function getUpdatedById(): ?int
    {
        return $this->updatedById;
    }

    public function setUpdatedById(?int $updatedById): self
    {
        $this->updatedById = $updatedById;

        return $this;
    }

    public function getCompteId(): ?int
    {
        return $this->compteId;
    }

    public function setCompteId(?int $compteId): self
    {
        $this->compteId = $compteId;

        return $this;
    }

    public function getTypeOperationCaisseId(): ?int
    {
        return $this->typeOperationCaisseId;
    }

    public function setTypeOperationCaisseId(?int $typeOperationCaisseId): self
    {
        $this->typeOperationCaisseId = $typeOperationCaisseId;

        return $this;
    }

    public function getAgenceId(): ?int
    {
        return $this->agenceId;
    }

    public function setAgenceId(int $agenceId): self
    {
        $this->agenceId = $agenceId;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getJournalCaisseId(): ?int
    {
        return $this->journalCaisseId;
    }

    public function setJournalCaisseId(?int $journalCaisseId): self
    {
        $this->journalCaisseId = $journalCaisseId;

        return $this;
    }

    public function getStatusOperationId(): ?int
    {
        return $this->statusOperationId;
    }

    public function setStatusOperationId(?int $statusOperationId): self
    {
        $this->statusOperationId = $statusOperationId;

        return $this;
    }

    public function getNatureId(): ?int
    {
        return $this->natureId;
    }

    public function setNatureId(?int $natureId): self
    {
        $this->natureId = $natureId;

        return $this;
    }

    public function getOperationAnnuleId(): ?int
    {
        return $this->operationAnnuleId;
    }

    public function setOperationAnnuleId(?int $operationAnnuleId): self
    {
        $this->operationAnnuleId = $operationAnnuleId;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(?bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getSoldeAvantOperation(): ?float
    {
        return $this->soldeAvantOperation;
    }

    public function setSoldeAvantOperation(?float $soldeAvantOperation): self
    {
        $this->soldeAvantOperation = $soldeAvantOperation;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getBeneficiaire(): ?string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?string $beneficiaire): self
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getEffectuePar(): ?string
    {
        return $this->effectuePar;
    }

    public function setEffectuePar(?string $effectuePar): self
    {
        $this->effectuePar = $effectuePar;

        return $this;
    }

    public function getRemiA(): ?string
    {
        return $this->remiA;
    }

    public function setRemiA(?string $remiA): self
    {
        $this->remiA = $remiA;

        return $this;
    }

    public function getNumFacturePiece(): ?string
    {
        return $this->numFacturePiece;
    }

    public function setNumFacturePiece(?string $numFacturePiece): self
    {
        $this->numFacturePiece = $numFacturePiece;

        return $this;
    }

    public function getSoldeApresOperation(): ?float
    {
        return $this->soldeApresOperation;
    }

    public function setSoldeApresOperation(?float $soldeApresOperation): self
    {
        $this->soldeApresOperation = $soldeApresOperation;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(?\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getEspaceId(): ?int
    {
        return $this->espaceId;
    }

    public function setEspaceId(?int $espaceId): self
    {
        $this->espaceId = $espaceId;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getSciId(): ?int
    {
        return $this->sciId;
    }

    public function setSciId(?int $sciId): self
    {
        $this->sciId = $sciId;

        return $this;
    }

    public function getBienImmobilierId(): ?int
    {
        return $this->bienImmobilierId;
    }

    public function setBienImmobilierId(?int $bienImmobilierId): self
    {
        $this->bienImmobilierId = $bienImmobilierId;

        return $this;
    }

    public function getCoentreDepenseCode(): ?string
    {
        return $this->coentreDepenseCode;
    }

    public function setCoentreDepenseCode(?string $coentreDepenseCode): self
    {
        $this->coentreDepenseCode = $coentreDepenseCode;

        return $this;
    }

    public function getSousCentreDepenseCode(): ?string
    {
        return $this->sousCentreDepenseCode;
    }

    public function setSousCentreDepenseCode(?string $sousCentreDepenseCode): self
    {
        $this->sousCentreDepenseCode = $sousCentreDepenseCode;

        return $this;
    }

    public function getMoyenPaiementCode(): ?string
    {
        return $this->moyenPaiementCode;
    }

    public function setMoyenPaiementCode(?string $moyenPaiementCode): self
    {
        $this->moyenPaiementCode = $moyenPaiementCode;

        return $this;
    }

    public function getNumChequeVirement(): ?string
    {
        return $this->numChequeVirement;
    }

    public function setNumChequeVirement(?string $numChequeVirement): self
    {
        $this->numChequeVirement = $numChequeVirement;

        return $this;
    }

    public function getBanqueCompteBancaire(): ?string
    {
        return $this->banqueCompteBancaire;
    }

    public function setBanqueCompteBancaire(?string $banqueCompteBancaire): self
    {
        $this->banqueCompteBancaire = $banqueCompteBancaire;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;

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


}
