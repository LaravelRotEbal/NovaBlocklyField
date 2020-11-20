<?php

namespace LaravelRotEbal\NovaBlocklyField;

use Laravel\Nova\Fields\Field;

class Blockly extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'BlocklyField';



    public function __construct($name, $attribute = null, callable $resolveCallback = null) {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'toolbox' =>  [
                "kind" => "categoryToolbox",

                "contents" => [
                    [
                        "kind" => "category",
                        "name" => "Control",
                        "contents" => [
                            [
                                "kind" => "block",
                                "type" => "controls_if"
                            ],
                            [
                                "kind" => "block",
                                "type" => "controls_whileUntil"
                            ],
                            [
                                "kind" => "block",
                                "type" => "controls_for"
                            ]
                        ]
                    ],

                    [
                        "kind" => "category",
                        "name" => "Logic",
                        "contents" => [
                            [
                                "kind" => "block",
                                "type" => "logic_compare"
                            ],
                            [
                                "kind" => "block",
                                "type" => "logic_operation"
                            ],
                            [
                                "kind" => "block",
                                "type" => "logic_boolean"
                            ]
                        ]
                    ]
                ]
            ],

            'collapse' => false,
            'comments' => false,
            'disable' => false,
            'maxBlocks' => 'Infinity',
            'trashcan' => true,
            'horizontalLayout' => false,
            'toolboxPosition' => 'start',
            'css' => true,
            'media' => '/nova-api/media/blockly/',
            'rtl' => false,
            'scrollbars' => true,
            'sounds' => true,
            'oneBasedIndex' => true,

            'grid' => [
                'spacing' => 20,
                'length' => 1,
                'colour' => '#888',
                'snap' => true,
            ],

            'zoom' => [
                'controls' => true,
                'wheel' => true,
                'startScale' => 1,
                'maxScale' => 3,
                'minScale' => 0.3,
                'scaleSpeed' => 1.2,
            ],

        ]);
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushCategory($category) {
        $this->meta['toolbox']['contents'][] = $category;

        return $this;
    }



}
