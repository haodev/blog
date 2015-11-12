<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 09/11/15
 * Time: 15:20
 */

namespace Api\Bundle\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article class
 *
 * @ODM\Document(collection="articles")
 */
class Article
{
    /**
     * @var integer
     *
     * @ODM\Id(strategy="INCREMENT")
     */
    private $id;

    /**
     * Define the title of the article
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @ODM\String()
     */
     private $title;

    /**
     * Leading
     *
     * @var string
     *
     * @ODM\String()
     */
    private $leading;

    /**
     * Body of the article
     *
     * @var string
     *
     * @ODM\String()
     */
    private $body;

    /**
     * Date of creation of the article
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @ODM\Date()
     */
    private $createdAt;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Gedmo\Slug(fields={"title"})
     * @ODM\String()
     */
    private $slug;

    /**
     * Author of the article
     *
     * @var string
     *
     * @ODM\String()
     */
    private $createdBy;


    /**
     * Article constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getLeading()
    {
        return $this->leading;
    }

    /**
     * @param string $leading
     *
     * @return $this
     */
    public function setLeading($leading)
    {
        $this->leading = $leading;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     *
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
