@twillBlockTitle('Contact')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input 
name="maps_url"
label="Google maps embed url"
note="voorbeeld: <iframe src=......></iframe>"
/>

@formColumns
    @slot('left')
        <x-twill::repeater
            type="contact-item"
            label="Contact formulier icoon met tekst"
        />
    @endslot
    @slot('right')

        <x-twill::medias 
        name="img" 
        label="Locatie icoontje"
        />
        <x-twill::input 
        name="location_title"
        label="Locatie titel"
        note="Locatie informatie"
        />

        @include('twill.partials.link', [
        'textFieldName' => 'location_link_text',
        'urlFieldName' => 'location_link_url',
        ])

    @endslot
@endformColumns
