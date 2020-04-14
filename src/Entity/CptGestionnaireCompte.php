<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptGestionnaireCompte
 *
 * @ORM\Table(name="cpt_gestionnaire_compte", indexes={@ORM\Index(name="IDX_EF0F6DA96885AC1B", columns={"gestionnaire_id"}), @ORM\Index(name="IDX_EF0F6DA9896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_EF0F6DA9F2C56620", columns={"compte_id"}), @ORM\Index(name="IDX_EF0F6DA9B03A8386", columns={"created_by_id"})})
 * @ORM\Entity
 */
class CptGestionnaireCompte extends BaseEntity
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
     * @var int
     *
     * @ORM\Column(name="gestionnaire_id", type="integer", nullable=false)
     */
    private $gestionnaireId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actived", type="boolean", nullable=true, options={"default"="1"})
     */
    private $actived = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGestionnaireId(): ?int
    {
        return $this->gestionnaireId;
    }

    public function setGestionnaireId(int $gestionnaireId): self
    {
        $this->gestionnaireId = $gestionnaireId;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
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

    public function getActived(): ?bool
    {
        return $this->actived;
    }

    public function setActived(?bool $actived): self
    {
        $this->actived = $actived;

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
