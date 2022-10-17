<?php
namespace Application\Form;

use Application\Entity\BlogPost;
use Doctrine\Laminas\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Persistence\ObjectManager;
use Laminas\Form\Element\Collection;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;
use Laminas\InputFilter\InputFilterProviderInterface;

class BlogPostFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('blog-post');

        $this->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new BlogPost());

        $this->add([
            'type' => Text::class,
            'name' => 'title',
        ]);

        $tagFieldset = new TagFieldset($objectManager);
        $this->add([
            'type'    => Collection::class,
            'name'    => 'tag',
            'options' => [
                'count'          => 2,
                'target_element' => $tagFieldset,
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'required' => true,
            ],
        ];
    }
}
