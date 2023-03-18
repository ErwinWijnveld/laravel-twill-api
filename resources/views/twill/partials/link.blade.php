@formColumns
    @slot('left')
        @formField('input', [
            'name' => $textFieldName ?? 'link_text',
            'label' => 'Link text',
            'maxlength' => 100,
            'placeholder' => 'Lees meer',
        ])
    @endslot
    @slot('right')
        @formField('input', [
            'name' => $urlFieldName ?? 'link_url',
            'label' => 'Link url',
            'maxlength' => 100,
            'placeholder' => '/link-naar-pagina',
        ])
    @endslot
@endformColumns