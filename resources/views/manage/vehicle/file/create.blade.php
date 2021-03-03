@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/manage/vehicles" class="section">Vehicles</a>
        <div class="divider"> / </div>
        <a href="/manage/vehicles/{{$vehicle->id}}" class="section">{{$vehicle->id}}</a>
        <div class="divider"> / </div>
        <div class="active section">file upload</div>
    </div>
</div>

<form class="ui form" action="/manage/vehicles/{{$vehicle->id}}/files" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Add New File to {{$vehicle->title}}</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Name / Title">
    </div>

    <div class="field">
        <label>Year</label>
        <select name="year">
            <option value="2021" selected>2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
        </select>
    </div>

    <div class="grouped fields">
    <label class="text-base">Select file type</label>
        <div class="field">
            <div class="block mb-2">
                <div class="ui radio checkbox">
                    <input id="specs" type="radio" value="specs" name="type" checked="checked">
                    <label for="specs">Specs</label>
                </div>
            </div>
            <div class="block mb-2">
                <div class="ui radio checkbox">
                    <input id="brochure" type="radio" value="brochure" name="type">
                    <label for="brochure">Brochure</label>
                </div>
            </div>
            <div class="block mb-2">
                <div class="ui radio checkbox">
                    <input id="accessory_brochure" type="radio" value="accessory brochure" name="type">
                    <label for="accessory_brochure">Accessory Brochure</label>
                </div>
            </div>
        </div>
        <div class="field">
            <label>File (PDF only) </label>
            <input type="file" name="file">
        </div>
    </div>



    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection

