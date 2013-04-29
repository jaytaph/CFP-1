<?php

namespace Cfp\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cfp\TalkBundle\Entity\Talk;
use Cfp\TalkBundle\Entity\TalkUrl;
use Cfp\TalkBundle\Entity\Speaker;

class LoadTalks extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $talk = new Talk();
        $talk->setTitle('Puppet for Dummies');
        $talk->setAbstract('Puppet is a configuration management tool which allows easy deployment and configuration
            ranging from one to a thousand servers (and even more). Even though puppet is a common tool in the
            devops-world, it is still a strange piece of software for developers. I will tell you on why it will be
            useful to learn more about  How does it work and what can it do for you as a developer?');
        $manager->persist($talk);
        $this->addReference('talk-1', $talk);

        $talkUrl = new TalkUrl();
        $talkUrl->setName('slides');
        $talkUrl->setTalk($talk);
        $talkUrl->setUrl('http://speakerdeck.example.org/1234');
        $manager->persist($talkUrl);


        $talk = new Talk();
        $talk->setTitle('A shared talk');
        $talk->setAbstract('A shared talk with two persons');
        $manager->persist($talk);
        $this->addReference('talk-2', $talk);

        $speaker = new Speaker();
        $speaker->setTalk($this->getReference('talk-1'));
        $speaker->setUser($this->getReference('user1'));
        $speaker->setConfirmed(1);
        $manager->persist($speaker);

        $speaker = new Speaker();
        $speaker->setTalk($this->getReference('talk-2'));
        $speaker->setUser($this->getReference('user1'));
        $speaker->setConfirmed(1);
        $manager->persist($speaker);

        $speaker = new Speaker();
        $speaker->setTalk($this->getReference('talk-2'));
        $speaker->setUser($this->getReference('user2'));
        $speaker->setConfirmed(1);
        $manager->persist($speaker);

        $manager->flush();
    }

    public function getOrder() {
          return 10;
    }
}
