<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptOperationCaisse.
 *
 * @ORM\Table(name="cpt_operation_caisse", indexes={@ORM\Index(name="IDX_9A7BAA815332C612", columns={"coentre_depense_code"}), @ORM\Index(name="IDX_9A7BAA8132ECC4F2", columns={"type_operation_caisse_id"}), @ORM\Index(name="IDX_9A7BAA8119EB6921", columns={"client_id"}), @ORM\Index(name="IDX_9A7BAA818E122D7C", columns={"status_operation_id"}), @ORM\Index(name="IDX_9A7BAA81B2C090B7", columns={"operation_annule_id"}), @ORM\Index(name="IDX_9A7BAA813DC877FA", columns={"sci_id"}), @ORM\Index(name="IDX_9A7BAA81896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_9A7BAA81F2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_9A7BAA814BCFA944", columns={"sous_centre_depense_code"}), @ORM\Index(name="IDX_9A7BAA81D725330D", columns={"agence_id"}), @ORM\Index(name="IDX_9A7BAA8195D9453A", columns={"journal_caisse_id"}), @ORM\Index(name="IDX_9A7BAA813BCB2E4B", columns={"nature_id"}), @ORM\Index(name="IDX_9A7BAA81B6885C6C", columns={"espace_id"}), @ORM\Index(name="IDX_9A7BAA81B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_9A7BAA815992120A", columns={"bien_immobilier_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CptOperationCaisseRepository")
 */
class CptOperationCaisse extends BaseEntity
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
     * @var CptCompte|null
     *
     * @ORM\ManyToOne(targetEntity="CptCompte")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id", nullable=true)
     */
    private $compte;

    /**
     * @var CptTypeOperationCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptTypeOperationCaisse")
     * @ORM\JoinColumn(name="type_operation_caisse_id", referencedColumnName="id", nullable=true)
     */
    private $typeOperationCaisse;

    /**
     * @var AppAgence
     *
     * @ORM\ManyToOne(targetEntity="AppAgence")
     * @ORM\JoinColumn(name="agence_id", referencedColumnName="id", nullable=false)
     */
    private $agence;

    /**
     * @var CmlClient|null
     *
     * @ORM\ManyToOne(targetEntity="CmlClient")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=true)
     */
    private $client;

    /**
     * @var CptJournalCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptJournalCaisse")
     * @ORM\JoinColumn(name="journal_caisse_id", referencedColumnName="id", nullable=true)
     */
    private $journalCaisse;

    /**
     * @var CptStatusOperationCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptStatusOperationCaisse")
     * @ORM\JoinColumn(name="status_operation_id", referencedColumnName="id", nullable=true)
     */
    private $statusOperation;

    /**
     * @var CptNatureOperationCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptNatureOperationCaisse")
     * @ORM\JoinColumn(name="nature_id", referencedColumnName="id", nullable=true)
     */
    private $nature;

    /**
     * @var CptOperationCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptOperationCaisse")
     * @ORM\JoinColumn(name="operation_annule_id", referencedColumnName="id", nullable=true)
     */
    private $operationAnnule;

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
     * @var PatEspace|null
     *
     * @ORM\ManyToOne(targetEntity="PatEspace")
     * @ORM\JoinColumn(name="espace_id", referencedColumnName="id", nullable=true)
     */
    private $espace;

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
     * @var PatSci|null
     *
     * @ORM\ManyToOne(targetEntity="PatSci")
     * @ORM\JoinColumn(name="sci_id", referencedColumnName="id", nullable=true)
     */
    private $sci;

    /**
     * @var PatBienImmobilier|null
     *
     * @ORM\ManyToOne(targetEntity="PatBienImmobilier")
     * @ORM\JoinColumn(name="bien_immobilier_id", referencedColumnName="id", nullable=true)
     */
    private $bienImmobilier;

    /**
     * @var CptCentreDepense|null
     *
     * @ORM\ManyToOne(targetEntity="CptCentreDepense")
     * @ORM\JoinColumn(name="coentre_depense_code", referencedColumnName="code", nullable=true)
     */
    private $centreDepense;

    /**
     * @var CptSousCentreDepense|null
     *
     * @ORM\ManyToOne(targetEntity="CptSousCentreDepense")
     * @ORM\JoinColumn(name="sous_centre_depense_code", referencedColumnName="code", nullable=true)
     */
    private $sousCentreDepense;

    /**
     * @var CptMoyenPaiement|null
     *
     * @ORM\ManyToOne(targetEntity="CptMoyenPaiement")
     * @ORM\JoinColumn(name="moyen_paiement_code", referencedColumnName="code", nullable=true)
     */
    private $moyenPaiement;

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
     * @var string
     *
     * @ORM\Column(name="code_agence", type="string", length=10, nullable=false, options={"default"="DLA01"})
     */
    private $codeAgence = 'DLA01';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCodeAgence(): ?string
    {
        return $this->codeAgence;
    }

    public function setCodeAgence(string $codeAgence): self
    {
        $this->codeAgence = $codeAgence;

        return $this;
    }

    public function getCompte(): ?CptCompte
    {
        return $this->compte;
    }

    public function setCompte(?CptCompte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getTypeOperationCaisse(): ?CptTypeOperationCaisse
    {
        return $this->typeOperationCaisse;
    }

    public function setTypeOperationCaisse(?CptTypeOperationCaisse $typeOperationCaisse): self
    {
        $this->typeOperationCaisse = $typeOperationCaisse;

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

    public function getClient(): ?CmlClient
    {
        return $this->client;
    }

    public function setClient(?CmlClient $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getJournalCaisse(): ?CptJournalCaisse
    {
        return $this->journalCaisse;
    }

    public function setJournalCaisse(?CptJournalCaisse $journalCaisse): self
    {
        $this->journalCaisse = $journalCaisse;

        return $this;
    }

    public function getStatusOperation(): ?CptStatusOperationCaisse
    {
        return $this->statusOperation;
    }

    public function setStatusOperation(?CptStatusOperationCaisse $statusOperation): self
    {
        $this->statusOperation = $statusOperation;

        return $this;
    }

    public function getNature(): ?CptNatureOperationCaisse
    {
        return $this->nature;
    }

    public function setNature(?CptNatureOperationCaisse $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getOperationAnnule(): ?self
    {
        return $this->operationAnnule;
    }

    public function setOperationAnnule(?self $operationAnnule): self
    {
        $this->operationAnnule = $operationAnnule;

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

    public function getSci(): ?PatSci
    {
        return $this->sci;
    }

    public function setSci(?PatSci $sci): self
    {
        $this->sci = $sci;

        return $this;
    }

    public function getBienImmobilier(): ?PatBienImmobilier
    {
        return $this->bienImmobilier;
    }

    public function setBienImmobilier(?PatBienImmobilier $bienImmobilier): self
    {
        $this->bienImmobilier = $bienImmobilier;

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

    public function getSousCentreDepense(): ?CptSousCentreDepense
    {
        return $this->sousCentreDepense;
    }

    public function setSousCentreDepense(?CptSousCentreDepense $sousCentreDepense): self
    {
        $this->sousCentreDepense = $sousCentreDepense;

        return $this;
    }

    public function getMoyenPaiement(): ?CptMoyenPaiement
    {
        return $this->moyenPaiement;
    }

    public function setMoyenPaiement(?CptMoyenPaiement $moyenPaiement): self
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }
}
