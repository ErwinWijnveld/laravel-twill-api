@twillBlockTitle('Uitgelichte Reviews')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::wysiwyg name="text" :label="twillTrans('Tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

<x-twill::browser
    module-name="reviews"
    name="reviews"
    label="Reviews"
    :max="6"
/>