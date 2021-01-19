@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/manage/accessory-categories" class="section">Categories</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('accessory-categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Add New Category</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title *</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Category</label>
        <select name="type" class="ui fluid dropdown">
            <option value="interior">Interior</option>
            <option value="exterior">Exterior</option>
        </select>
    </div>


    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
