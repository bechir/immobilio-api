<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptCompteSoldeMensuel.
 *
 * @ORM\Table(name="cpt_compte_solde_mensuel", indexes={@ORM\Index(name="IDX_14A844DAB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_14A844DAF2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_14A844DA896DBBDE", columns={"updated_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CptCompteSoldeMensuelRepository")
 */
class CptCompteSoldeMensuel extends BaseEntity
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
     * @ORM\Column(name="date_solde", type="datetime", nullable=false)
     */
    private $dateSolde;

    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float", precision=10, scale=0, nullable=false)
     */
    private $solde;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSolde(): ?\DateTimeInterface
    {
        return $this->dateSolde;
    }

    public function setDateSolde(\DateTimeInterface $dateSolde): self
    {
        $this->dateSolde = $dateSolde;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

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
