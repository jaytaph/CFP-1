<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\TalkBundle\Entity\Type;

class LoadTypes extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setName("Standard talk");
        $manager->persist($type);
        $this->addReference("talk-type-talk", $type);

        $type = new Type();
        $type->setName("Keynote");
        $manager->persist($type);
        $this->addReference("talk-type-keynote", $type);

        $type = new Type();
        $type->setName("Hands-on / live demo");
        $manager->persist($type);
        $this->addReference("talk-type-handson", $type);

        $type = new Type();
        $type->setName("Workshop 3 hrs");
        $manager->persist($type);
        $this->addReference("talk-type-workshop-3hrs", $type);

        $type = new Type();
        $type->setName("Workshop half day");
        $manager->persist($type);
        $this->addReference("talk-type-workshop-half", $type);

        $type = new Type();
        $type->setName("Workshop full day");
        $manager->persist($type);
        $this->addReference("talk-type-workshop-full", $type);

        $manager->flush();
    }

    public function getOrder() {
          return 5;
    }
}
