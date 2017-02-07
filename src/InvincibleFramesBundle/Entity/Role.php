<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Role implements RoleInterface
{
    const ROLE_DEFAULT          =   'ROLE_MEMBER';
    const ROLE_ADMIN            =   'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $role;
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $name;
    /**
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\User", mappedBy="roles")
     */
    protected $users;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}