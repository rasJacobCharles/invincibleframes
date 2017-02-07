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
use InvincibleFramesBundle\Entity\FontAwesomeIcon;

class FontAwesomeIconFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default account types
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $values = [
            'Facebook' => 'fa fa-facebook-official',
            'Twitter' => 'fa fa-twitter',
            'YouTube' => 'fa fa-youtube',
            'Pinterest' => 'fa fa-pinterest-p',
            'Flickr' => 'fa fa-flickr',
            'Vimeo' => 'fa fa-vimeo-square',
            'Tumblr' => 'fa fa-tumblr',
            'Google Plus' => 'fa fa-google-plus',

        ];

        foreach ($values as $name => $icon) {
        $icon = new FontAwesomeIcon();
        $icon->setName('local');
        $icon->setIcon('');

        $manager->persist($icon);
        $manager->flush();

        $this->addReference('icon-'.str_replace(' ','-', strtolower($name)), $icon);
        }
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

