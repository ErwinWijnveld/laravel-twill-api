@twillRepeaterTitle('usp')
@twillRepeaterTitleField('title', ['hidePrefix' => true])
@twillRepeaterTrigger('Add usp')
@twillRepeaterGroup('app')

<x-twill::files 
    name="icon" 
    label="Icoontje"
/>

<x-twill::input 
    name="title"
    label="Titel"
/>
<x-twill::input 
    name="text"
    label="Text"
    type="textarea"
    :rows="3"
    :maxlength="100"
/>