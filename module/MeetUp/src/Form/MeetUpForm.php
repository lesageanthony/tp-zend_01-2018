<?php

declare(strict_types=1);

namespace MeetUp\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;

class MeetUpForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('meetup');

        $this->add([
            'type' => Element\Text::class,
            'name' => 'title',
            'options' => [
                'label' => 'Titre ',
            ],
        ]);
        $this->add([
            'type' => Element\Textarea::class,
            'name' => 'description',
            'options' => [
                'label' => 'Description ',
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'begin',
            'options' => [
                'label' => 'Début du meetup ',
            ],
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'end',
            'options' => [
                'label' => 'Fin du meetup ',
            ],
        ]);

        $this->add([
            'type' => Element\Submit::class,
            'name' => 'add',
            'attributes' => [
                'value' => 'Ajouter',
            ],
        ]);

        $this->add([
        'type' => Element\Submit::class,
        'name' => 'edit',
        'attributes' => [
            'value' => 'Modifier',
        ],
    ]);

    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 4,
                            'max' => 49,
                        ],
                    ],
                ],
            ],
            'description' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 1999,
                        ],
                    ],
                ],
            ],
            'begin' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => 'date',
                        'options' => [
                            'format' => 'd/m/Y',
                        ],
                    ],
                ],
            ],
            'end' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => 'date',
                        'options' => [
                            'format' => 'd/m/Y',
                        ],
                    ],
                ],
            ],
        ];
    }
}
