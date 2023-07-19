<template>
    <div>
        <div class="mx-auto ">
            <div>
                <ckeditor class="h-full w-full" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    data() {
        return {
            editor: ClassicEditor,
            editorData: 'ckeditor 5 for laravel and vuejs',
            editorConfig: {
                // toolbar: ['bold', 'italic', '|', 'list']
            },
        }
    },
       
    mounted(){
        this.emptyEditor();
    },
    
    methods: {
        emptyEditor() {
            this.editorData = '';
        },

        displayEditorResult(){
            document.getElementById('resultingText').innerHTML = this.editorData;
        }
    }
}
</script>

<style>

</style>