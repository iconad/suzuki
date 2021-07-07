@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a class="section">Sliders</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Create New Slider</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title / Name </label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Title / Name </label>
        <input type="text" name="link" value="{{old('link')}}">
    </div>

    <div class="field">
        <label>Desktop Cover *</label>
        <input type="file" name="desktop" required>
    </div>

    <div class="field">
        <label>Mobile Cover</label>
        <input type="file" name="mobile">
    </div>

    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection


