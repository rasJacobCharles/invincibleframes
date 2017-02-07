<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;

/**
 * Projects
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Project
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", length=90)
     */
    protected $title;

    /**
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Element", mappedBy="project")
     */
    protected $content;
    /**
     * @var Image
     *
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Image",  mappedBy="project")
     */
    protected $images;

    /**
     * @var Video
     *
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Video",  mappedBy="project")
     */
    protected $videos;

    /**
     * @var Skill
     *
     * @ORM\OneToMany(targetEntity="InvincibleFramesBundle\Entity\Skill",  mappedBy="project")
     */
    protected $skills;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $client;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $link;

    public function __construct()
    {
        $this->videos   = new ArrayCollection();
        $this->images   = new ArrayCollection();
        $this->content = new ArrayCollection();
        $this->skills   = new ArrayCollection();
    }

    public function __toString()
    {
       return $this->getTitle();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \Doctrine\ORM\PersistentCollection
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param \Doctrine\ORM\PersistentCollection $content
     */
    public function setContent(PersistentCollection $content)
    {
        $this->content = $content;
    }

    /**
     * @return \Doctrine\ORM\PersistentCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param \Doctrine\ORM\PersistentCollection $images
     */
    public function setImages(PersistentCollection $images)
    {
        $this->images = $images;
    }

    /**
     * @return \Doctrine\ORM\PersistentCollection
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param \Doctrine\ORM\PersistentCollection $videos
     */
    public function setVideos(PersistentCollection $videos)
    {
        $this->videos = $videos;
    }

    /**
     * @return \Doctrine\ORM\PersistentCollection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param \Doctrine\ORM\PersistentCollection $skills
     */
    public function setSkills(PersistentCollection $skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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



}