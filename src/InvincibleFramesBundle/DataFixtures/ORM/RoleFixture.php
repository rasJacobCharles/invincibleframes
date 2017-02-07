<?php

namespace InvincibleFramesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use InvincibleFramesBundle\Entity\Role;

class RoleFixturextends extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load default roles
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $repository = $manager->getRepository('ScenarioBundle:Role');
        //Use Translate file
        $arrayRoles = array(
            'ROLE_MEMBER',
            'ROLE_ADMIN',
        );
        $arrayName = array(
            'default',
            'admin',
        );
        $i = 1;
        foreach ($arrayRoles as $key => $type) {
            $role = $repository->find($i++);
            if ($role === null) {
                $role = new Role();
                $role->setName($arrayName[$key]);
                $role->setRole($type);
                //Save Target
                $manager->persist($role);
            }
            $this->addReference(strtolower(str_replace('_', '-', $name)), $role);
        }
        $manager->flush();
    }

    /**
     * The order in which fixtures will be loaded, the lower the number, the sooner that this fixture is loaded
     *
     * @return int
     */
    public
    function getOrder()
    {
        return 1;
    }
}