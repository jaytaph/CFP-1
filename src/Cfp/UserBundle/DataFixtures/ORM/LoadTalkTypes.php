<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\TalkBundle\Entity\Type;

class LoadTalkTypes extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setName('Talk');
        $manager->persist($type);
        $this->setReference('type-talk', $type);

        $type = new Type();
        $type->setName('Workshop (half day)');
        $manager->persist($type);
        $this->setReference('type-hdw', $type);

        $type = new Type();
        $type->setName('Workshop (full day)');
        $manager->persist($type);
        $this->setReference('type-fdw', $type);

        $type = new Type();
        $type->setName('Keynote');
        $manager->persist($type);
        $this->setReference('type-keynote', $type);

        $manager->flush();
    }

    public function getOrder() {
          return 5;
    }
}
