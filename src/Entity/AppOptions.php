<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppOptions
 *
 * @ORM\Table(name="app_options", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_3D687ACAB62DD4E5", columns={"option_name"})}, indexes={@ORM\Index(name="IDX_3D687ACAB03A8386", columns={"created_by_id"}), @ORM\Index(name="IDX_3D687ACA896DBBDE", columns={"updated_by_id"})})
 * @ORM\Entity
 */
class AppOptions extends BaseEntity
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
     * @ORM\Column(name="option_name", type="string", length=255, nullable=false)
     */
    private $optionName;

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="string", length=255, nullable=false)
     */
    private $optionValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionName(): ?string
    {
        return $this->optionName;
    }

    public function setOptionName(string $optionName): self
    {
        $this->optionName = $optionName;

        return $this;
    }

    public function getOptionValue(): ?string
    {
        return $this->optionValue;
    }

    public function setOptionValue(string $optionValue): self
    {
        $this->optionValue = $optionValue;

        return $this;
    }


}
