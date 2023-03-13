@extends('twill::layouts.form')

@section('contentFields')
    @formField('block_editor', [
        'blocks' => [],
    ])
@stop

@section('sideFieldset')
    @formField('input', [
        'name' => 'seo_title',
        'label' => 'SEO title',
        'maxlength' => 60,
    ])

    @formField('input', [
        'name' => 'seo_description',
        'label' => 'SEO Description',
        'maxlength' => 160,
        'type' => 'textarea',
        'rows' => 2,
    ])
@stop
