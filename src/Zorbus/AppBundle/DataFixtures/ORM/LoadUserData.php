<?php

namespace Zorbus\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zorbus\AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('1234567');
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->setEnabled(true);
        $userAdmin->setRoles([
            'ROLE_SUPER_ADMIN',
        ]);

        $manager->persist($userAdmin);

        $user = new User();
        $user->setUsername('user');
        $user->setPlainPassword('1234567');
        $user->setEmail('user@example.com');
        $user->setEnabled(true);
        $user->setRoles([
            'ROLE_USER',
        ]);

        $manager->persist($user);
        $manager->flush();
    }
}
