<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmlTypeClient.
 *
 * @ORM\Table(name="cml_type_client", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_EA05AB56A4D60759", columns={"libelle"}), @ORM\UniqueConstraint(name="UNIQ_EA05AB5677153098", columns={"code"})}, indexes={@ORM\Index(name="IDX_EA05AB56896DBBDE", columns={"updated_by_id"}), @ORM\Index(name="IDX_EA05AB56B03A8386", columns={"created_by_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\CmlTypeClientRepository")
 */
class CmlTypeClient extends BaseEntity
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
     * @ORM\Column(name="code", type="string", length=20, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
}
