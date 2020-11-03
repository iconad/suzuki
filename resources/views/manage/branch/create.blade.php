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

<form class="ui form" action="{{route('branches.store')}}" method="post" >
    @csrf
    <h3 class="ui header">Create New Branch</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title / Name *</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Email</label>
        <input type="text" name="email" value="{{old('email')}}" placeholder="info@example.com">
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

    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
