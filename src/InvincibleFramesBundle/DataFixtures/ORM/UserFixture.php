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
use InvincibleFramesBundle\Entity\Role;
use InvincibleFramesBundle\Entity\User;

class UserFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default account types
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        /** @var Role $UserType */
        $UserType = $this->getReference('admin');
        
        $user = new User();
        $user->setName('admin');
        $user->addRole($UserType);
        $user->setEmail('hello@invincibleframes.com');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'RgUQUqjOsSXHeCNAa3sw');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $this->addReference('admin', $user);
    }

    /**
     * The order in which fixtures will be loaded, the lower the number, the sooner that this fixture is loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}

