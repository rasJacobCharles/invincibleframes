<?php

namespace InvincibleFramesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $url;

    /**
     * @ORM\Column(type="string", length=90)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;

    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $image;

    /**
     * @ORM\OneToOne(targetEntity="InvincibleFramesBundle\Entity\VideoSource")
     */
    protected $source;

    /**
     * @ORM\OneToOne(targetEntity="InvincibleFramesBundle\Entity\VideoType")
     */
    protected $type;

    /**
     * @ORM\ManyToMany(targetEntity="InvincibleFramesBundle\Entity\Project", inversedBy="videos")
     */
    protected $project;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        //TODO only store the url id
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return VideoType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param VideoType $type
     */
    public function setType(VideoType $type)
    {
        $this->type = $type;
    }

    public function getVideoUrl()
    {
        //Todo Turn video and url to link

        switch ($this->getType()->getName()) {
            case "youtube":
                $urlBase = '';
                break;
            default:
                $urlBase = '';
                break;
        }
        return $urlBase.$this->getUrl();
    }
}