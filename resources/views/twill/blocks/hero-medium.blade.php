@twillBlockTitle('Standaard pagina voorkant (medium)')
@twillBlockIcon('text')
@twillBlockGroup('app')

{{-- Validation --}}
@twillBlockValidationRules([
    'text' => 'required'
])

{{-- input fields --}}
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
    name="img_1" 
    label="Rechter foto"
    />
    @include('twill.partials.link', [
        'textFieldName' => 'link_2_text',
        'urlFieldName' => 'link_2_url',
    ])
@endslot
@endformColumns

