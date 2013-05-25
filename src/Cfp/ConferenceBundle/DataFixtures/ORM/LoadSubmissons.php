<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Cfp\ConferenceBundle\Entity\Application;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\ConferenceBundle\Entity\Submission;

class LoadSubmissions extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $application = new Application();
        $application->setConference($this->getReference('conf-1'));
        $application->setDtCreated(new \DateTime());
        $application->setBiography($this->getReference('bio-1'));
        $manager->persist($application);
        $this->addReference('app-1', $application);

        $application = new Application();
        $application->setConference($this->getReference('conf-1'));
        $application->setDtCreated(new \DateTime());
        $application->setBiography($this->getReference('bio-2'));
        $manager->persist($application);
        $this->addReference('app-2', $application);

        $application = new Application();
        $application->setConference($this->getReference('conf-2'));
        $application->setDtCreated(new \DateTime());
        $application->setBiography($this->getReference('bio-1'));
        $manager->persist($application);
        $this->addReference('app-3', $application);

        $submission = new Submission();
        $submission->setApplication($this->getReference('app-1'));
        $submission->setTalk($this->getReference('talk-1'));
        $submission->setRemarks('This can be changed into a workshop as well');
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $submission = new Submission();
        $submission->setApplication($this->getReference('app-3'));
        $submission->setTalk($this->getReference('talk-1'));
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $submission = new Submission();
        $submission->setApplication($this->getReference('app-2'));
        $submission->setTalk($this->getReference('talk-2'));
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $submission = new Submission();
        $submission->setApplication($this->getReference('app-2'));
        $submission->setTalk($this->getReference('talk-2'));
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $manager->flush();
    }

    public function getOrder() {
          return 20;
    }
}
