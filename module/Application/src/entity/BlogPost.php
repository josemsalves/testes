<?php
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="blogspot")
 * @ORM\Entity
 */
class BlogPost
{


    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Tag", mappedBy="blogPost", cascade={"persist"})
     */
    private Collection $tag;

/**
* Never forget to initialize your collections!
*/
public function __construct()
{
$this->tag = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function addTag(Collection $tags): void
{
foreach ($tags as $tag) {
$tag->setBlogPost($this);
$this->tag->add($tag);
}
}

public function removeTag(Collection $tags): void
{
foreach ($tags as $tag) {
$tag->setBlogPost(null);
$this->tag->removeElement($tag);
}
}

public function getTag(): Collection
{
return $this->tag;
}
}
