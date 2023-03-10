<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $message1 = new Message();
        $message1->setConversation($this->getReference(ConversationFixtures::CONVERSATION_1));
        $message1->setUser($this->getReference(UserFixtures::USER_THOMAS));
        $message1->setContent("Hello Jean !");
        $manager->persist($message1);

        $message2 = new Message();
        $message2->setConversation($this->getReference(ConversationFixtures::CONVERSATION_1));
        $message2->setUser($this->getReference(UserFixtures::USER_JEAN));
        $message2->setContent("Hello Thomas !");
        $manager->persist($message2);

        $message3 = new Message();
        $message3->setConversation($this->getReference(ConversationFixtures::CONVERSATION_2));
        $message3->setUser($this->getReference(UserFixtures::USER_THOMAS));
        $message3->setContent("Hello Simone !");
        $manager->persist($message3);

        $message4 = new Message();
        $message4->setConversation($this->getReference(ConversationFixtures::CONVERSATION_2));
        $message4->setUser($this->getReference(UserFixtures::USER_SIMONE));
        $message4->setContent("Hello Thomas !");
        $manager->persist($message4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            UserFixtures::class,
            ConversationFixtures::class,
        ];
    }
}
