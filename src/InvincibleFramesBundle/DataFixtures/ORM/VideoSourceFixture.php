<?php
/**
 * Created by PhpStorm.
 * User: Jacob
 * Date: 29/03/2016
 * Time: 18:00
 */

namespace InvincibleFramesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use InvincibleFramesBundle\Entity\VideoSource;

class VideoSourceFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default account types
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $local = new VideoSource();
        $local->setName('local');
        $local->setPath('video/');

        $manager->persist($local);
        $manager->flush();

        $youtube = new VideoSource();
        $youtube->setName('youtube');
        $youtube->setPath('http://www.youtube.com/embed/');

        $manager->persist($youtube);
        $manager->flush();

        $this->addReference('local-video', $local);
        $this->addReference('youtube-video', $youtube);
    }

    /**
     * The order in which fixtures will be loaded, the lower the number, the sooner that this fixture is loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}

