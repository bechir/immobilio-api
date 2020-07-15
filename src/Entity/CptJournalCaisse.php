<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptJournalCaisse.
 *
 * @ORM\Table(name="cpt_journal_caisse", indexes={@ORM\Index(name="IDX_67E4F4D7B03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_67E4F4D7F2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_67E4F4D7896DBBDE", columns={"updated_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptJournalCaisseRepository")
 */
class CptJournalCaisse extends BaseEntity
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
     * @var CptCompte
     *
     * @ORM\ManyToOne(targetEntity="CptCompte")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id", nullable=false)
     */
    private $compte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_journal", type="date", nullable=false)
     */
    private $dateJournal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateJournal(): ?\DateTimeInterface
    {
        return $this->dateJournal;
    }

    public function setDateJournal(\DateTimeInterface $dateJournal): self
    {
        $this->dateJournal = $dateJournal;

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
}
