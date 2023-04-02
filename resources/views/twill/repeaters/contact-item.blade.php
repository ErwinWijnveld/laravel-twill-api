@twillRepeaterTitle('contact-item')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Icoon met tekst en link toevoegen')
@twillRepeaterGroup('app')


<x-twill::medias 
name="img" 
label="Icoontje"
/>

<x-twill::input 
name="title"
label="Titel"
/>
@include('twill.partials.link', [
'textFieldName' => 'link_text',
'urlFieldName' => 'link_url',
])
