@twillBlockTitle('Uitgelichte Blogs')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::wysiwyg name="text" :label="twillTrans('Tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

<x-twill::browser
    module-name="blogs"
    name="blogs"
    label="Blogs"
    :max="7"
/>