<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsCatRepository")
 */
class NewsCat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $catName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $catCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $catURI;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): self
    {
        $this->catName = $catName;

        return $this;
    }

    public function getCatCode(): ?string
    {
        return $this->catCode;
    }

    public function setCatCode(string $catCode): self
    {
        $this->catCode = $catCode;

        return $this;
    }

    public function getCatURI(): ?string
    {
        return $this->catURI;
    }

    public function setCatURI(string $catURI): self
    {
        $this->catURI = $catURI;

        return $this;
    }
}
