<?php

namespace InvincibleFramesBundle\Entity;

use  Doctrine\ORM\Mapping as ORM;

/**
 * Types of video
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class VideoType
{
    const VIDEO_SHOWREEL = 'SHOWREEL';
    const VIDEO_PROJECT = 'PROJECT';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    protected $name;

    public function __toString()
    {
        return $this->getName();
    }
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


}