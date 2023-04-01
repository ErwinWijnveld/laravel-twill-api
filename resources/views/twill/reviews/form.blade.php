@extends('twill::layouts.form')

@section('contentFields')
{{-- stars --}}
@php
    $selectOptions = [
        [
            'value' => 1,
            'label' => '1'
        ],
        [
            'value' => 2,
            'label' => '2'
        ],
        [
            'value' => 3,
            'label' => '3'
        ],
        [
            'value' => 4,
            'label' => '4'
        ],
        [
            'value' => 5,
            'label' => '5'
        ],
    ];
@endphp

<x-twill::select 
    name="stars"
    label="Aantal sterren"
    :unpack="true"
    :options="$selectOptions"
/>

@formColumns
    @slot('left')
        {{-- author --}}
        <x-twill::input name="author" :label="twillTrans('Auteur')" />
    @endslot
    @slot('right')
        {{-- date --}}
        <x-twill::date-picker 
        name="date" 
        label="Datum"
    />
    @endslot
@endformColumns


{{-- content --}}
<x-twill::input name="content" :label="twillTrans('Tekst')" type="textarea" :rows="3"  />

@endsection