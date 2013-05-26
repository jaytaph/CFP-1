<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\ConferenceBundle\Entity\Conference;
use Cfp\ConferenceBundle\Entity\ConferenceUrl;
use Cfp\ConferenceBundle\Entity\ConferenceAdmin;

class LoadConferences extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $conference = new Conference();
        $conference->setName('PHPBenelux 2012');
        $conference->setDescription('The PHPBenelux conference');
        $conference->setDtCreated(new \DateTime());
        $conference->setCfpStart(new \DateTime("2012-08-01 00:00:00"));
        $conference->setCfpEnd(new \DateTime("2012-08-31 23:59:59"));
        $conference->setDtStart(new \DateTime("2012-01-27 00:00:00"));
        $conference->setDtEnd(new \DateTime("2012-01-28 00:00:00"));
        $conference->setGeoLong(0);
        $conference->setGeoLat(0);
        $manager->persist($conference);
        $this->addReference('conf-1', $conference);

        $conferenceUrl = new ConferenceUrl();
        $conferenceUrl->setName("website");
        $conferenceUrl->setUrl("http://conference.phpbenelux.eu");
        $conferenceUrl->setConference($this->getReference('conf-1'));
        $manager->persist($conferenceUrl);

        $conference = new Conference();
        $conference->setName('PFCongres 2012');
        $conference->setDescription('PHPFreaks conference');
        $conference->setDtCreated(new \DateTime());
        $conference->setCfpStart(new \DateTime("2012-04-01 00:00:00"));
        $conference->setCfpEnd(new \DateTime("2012-04-31 23:59:59"));
        $conference->setDtStart(new \DateTime("2012-09-12 09:00:00"));
        $conference->setDtEnd(new \DateTime("2012-09-12 17:00:00"));
        $conference->setGeoLong(0);
        $conference->setGeoLat(0);
        $manager->persist($conference);
        $this->addReference('conf-2', $conference);

        $conferenceUrl = new ConferenceUrl();
        $conferenceUrl->setName("website");
        $conferenceUrl->setUrl("http://pfcongres.nl");
        $conferenceUrl->setConference($this->getReference('conf-2'));
        $manager->persist($conferenceUrl);

        $conferenceAdmin = new ConferenceAdmin();
        $conferenceAdmin->setConference($this->getReference('conf-1'));
        $conferenceAdmin->setUser($this->getReference('admin1'));
        $manager->persist($conferenceAdmin);


        // Open CFP
        $conference = new Conference();
        $conference->setName('PHPBenelux 2013');
        $conference->setDescription('The PHPBenelux conference');
        $conference->setDtCreated(new \DateTime());
        $conference->setCfpStart(new \DateTime("@".strtotime("-1 week")));
        $conference->setCfpEnd(new \DateTime("@".strtotime("+1 week")));
        $conference->setDtStart(new \DateTime("2012-01-27 00:00:00"));
        $conference->setDtEnd(new \DateTime("2012-01-28 00:00:00"));
        $conference->setGeoLong(0);
        $conference->setGeoLat(0);
        $manager->persist($conference);
        $this->addReference('conf-3', $conference);

        $manager->flush();
    }

    public function getOrder() {
          return 10;
    }
}
