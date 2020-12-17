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
        <a href="/manage/vehicles/{{$vehicle->id}}/files" class="section">files</a>
        <div class="divider"> / </div>
        <div class="active section">{{$file->id}}</div>
    </div>
</div>

    <div class="relative">
        <form class="ui form" action="/manage/vehicles/{{$vehicle->id}}/files/{{$file->id}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <h3 class="ui header">Add New File to {{$vehicle->title}}</h3>
            <div class="ui divider"></div>

            <div class="field">
                <label>Title</label>
                <input type="text" name="title" value="{{$file->title}}" placeholder="Name / Title">
            </div>

            @php
                $years = ['2021', '2020', '2019', '2018', '2017'];
            @endphp

            <div class="field">
                <label>Year</label>
                <select name="year">
                    @foreach ($years as $year)
                        @if ($file->year == $year)
                        <option selected value="{{$year}}">{{$year}}</option>
                        @else
                        <option value="{{$year}}">{{$year}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            @php
                $types = ['specs', 'brochure'];
            @endphp
            <div class="grouped fields">
            <label class="text-base">Select file type</label>
                <div class="field">
                    @foreach ($types as $type)
                    <div class="block mb-2">
                        <div class="ui radio checkbox">
                            @if ($file->type == $type)
                            <input id="{{$type}}" type="radio" value="{{$type}}" name="type" checked="checked">
                            <label for="{{$type}}" class="capitalize">{{$type}}</label>
                            @else
                            <input id="{{$type}}" type="radio" value="{{$type}}" name="type" >
                            <label for="{{$type}}" class="capitalize">{{$type}}</label>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="field">
                    <label>Change File (PDF only) </label>
                    <div class="mb-3">
                        <embed src="{{$pdf}}" width="200px" height="200px" />
                    </div>
                    <input type="file" name="file">
                </div>
            </div>



            <button type="submit" class="ui button" tabindex="0">Submit</button>
        </form>
        <div class="absolute bottom-0 right-0">
            <form method="post" action="/manage/vehicles/{{$vehicle->id}}/files/{{$file->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="ui button red mt-5" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

@endsection

