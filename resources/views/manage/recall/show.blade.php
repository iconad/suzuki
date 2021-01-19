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
        <div class="active section">{{$recall->id}}</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="{{route('recall-announcements.update', $recall->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <h3 class="ui header">{{$recall->title}}</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>Title *</label>
            <input type="text" name="title" required value="{{$recall->title}}" placeholder="Title / Name">
        </div>

        <div class="field">
            <label>Vehicle</label>
            <select name="vehicle_id" class="ui fluid dropdown" required>
                @foreach ($vehicles as $vehicle)
                @if ($recall->vehicle_id == $vehicle->id)
                <option selected value="{{$vehicle->id}}"> {{$vehicle->title}} </option>
                @else
                <option value="{{$vehicle->id}}"> {{$vehicle->title}} </option>
                @endif
                @endforeach
            </select>
        </div>

        @php
            $types = ['type 1', 'type 2', 'type 3']
        @endphp

        <div class="field">
            <label>Vehicle Type</label>
            <select name="vehicle_type" class="capitalize ui fluid dropdown" required>
                @foreach ($types as $type)
                @if ($type == $recall->vehicle_type)
                <option selected value="{{$type}}"> {{$type}} </option>
                @else
                <option value="{{$type}}"> {{$type}} </option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="field">
            <label>Till Date</label>
            <input required type="date" name="till_date" value="{{$recall->till_date}}" placeholder="select date">
        </div>

        <div class="field">
            <label>Change Thumbnail</label>

            <div class="ui small image mb-4">
                <img src="{{$thumbnail}}">
            </div>

            <input type="file" name="thumbnail">
        </div>

        <div class="field">
            <label>Detail</label>
            <textarea required id="detailTextarea" rows="10" name="detail" placeholder="Detail">{{$recall->detail}}</textarea>
        </div>

        <button type="submit" class="ui button" tabindex="0">Submit</button>
    </form>
    <div class="absolute right-0 bottom-0">
        <delete-record :id="{{$recall->id}}" model="recall-announcements"></delete-record>
    </div>
</div>

@endsection
@section('scripts')
    <script src="{{asset('/js/manage/trumbowyg.min.js')}}"></script>
    <script>
        $('#detailTextarea').trumbowyg();
    </script>
@endsection
