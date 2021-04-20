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

<form class="ui form" action="/cms/branches/{{$branch->id}}/offices" method="post" >
    @csrf
    <h3 class="ui header">Adding <span class="">{{ app('request')->input('type') }}</span> location to {{$branch->title}} branch</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title / Name *</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
        <input type="hidden" name="type" value="{{ app('request')->input('type') }}" >
    </div>

    <div class="fields">
        <div class="eight field wide">
            <label>Email</label>
            <input type="text" name="email" value="{{old('email')}}" placeholder="info@example.com">
        </div>
        <div class="eight field wide">
            <label>Mobile</label>
            <input type="text" name="mobile" value="{{old('mobile')}}" placeholder="info@example.com">
        </div>
    </div>

    <div class="fields">
        <div class="eight wide field">
            <label>Manager Name</label>
            <input type="text" name="manager" value="{{old('manager')}}" placeholder="Manager name if any">
        </div>
        <div class="four wide field">
            <label>Tel</label>
            <input type="text" name="tel" value="{{old('tel')}}" placeholder="Telephone Number">
        </div>
        <div class="four wide field">
            <label>Fax</label>
            <input type="text" name="fax" value="{{old('fax')}}" placeholder="Fax Number">
        </div>
    </div>

    <div class="field">
        <label>Week Days</label>
        <input type="text" name="open_days" value="{{old('open_days')}}" placeholder="8:00 am to 1:00 pm / 4:00 pm to 8:00pm">
    </div>

    <div class="field">
        <label>Thursday</label>
        <input type="text" name="thursday" value="{{old('thursday')}}" placeholder="8:00 am to 1:30 pm">
    </div>

    <div class="field">
        <label>Friday</label>
        <input type="text" name="friday" value="{{old('friday')}}" placeholder="Open every Friday from 4:00 pm to 8:00pm">
    </div>

    <div class="field">
        <label>Google Map Iframe</label>
        <input type="text" name="map" value="{{old('map')}}" placeholder="Paste google map iframe URL here">
    </div>

    <div class="field">
        <label>Google Map Iframe</label>
        <input type="text" name="direction_map" value="{{old('direction_map')}}" placeholder="Paste google map direction URL here">
    </div>

    <button type="submit" class="ui button" tabindex="0">Add</button>
</form>

@endsection
