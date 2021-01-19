@extends('manage.layouts.app')

@section('headlinks')
@livewireStyles
@endsection
@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Newsletter</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/manage/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">
            <span class="capitalize">
                {{str_replace("-", " ", $type)}}</h3>
            </span>
    </span>
  </div>

<div class="leads">

    @livewire('manage-leads', [
        'leads' => $leads,
        'type' => $type
    ])
</div>

@endsection
@section('scripts')
@livewireScripts
@endsection
