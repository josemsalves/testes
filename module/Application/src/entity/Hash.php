<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="hash")
 * @ORM\Entity
 */
class Hash
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Tag", inversedBy="hash")
     * @ORM\JoinColumn(name="tag", referencedColumnName="id")
     */
    private ?Tag $tag = null;

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
    public function setTag(?Tag $blogPost = null): void
    {
        $this->tag = $blogPost;
    }

    public function getTag(): ?Tag
    {
        return $this->tag;
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
