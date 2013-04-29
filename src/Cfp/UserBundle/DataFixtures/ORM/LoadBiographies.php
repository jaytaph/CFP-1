<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Cfp\UserBundle\Entity\BiographyUrl;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\UserBundle\Entity\BioGraphy;

class LoadBiographies extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bio = new BioGraphy();
        $bio->setUser($this->getReference('user1'));
        $bio->setDescription('PHP Dev Bio');
        $bio->setBiography('php dev bio');
        $bio->setDtAdded(new \DateTime());
        $bio->setDtUpdated(new \DateTime());
        $manager->persist($bio);

        $bio = new BioGraphy();
        $bio->setUser($this->getReference('user1'));
        $bio->setDescription('Python Dev Bio');
        $bio->setBiography('python dev bio');
        $bio->setDtAdded(new \DateTime());
        $bio->setDtUpdated(new \DateTime());
        $manager->persist($bio);

        $bio = new BioGraphy();
        $bio->setUser($this->getReference('user1'));
        $bio->setDescription('Sysadmin Bio');
        $bio->setBiography('sysadmin bio');
        $bio->setDtAdded(new \DateTime());
        $bio->setDtUpdated(new \DateTime());
        $manager->persist($bio);

        $bioUrl = new BiographyUrl();
        $bioUrl->setName('blog');
        $bioUrl->setUrl('http://blog.example.org');
        $bioUrl->setBiography($bio);
        $manager->persist($bioUrl);

        $bioUrl = new BiographyUrl();
        $bioUrl->setName('work website');
        $bioUrl->setUrl('http://work.example.org');
        $bioUrl->setBiography($bio);
        $manager->persist($bioUrl);

        $bio = new BioGraphy();
        $bio->setUser($this->getReference('user2'));
        $bio->setDescription('Dev Bio');
        $bio->setBiography('dev bio');
        $bio->setDtAdded(new \DateTime());
        $bio->setDtUpdated(new \DateTime());
        $manager->persist($bio);

        $manager->flush();
    }

    public function getOrder() {
          return 15;
    }
}
