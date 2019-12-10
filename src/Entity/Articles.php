<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Artcile
 * @ORM\Entity(repositoryClass="App\Repository\Blog\ArticleRepository")
 * @ORM\Table(name="article")
 * @package App\Entity
 */
class Artcile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id",type="integer",nullable=false)
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="title",type="string",length=100,nullable=false)
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(name="content",type="text",nullable=false)
     * @var string
     */
    private $content;

    /**
     * @ORM\Column(name="date",type="datetime",nullable=false)
     * @var \DateTime
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}