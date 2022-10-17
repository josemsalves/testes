<?php
namespace Application\Form;

use Application\Entity\Hash;
use Doctrine\Laminas\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Persistence\ObjectManager;
use Laminas\Form\Element\Hidden;
use Laminas\Form\Element\Text;
use Laminas\Form\Fieldset;
use Laminas\InputFilter\InputFilterProviderInterface;

class HashFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('hash');

        $this->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new Hash());

        $this->add([
            'type' => Hidden::class,
            'name' => 'id',
        ]);

        $this->add([
            'type'    => Text::class,
            'name'    => 'name',
            'options' => [
                'label' => 'Hash',
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
