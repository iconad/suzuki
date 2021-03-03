@extends('manage.layouts.app')
@section('headlinks')
    <link rel="stylesheet" href="{{asset('/css/manage/trumbowyg.min.css')}}">
@endsection
@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/manage/recall-announcements" class="section">Recall Announcements</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('recall-announcements.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Create New Announcements</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title *</label>
        <input type="text" name="title" required value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Vehicle</label>
        <select name="vehicle_id" class="ui fluid dropdown" required>
            @foreach ($vehicles as $vehicle)
                <option value="{{$vehicle->id}}"> {{$vehicle->title}} </option>
            @endforeach
        </select>
    </div>

    @php
        $types = ['saloon', 'hatchback', 'SUV']
    @endphp

    <div class="field">
        <label>Vehicle Type</label>
        <select name="vehicle_type" class="capitalize ui fluid dropdown" required>
            @foreach ($types as $type)
                <option value="{{$type}}"> {{$type}} </option>
            @endforeach
        </select>
    </div>

    <div class="field">
        <label>Till Date</label>
        <input required type="date" name="till_date" value="{{old('till_date')}}" placeholder="select date">
    </div>

    <div class="field">
        <label>Thumbnail</label>
        <input type="file" name="thumbnail">
    </div>

    <div class="field">
        <label>Content</label>
        <textarea required id="detailTextarea" rows="10" name="detail" placeholder="Detail"></textarea>
    </div>

    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
@section('scripts')
    <script src="{{asset('/js/manage/trumbowyg.min.js')}}"></script>
    <script>
        $('#detailTextarea').trumbowyg();
    </script>
@endsection
