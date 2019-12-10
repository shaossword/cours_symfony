<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Array_;

/**
 * Class Auteur
 * @ORM\Entity(repositoryClass="App\Repository\Blog\AuteurRepository")
 * @ORM\Table(name="auteur")
 * @package App\Entity
 */
class Auteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id",type="integer",nullable=false)
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="firstName",type="string",length=100,nullable=false)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastName",type="string",length=100,nullable=false)
     * @var string
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article",mappedBy="auteur")
     * @var ArrayCollection|Article[]
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setAuteur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->contains($article)) {
            $this->article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getAuteur() === $this) {
                $article->setAuteur(null);
            }
        }

        return $this;
    }


}