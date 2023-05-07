<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 20; $i < 60; $i++) {
            $message = new Message();
            $message->setUsername('user-'.$i);
            $message->setEmail("user-$i@mail.ua");
            $message->setHomepage('https://homepage-'.$i);
            $message->setCaptcha(mt_rand(10, 1000));
            $message->setMessage('some message text - '. mt_rand(1000, 100000000));
            $message->setLanguage('ukrainian');
            $message->setDate(new DateTime());

            $manager->persist($message);
        }

        $manager->flush();
    }
}
