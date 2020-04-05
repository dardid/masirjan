<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SysConfigRepository")
 */
class SysConfig
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siteName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $configCode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NewsNews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $headPage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): self
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getConfigCode(): ?string
    {
        return $this->configCode;
    }

    public function setConfigCode(string $configCode): self
    {
        $this->configCode = $configCode;

        return $this;
    }

    public function getHeadPage(): ?NewsNews
    {
        return $this->headPage;
    }

    public function setHeadPage(?NewsNews $headPage): self
    {
        $this->headPage = $headPage;

        return $this;
    }
}
