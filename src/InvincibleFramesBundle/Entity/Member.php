<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\PersistentCollection;

/**
 * Team Members of Invincible Frames
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Member
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
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Element", mappedBy="member")
     */
    protected $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $image;

    /**
     * @var MemberType
     *
     * @ORM\OneToOne(targetEntity="InvincibleFramesBundle\Entity\MemberType")
     */
    protected $memberType;

    /**
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Video", mappedBy="member")
     */
    protected $videos;

    public function __construct()
    {
        $this->videos   = new ArrayCollection();
        $this->content  = new ArrayCollection();
    }

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

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return MemberType
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * @param MemberType $memberType
     */
    public function setMemberType($memberType)
    {
        $this->memberType = $memberType;
    }

    /**
     * @return PersistentCollection
     */
    public function getVideos()
    {
        return $this->videos;
    }
    /**
     * @return array
     */
    public function getVideosString()
    {
        $videoString = [];
        foreach ($this->getVideos()->toArray() as $video) {
            if ($video instanceof  Video) {
                $videoString[] = $video->getVideoUrl();
            }
        }
        return $videoString;
    }

    /**
     * @param mixed $videos
     */
    public function setVideos(Collection $videos)
    {
        $this->videos = $videos;
    }

    public function addVideo(Video $video)
    {
        if (!$this->getVideos()->contains($video)) {
            $this->getVideos()->add($video);
        }
    }
    public function removeVideo(Video $video)
    {
        $this->getVideos()->removeElement($video);
    }


}
