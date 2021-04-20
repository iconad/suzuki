@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a class="section">Branches</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="/cms/branches/{{$branch->id}}/offices/{{$office->id}}" method="post" >
        {{method_field('PUT')}}
        @csrf
        <h3 class="ui header"> {{$branch->title}}'s {{$office->type}}</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>Title / Name *</label>
            <input type="text" name="title" value="{{ $office->title }}" placeholder="Title / Name">
        </div>

        <div class="fields">
            <div class="eight field wide">
                <label>Email</label>
                <input type="text" name="email" value="{{ $office->email }}" placeholder="info@example.com">
            </div>
            <div class="eight field wide">
                <label>Mobile</label>
                <input type="text" name="mobile" value="{{ $office->mobile }}" placeholder="12345667">
            </div>
        </div>

        <div class="fields">
            <div class="eight wide field">
                <label>Manager Name</label>
                <input type="text" name="manager" value="{{ $office->manager }}" placeholder="Manager name if any">
            </div>
            <div class="four wide field">
                <label>Tel</label>
                <input type="text" name="tel" value="{{ $office->tel }}" placeholder="Telephone Number">
            </div>
            <div class="four wide field">
                <label>Fax</label>
                <input type="text" name="fax" value="{{ $office->fax }}" placeholder="Fax Number">
            </div>
        </div>

        <div class="field">
            <label>Week Days</label>
            <input type="text" name="open_days" value="{{ $office->open_days }}" placeholder="8:00 am to 1:00 pm / 4:00 pm to 8:00pm">
        </div>

        <div class="field">
            <label>Thursday</label>
            <input type="text" name="thursday" value="{{ $office->thursday }}" placeholder="8:00 am to 1:30 pm">
        </div>

        <div class="field">
            <label>Friday</label>
            <input type="text" name="friday" value="{{ $office->friday }}" placeholder="Open every Friday from 4:00 pm to 8:00pm">
        </div>

        <div class="field">
            <label>Google Map Iframe</label>
            <input type="text" name="map" value="{{ $office->map }}" placeholder="Paste google map iframe URL here">
        </div>

        <div class="field">
            <label>Direction Map</label>
            <input type="text" name="direction_map" value="{{ $office->direction_map }}" placeholder="Paste google map direction URL">
        </div>

        <div class="mt-10">
            <button type="submit" class="ui button" tabindex="0">Update</button>
        </div>


    </form>
    <div class="absolute right-0 bottom-0">
        <delete-record :id="{{$branch->id}}" model="branches" :id2={{$office->id}} model2="offices"></delete-record>
    </div>
</div>



@endsection
