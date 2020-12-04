<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <template>

                <BlocklyComponent class="blockly" :options="options" ref="editor">
                </BlocklyComponent>

            </template>

        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

import Blockly from 'blockly';
import BlocklyComponent from './BlocklyComponent.vue'

export default {
//    name: 'app',

    components: {
        BlocklyComponent
    },

    data() {
        return {
            code: '',

            options: {
                media: this.field.media,

                readOnly: this.field.readOnly,

                collapse: this.field.collapse,
                comments: this.field.comments,
                disable: this.field.disable,
                maxBlocks: this.field.maxBlocks,
                trashcan: this.field.trashcan,
                horizontalLayout: this.field.horizontalLayout,
                toolboxPosition: this.field.toolboxPosition,
                css: this.field.css,
                rtl: this.field.rtl,
                scrollbars: this.field.scrollbars,
                sounds: this.field.sounds,
                oneBasedIndex: this.field.oneBasedIndex,

                grid: this.field.grid,
                zoom: this.field.zoom,

                toolbox: this.field.toolbox,
            }
        }
    },

    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''

            let blocklyXml = Blockly.Xml.textToDom(this.value);

            let workspace = Blockly.getMainWorkspace();

            workspace.clear();

            Blockly.Xml.domToWorkspace(blocklyXml, workspace);
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            console.log(this);
            console.log(this.$refs);
            let blocklyXml = Blockly.Xml.workspaceToDom(this.$refs["editor"].workspace);
            var xmlText = new XMLSerializer().serializeToString(blocklyXml);

            formData.append(this.field.attribute, xmlText || null)
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
    },
}
</script>


<style>
    .blockly {/*
        position: absolute;
        right: 0;
        top: 0;
        width: 50%;
        height: 50%;*/
        width: 100%;
        height: 500px;
    }
</style>
