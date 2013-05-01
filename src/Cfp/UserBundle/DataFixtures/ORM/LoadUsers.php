<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\UserBundle\Entity\User;

class LoadUsers extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('user1');
        $user->setEmail('user1@example.org');
        $user->setPlainPassword('secret');
        $user->setFullName('John Doe');
        $user->setEnabled(true);
        $manager->persist($user);
        $this->addReference('user1', $user);

        $user = new User();
        $user->setUsername('user2');
        $user->setEmail('user2@example.org');
        $user->setPlainPassword('secret');
        $user->setFullName('Jane Doe');
        $user->setEnabled(true);
        $manager->persist($user);
        $this->addReference('user2', $user);

        $user = new User();
        $user->setUsername('admin1');
        $user->setEmail('admin1@example.org');
        $user->setPlainPassword('secret');
        $user->setFullName('Ima Admin');
        $user->setEnabled(true);
        $manager->persist($user);
        $this->addReference('admin1', $user);

        $manager->flush();
    }

    public function getOrder() {
          return 5;
    }
}
