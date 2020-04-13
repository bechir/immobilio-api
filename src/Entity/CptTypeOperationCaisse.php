<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CptTypeOperationCaisse
 *
 * @ORM\Table(name="cpt_type_operation_caisse", indexes={@ORM\Index(name="IDX_10DAFB2AB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_10DAFB2A3BCB2E4B", columns={"nature_id"}), @ORM\Index(name="IDX_10DAFB2A896DBBDE", columns={"updated_by_id"})})
 * @ORM\Entity
 */
class CptTypeOperationCaisse extends BaseEntity
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
     * @var CptNatureOperationCaisse|null
     *
     * @ORM\ManyToOne(targetEntity="CptNatureOperationCaisse")
     * @ORM\JoinColumn(name="nature_id",referencedColumnName="id",nullable=true)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=100, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

}
