<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsNewsRepository")
 */
class NewsNews
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewsCat")
     */
    private $cat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateSubmit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SysUser")
     */
    private $submitter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viewCount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publish;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bannerPic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $des;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $miniBanner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCat(): ?NewsCat
    {
        return $this->cat;
    }

    public function setCat(?NewsCat $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function getDateSubmit(): ?string
    {
        return $this->dateSubmit;
    }

    public function setDateSubmit(string $dateSubmit): self
    {
        $this->dateSubmit = $dateSubmit;

        return $this;
    }

    public function getSubmitter(): ?SysUser
    {
        return $this->submitter;
    }

    public function setSubmitter(?SysUser $submitter): self
    {
        $this->submitter = $submitter;

        return $this;
    }

    public function getViewCount(): ?string
    {
        return $this->viewCount;
    }

    public function setViewCount(?string $viewCount): self
    {
        $this->viewCount = $viewCount;

        return $this;
    }

    public function getPublish(): ?bool
    {
        return $this->publish;
    }

    public function setPublish(?bool $publish): self
    {
        $this->publish = $publish;

        return $this;
    }

    public function getBannerPic(): ?string
    {
        return $this->bannerPic;
    }

    public function setBannerPic(?string $bannerPic): self
    {
        $this->bannerPic = $bannerPic;

        return $this;
    }

    public function getDes(): ?string
    {
        return $this->des;
    }

    public function setDes(?string $des): self
    {
        $this->des = $des;

        return $this;
    }

    public function getMiniBanner(): ?string
    {
        return $this->miniBanner;
    }

    public function setMiniBanner(?string $miniBanner): self
    {
        $this->miniBanner = $miniBanner;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }
}
