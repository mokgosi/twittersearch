<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tweet
 *
 * @ORM\Table(name="tweets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TweetRepository")
 */
class Tweet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_screen_name", type="string", length=255)
     */
    private $screenName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_profile_img", type="string", length=255)
     */
    private $profileImg;

    /**
     * @var string
     *
     * @ORM\Column(name="retweet_count", type="integer")
     */
    private $retweetCount;

    /**
     * @var int
     *
     * @ORM\Column(name="favourite_count", type="integer")
     */
    private $favouriteCount;
    
    /**
     * @var int
     *
     * @ORM\Column(name="geo", type="string", length=255, nullable=true)
     */
    private $geo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Tweet
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tweet
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return Tweet
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set screenName
     *
     * @param string $screenName
     * @return Tweet
     */
    public function setScreenName($screenName)
    {
        $this->screenName = $screenName;

        return $this;
    }

    /**
     * Get screenName
     *
     * @return string 
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * Set profileImg
     *
     * @param string $profileImg
     * @return Tweet
     */
    public function setProfileImg($profileImg)
    {
        $this->profileImg = $profileImg;

        return $this;
    }

    /**
     * Get profileImg
     *
     * @return string 
     */
    public function getProfileImg()
    {
        return $this->profileImg;
    }

    /**
     * Set retweetCount
     *
     * @param integer $retweetCount
     * @return Tweet
     */
    public function setRetweetCount($retweetCount)
    {
        $this->retweetCount = $retweetCount;

        return $this;
    }

    /**
     * Get retweetCount
     *
     * @return integer 
     */
    public function getRetweetCount()
    {
        return $this->retweetCount;
    }

    /**
     * Set favouriteCount
     *
     * @param integer $favouriteCount
     * @return Tweet
     */
    public function setFavouriteCount($favouriteCount)
    {
        $this->favouriteCount = $favouriteCount;

        return $this;
    }

    /**
     * Get favouriteCount
     *
     * @return integer 
     */
    public function getFavouriteCount()
    {
        return $this->favouriteCount;
    }

    /**
     * Set geo
     *
     * @param string $geo
     * @return Tweet
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * Get geo
     *
     * @return string 
     */
    public function getGeo()
    {
        return $this->geo;
    }
}
