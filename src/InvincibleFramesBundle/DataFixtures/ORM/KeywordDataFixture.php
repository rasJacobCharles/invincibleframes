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
use InvincibleFramesBundle\Entity\Keyword;

class KeywordDataFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default account types
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $keyword = new Keyword();
        $keyword->setName('film production');
        $keyword->setMeta('Film, film production, film editing');

        $manager->persist($keyword);
        $manager->flush();

        $keyword = new Keyword();
        $keyword->setName('CGI');
        $keyword->setMeta('CGI, computer-generated imagery');

        $manager->persist($keyword);
        $manager->flush();
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

