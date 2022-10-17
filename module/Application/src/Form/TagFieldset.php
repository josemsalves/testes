<?php
namespace Application\Form;

use Application\Entity\Tag;
use Doctrine\Laminas\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Persistence\ObjectManager;
use Laminas\Form\Element\Collection;
use Laminas\Form\Element\Hidden;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;
use Laminas\InputFilter\InputFilterProviderInterface;

class TagFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('tag');

        $this->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new Tag());

        $this->add([
            'type' => Hidden::class,
            'name' => 'id',
        ]);

        $this->add([
            'type'    => Text::class,
            'name'    => 'name',
            'options' => [
                'label' => 'Tag',
            ],
        ]);
        $tagFieldset = new HashFieldset($objectManager);
        $this->add([
            'type'    => Collection::class,
            'name'    => 'hash',
            'options' => [
                'count'          => 2,
                'target_element' => $tagFieldset,
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'id' => [
                'required' => false,
            ],
            'name' => [
                'required' => true,
            ],
        ];
    }
}
