<?php

declare(strict_types=1);

namespace MeetUp\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;
use Zend\Validator\Callback;

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
            'type' => Element\Date::class,
            'name' => 'begin',
            'options' => [
                'label' => 'Début du meetup ',
            ],
        ]);

        $this->add([
            'type' => Element\Date::class,
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

        $this->add([
            'type' => Element\Submit::class,
            'name' => 'delete',
            'attributes' => [
                'value' => 'Supprimer',
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
                            'max' => 50,
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
                            'min' => 10,
                            'max' => 2000,
                        ],
                    ],
                ],
            ],
            'begin' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => 'Callback',
                        'options' => [
                            'messages' => array(Callback::INVALID_VALUE => 'Start time must be before end time'),
                            'callback' => function ($value, $context = []){
                                if ($value >= $context ['end']){
                                    return false;
                                }
                                return true;
                            }
                        ],
                    ],
                ],
            ],
        ];
    }
}
