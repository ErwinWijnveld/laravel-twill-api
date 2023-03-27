@extends('twill::layouts.form')

@section('contentFields')

@formColumns
    @slot('left')
        {{-- author --}}
        <x-twill::input name="author" :label="twillTrans('Auteur')" />
    @endslot
    @slot('right')
        {{-- date --}}
        <x-twill::date-picker 
        name="date" 
        label="Datum artikel"
    />
    @endslot
@endformColumns

{{-- content --}}
<x-twill::wysiwyg name="content" :label="twillTrans('Tekst')" :toolbar-options="\App\GlobalVariables::$wysiwygOptions" :edit-source="true" />

@include('twill.partials.link', [
    'textFieldName' => 'button_title',
    'urlFieldName' => 'button_link',
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
