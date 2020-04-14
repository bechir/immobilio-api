<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\DataFixtures;

use App\Entity\FosUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as [$displayName, $username, $email, $password, $roles]) {
            $user = (new FosUser())
                ->setUsername($username)
                ->setUsernameCanonical($username)
                ->setDisplayName($displayName)
                ->setEmail($email)
                ->setEmailCanonical($email)
                ->setFirstLogin(true)
                ->setEnabled(true)
                ->setRoles($roles);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getData(): array
    {
        return [
            // Displayname      Username    Email                   Password        Roles
            ['KuTiWa',          'kutiwa',   'contact@kutiwa.com',   '12345678',     ['ROLE_SUPER_ADMIN']],
            ['Bechir Ba',       'bechir',   'bechir@email.com',     '123456',       ['ROLE_CUSTOMER']],
        ];
    }
}
