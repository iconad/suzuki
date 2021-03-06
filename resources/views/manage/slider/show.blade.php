@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/cms/sliders" class="section">Sliders</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <h3 class="ui header">Create New Slider</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title / Name </label>
        <input type="text" name="title" value="{{$slider->title}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Link </label>
        <input type="text" name="link" value="{{$slider->link}}">
    </div>

    <div class="field">
        <div class="ui small image mb-4">
            <img src="{{$desktop}}">
        </div>
        <label>Desktop Cover *</label>
        <input type="file" name="desktop">
    </div>

    <div class="mt-10">
        <div class="field">
            <div class="ui small image mb-4">
                <img src="{{$mobile}}">
            </div>
            <label>Mobile Cover</label>
            <input type="file" name="mobile">
        </div>
    </div>

    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection


