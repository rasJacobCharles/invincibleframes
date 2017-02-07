<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Role", inversedBy="users")
     */
    protected $roles;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $username;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "user.email.not_blank")
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "user.name.not_blank")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    protected $password;

    public function __construct()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
        $this->roles = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id
     *
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        $this->setUsername($email);
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function eraseCredentials()
    {
    }
    public function isAccountNonExpired()
    {
        return true;
    }
    public function isAccountNonLocked()
    {
        return true;
    }
    public function isCredentialsNonExpired()
    {
        return true;
    }
    public function isEnabled()
    {
        return !$this->getId();
    }
    public function getRoles()
    {
        $rolesString = [];
        foreach ($this->roles->toArray() as $role) {
            if ($role instanceof  Role) {
                $rolesString[] = $role->getRole();
            }
        }
        return $rolesString;
    }
    public function setRoles(Collection $roles)
    {
        $this->roles = $roles;
    }
    public function addRole(Role $role)
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
        }
    }
    public function removeRole(Role $role)
    {
        $this->roles->removeElement($role);
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->name,
            $this->password,
        ));
    }
    /**
     *@param $serialized
     *@see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->email,
            $this->name,
            $this->password,
            ) = unserialize($serialized);
    }

}