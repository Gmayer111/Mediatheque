<?php

namespace App\Security;

use App\Entity\Borrower as AppBorrower;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
            if (!$user instanceof AppBorrower) {
            return;
        }

        //if ($user->isDeleted()) {
        //    // the message passed to this exception is meant to be displayed to the user
        //    throw new CustomUserMessageAccountStatusException('Your user account no longer exists.');
        //}
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof AppBorrower) {
        return;
    }

        // user account is expired, the user may be notified
        //if ($user->isExpired()) {
        //    throw new AccountExpiredException('...');
        //}
    }
}