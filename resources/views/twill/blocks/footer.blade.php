@twillBlockTitle('Footer')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::medias 
    name="img" 
    label="Footer afbeelding"
/>

@formColumns
    @slot('left')

        <x-twill::input 
            name="phone_title"
            label="Tekst boven telefoonnummer"
        />
        <x-twill::input
            name="phone_number"
            label="Telefoonnummer"
        />

        <x-twill::wysiwyg name="text" :label="twillTrans('Tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

    @endslot
    @slot('right')
        <x-twill::input 
            name="navigation_title"
            label="Navigatie titel"
        />

        <x-twill::repeater
            type="menu-item"
            label="Navigatie items"
        />
    @endslot
@endformColumns

<x-twill::repeater
    type="contact-item"
    label="Icoontje met tekst en link"
/>

<x-twill::wysiwyg name="footer_text" :label="twillTrans('Onderstaande tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

