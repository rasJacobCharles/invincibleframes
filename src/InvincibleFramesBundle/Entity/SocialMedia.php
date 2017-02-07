<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Social Media Links
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class SocialMedia
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $link;

    /**
     * @ORM\OneToOne(targetEntity="InvincibleFramesBundle\Entity\FontAwesomeIcon")
     */
    protected $icon;

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

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return FontAwesomeIcon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param FontAwesomeIcon $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

}