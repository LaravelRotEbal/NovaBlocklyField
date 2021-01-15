<template>
    <div>111</div>
    <panel-item :field="field">
        <div>222</div>
        <template slot="value">
            <div>333</div>
            <button v-if="showFSButton" type="button" class="btn btn-default btn-fullscreen" @click="fullscreenCats">
                <svg v-if="!fullscreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="var(--sidebar-icon)" d="M3 1h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3h-4zM3 11h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4h-4z"></path></svg>
                <svg v-if="fullscreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="var(--sidebar-icon)" d="M7 10V7a5 5 0 1 1 10 0v3h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h2zm2 0h6V7a3 3 0 0 0-6 0v3zm-4 2v8h14v-8H5zm7 2a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1z"></path></svg>
            </button>

            <div ref="overlay">
                <BlocklyComponent class="blockly" style="height: 500px;" :options="options" ref="editor">
                </BlocklyComponent>
            </div>
        </template>
    </panel-item>
</template>


<script>
    import Blockly from 'blockly';
    import BlocklyComponent from './BlocklyComponent.vue'

    export default {
//    name: 'app',

        components: {
            BlocklyComponent
        },

        data() {
            return {
                fullscreen: false,
                showFSButton: false,

                code: '',

                options: {
                    media: this.field.media,

                    readOnly: true,

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

        created() {
            if(document.fullscreenEnabled) {
                this.showFSButton = true;
            }

            window.addEventListener('resize',this.onresize);
        },

        destroyed: function() {
            window.removeEventListener('resize', this.onresize);
        },

        props: ['resource', 'resourceName', 'resourceId', 'field'],

        methods: {

            onresize() {
                var overlay = this.$refs.overlay;
                var blocklyDiv = this.$refs.editor;

                blocklyDiv.$el.style.width = "";
                blocklyDiv.$el.style.height = "";

                blocklyDiv.$el.style.left = 0 + 'px';
                blocklyDiv.$el.style.top = 0 + 'px';
                blocklyDiv.$el.style.width = overlay.offsetWidth + 'px';
                blocklyDiv.$el.style.height = (overlay.offsetHeight ? overlay.offsetHeight : 500) + 'px';

                Blockly.svgResize(Blockly.getMainWorkspace());
            },

            fullscreenCats() {
                this.$refs.overlay.requestFullscreen();
            },

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
    .btn-fullscreen {
        position: relative;
        right: 60px;
        top: 14px;
        width: 36px;
        height: 36px;
        padding: 4px;
        /* font-size: 36px; */
        /* line-height: 36px; */
        /* text-align: center; */
        /* outline: none; */
        z-index: 10;
        float: right;
        background-color: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(240, 240, 240, 0.15);
    }
</style>
