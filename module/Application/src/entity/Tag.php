<?php
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\BlogPost", inversedBy="tag")
     * @ORM\JoinColumn(name="blogspot", referencedColumnName="id")
     */
    private ?BlogPost $blogPost = null;

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Tag", mappedBy="tag", cascade={"persist"})
     */
    private Collection $hash;

    /**
     * Never forget to initialize your collections!
     */
    public function __construct()
    {
        $this->hash = new ArrayCollection();
    }


    public function addHash(Collection $tags): void
    {
        foreach ($tags as $tag) {
            $tag->setTag($this);
            $this->hash->add($tag);
        }
    }

    public function removeHash(Collection $tags): void
    {
        foreach ($tags as $tag) {
            $tag->setTag(null);
            $this->hash->removeElement($tag);
        }
    }

    public function getHash(): Collection
    {
        return $this->hash;
    }


/**
     * @ORM\Column(name="name", type="string")
     */
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Allow null to remove association
     */
    public function setBlogPost(?BlogPost $blogPost = null): void
    {
        $this->blogPost = $blogPost;
    }

    public function getBlogPost(): ?BlogPost
    {
        return $this->blogPost;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
