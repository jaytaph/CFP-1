<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\ConferenceBundle\Entity\Submission;

class LoadSubmissions extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $submission = new Submission();
        $submission->setConference($this->getReference('conf-1'));
        $submission->setTalk($this->getReference('talk-1'));
        $submission->setRemarks('A nice talk.');
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $submission = new Submission();
        $submission->setConference($this->getReference('conf-1'));
        $submission->setTalk($this->getReference('talk-2'));
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $submission = new Submission();
        $submission->setConference($this->getReference('conf-2'));
        $submission->setTalk($this->getReference('talk-1'));
        $submission->setDtCreated(new \DateTime());
        $manager->persist($submission);

        $manager->flush();
    }

    public function getOrder() {
          return 20;
    }
}
