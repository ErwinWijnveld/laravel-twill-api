@twillBlockTitle('Text links met foto rechts')
@twillBlockIcon('text')
@twillBlockGroup('app')

@formColumns
    @slot('left')
        <x-twill::wysiwyg name="text" :label="twillTrans('Tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

        @include('twill.partials.link', [
            'textFieldName' => 'link_text',
            'urlFieldName' => 'link_url',
        ])


    @endslot
    @slot('right')
        <x-twill::medias 
            name="img" 
            label="Afbeelding"
        />
    @endslot
@endformColumns
