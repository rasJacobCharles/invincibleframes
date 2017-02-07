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
use InvincibleFramesBundle\Entity\VideoType;

class VideoTypeFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default account types
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $showreel = new VideoType();
        $showreel->setName(VideoType::VIDEO_SHOWREEL);

        $manager->persist($showreel);
        $manager->flush();

        $project = new VideoType();
        $project->setName(VideoType::VIDEO_PROJECT);

        $manager->persist($project);
        $manager->flush();

        $this->addReference('video-showreel', $showreel);
        $this->addReference('video-project', $project);
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

