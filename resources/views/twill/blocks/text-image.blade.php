@twillBlockTitle('Tekst naast foto')
@twillBlockIcon('text')
@twillBlockGroup('app')

@php
    $options = [
  
        [
            'value' => 'left',
            'label' => 'Links'
        ],
        [
            'value' => 'right',
            'label' => 'Rechts'
        ],
    ];
@endphp

<x-twill::radios
    name="image_position"
    label="Foto positie"
    default="right"
    :inline="true"
    :options="$options"
/>

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
