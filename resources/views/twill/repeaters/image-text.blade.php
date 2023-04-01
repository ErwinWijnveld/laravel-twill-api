@twillRepeaterTitle('image-text')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Foto en tekst toevoegen')
@twillRepeaterGroup('app')

@formColumns
@slot('left')

    <x-twill::input 
        name="title"
        label="Titel"
    />
    <x-twill::input 
        name="text"
        label="Text"
        type="textarea"
        :rows="3"
    />

@endslot
@slot('right')
    <x-twill::medias 
        name="img" 
        label="Afbeelding"
    />
@endslot
@endformColumns
