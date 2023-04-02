@twillRepeaterTitle('menu-item')
@twillRepeaterTitleField('link_title', ['hidePrefix' => true])
@twillRepeaterTrigger('Menu item toevoegen')
@twillRepeaterGroup('app')


@include('twill.partials.link', [
'textFieldName' => 'link_title',
'urlFieldName' => 'link_url',
])
