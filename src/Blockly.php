<?php

namespace LaravelRotEbal\NovaBlocklyField;

use Laravel\Nova\Fields\Field;

class Blockly extends Field {

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'BlocklyField';



    public function __construct($name, $attribute = null, callable $resolveCallback = null) {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta(
            [
                'toolbox' => [
                    "kind" => "categoryToolbox",

                    "contents" => [],
                ],

                'readOnly' => false,
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

            ]
        );

        $this->toolboxPushLogic();
        $this->toolboxPushLoops();
        $this->toolboxPushMath();
        $this->toolboxPushText();
        $this->toolboxPushLists();
        $this->toolboxPushColor();
        $this->toolboxPushSeparator();
        $this->toolboxPushVariables();
        $this->toolboxPushFunctions();
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushLogic() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_if"></block>',
                    'type' => 'controls_if',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_compare"></block>',
                    'type' => 'logic_compare',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_operation"></block>',
                    'type' => 'logic_operation',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_negate"></block>',
                    'type' => 'logic_negate',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_boolean"></block>',
                    'type' => 'logic_boolean',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_null"></block>',
                    'type' => 'logic_null',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="logic_ternary"></block>',
                    'type' => 'logic_ternary',
                ],
            ],
            'id' => 'catLogic',
            'colour' => '210',
            'name' => 'Logic',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushLoops() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_repeat_ext">
          <value name="TIMES">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'controls_repeat_ext',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_whileUntil"></block>',
                    'type' => 'controls_whileUntil',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_for">
          <value name="FROM">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="TO">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
          <value name="BY">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'controls_for',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_forEach"></block>',
                    'type' => 'controls_forEach',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="controls_flow_statements"></block>',
                    'type' => 'controls_flow_statements',
                ],
            ],
            'id' => 'catLoops',
            'colour' => '120',
            'name' => 'Loops',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushMath() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_number"></block>',
                    'type' => 'math_number',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_arithmetic">
          <value name="A">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="B">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_arithmetic',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_single">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">9</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_single',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_trig">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">45</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_trig',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_constant"></block>',
                    'type' => 'math_constant',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_number_property">
          <value name="NUMBER_TO_CHECK">
            <shadow type="math_number">
              <field name="NUM">0</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_number_property',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_change">
          <value name="DELTA">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_change',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_round">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">3.1</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_round',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_on_list"></block>',
                    'type' => 'math_on_list',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_modulo">
          <value name="DIVIDEND">
            <shadow type="math_number">
              <field name="NUM">64</field>
            </shadow>
          </value>
          <value name="DIVISOR">
            <shadow type="math_number">
              <field name="NUM">10</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_modulo',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_constrain">
          <value name="VALUE">
            <shadow type="math_number">
              <field name="NUM">50</field>
            </shadow>
          </value>
          <value name="LOW">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="HIGH">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_constrain',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_random_int">
          <value name="FROM">
            <shadow type="math_number">
              <field name="NUM">1</field>
            </shadow>
          </value>
          <value name="TO">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'math_random_int',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="math_random_float"></block>',
                    'type' => 'math_random_float',
                ],
            ],
            'id' => 'catMath',
            'colour' => '230',
            'name' => 'Math',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushText() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text"></block>',
                    'type' => 'text',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_join"></block>',
                    'type' => 'text_join',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_append">
          <value name="TEXT">
            <shadow type="text"></shadow>
          </value>
        </block>',
                    'type' => 'text_append',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_length">
          <value name="VALUE">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_length',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_isEmpty">
          <value name="VALUE">
            <shadow type="text">
              <field name="TEXT"></field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_isEmpty',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_indexOf">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
          <value name="FIND">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_indexOf',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_charAt">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
        </block>',
                    'type' => 'text_charAt',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_getSubstring">
          <value name="STRING">
            <block type="variables_get">
              <field name="VAR">text</field>
            </block>
          </value>
        </block>',
                    'type' => 'text_getSubstring',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_changeCase">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_changeCase',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_trim">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_trim',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_print">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_print',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="text_prompt_ext">
          <value name="TEXT">
            <shadow type="text">
              <field name="TEXT">abc</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'text_prompt_ext',
                ],
            ],
            'id' => 'catText',
            'colour' => '160',
            'name' => 'Text',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushLists() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_create_with">
          <mutation items="0"></mutation>
        </block>',
                    'type' => 'lists_create_with',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_create_with"></block>',
                    'type' => 'lists_create_with',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_repeat">
          <value name="NUM">
            <shadow type="math_number">
              <field name="NUM">5</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'lists_repeat',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_length"></block>',
                    'type' => 'lists_length',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_isEmpty"></block>',
                    'type' => 'lists_isEmpty',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_indexOf">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>',
                    'type' => 'lists_indexOf',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_getIndex">
          <value name="VALUE">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>',
                    'type' => 'lists_getIndex',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_setIndex">
          <value name="LIST">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>',
                    'type' => 'lists_setIndex',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_getSublist">
          <value name="LIST">
            <block type="variables_get">
              <field name="VAR">list</field>
            </block>
          </value>
        </block>',
                    'type' => 'lists_getSublist',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_split">
          <value name="DELIM">
            <shadow type="text">
              <field name="TEXT">,</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'lists_split',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="lists_sort"></block>',
                    'type' => 'lists_sort',
                ],
            ],
            'id' => 'catLists',
            'colour' => '260',
            'name' => 'Lists',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushColor() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'contents' => [
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="colour_picker"></block>',
                    'type' => 'colour_picker',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="colour_random"></block>',
                    'type' => 'colour_random',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="colour_rgb">
          <value name="RED">
            <shadow type="math_number">
              <field name="NUM">100</field>
            </shadow>
          </value>
          <value name="GREEN">
            <shadow type="math_number">
              <field name="NUM">50</field>
            </shadow>
          </value>
          <value name="BLUE">
            <shadow type="math_number">
              <field name="NUM">0</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'colour_rgb',
                ],
                [
                    'kind' => 'BLOCK',
                    'blockxml' => '<block type="colour_blend">
          <value name="COLOUR1">
            <shadow type="colour_picker">
              <field name="COLOUR">#ff0000</field>
            </shadow>
          </value>
          <value name="COLOUR2">
            <shadow type="colour_picker">
              <field name="COLOUR">#3333ff</field>
            </shadow>
          </value>
          <value name="RATIO">
            <shadow type="math_number">
              <field name="NUM">0.5</field>
            </shadow>
          </value>
        </block>',
                    'type' => 'colour_blend',
                ],
            ],
            'id' => 'catColour',
            'colour' => '20',
            'name' => 'Color',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushSeparator() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'SEP',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushVariables() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'id' => 'catVariables',
            'colour' => '330',
            'custom' => 'VARIABLE',
            'name' => 'Variables',
        ];

        return $this;
    }



    /**
     * @param array $category
     *
     * @return $this
     */
    public function toolboxPushFunctions() {
        $this->meta['toolbox']['contents'][] = [
            'kind' => 'CATEGORY',
            'id' => 'catFunctions',
            'colour' => '290',
            'custom' => 'PROCEDURE',
            'name' => 'Functions',
        ];

        return $this;
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
