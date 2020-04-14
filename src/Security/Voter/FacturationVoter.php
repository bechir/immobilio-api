<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class FacturationVoter extends Voter
{
    const VIEW = 'view';

    protected function supports($attribute, $subject)
    {
        return in_array($attribute, [self::VIEW])
            && $subject instanceof UserInterface;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($subject);
        }

        throw new \LogicException('This code should not be reached!');
    }

    public function canView($subject)
    {
        // TO DO
        return $subject->hasRole('ROLE_ADMIN') || $subject->hasRole('ROLE_SUPER_ADMIN');
    }
}
