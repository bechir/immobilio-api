<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUserFosGroup.
 *
 * @ORM\Table(name="fos_user_fos_group", indexes={@ORM\Index(name="IDX_8D2E96FFA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_8D2E96FFFE54D947", columns={"group_id"})})
 *@ORM\Entity(repositoryClass="App\Repository\FosUserFosGroupRepository")
 */
class FosUserFosGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $groupId;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }
}
