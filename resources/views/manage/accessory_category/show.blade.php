@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/cms/accessory-categories" class="section">Categories</a>
        <div class="divider"> / </div>
        <div class="active section">{{$accessoryCategory->id}}</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="{{route('accessory-categories.update', $accessoryCategory->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <h3 class="ui header">{{$accessoryCategory->title}}</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>Title *</label>
            <input type="text" name="title" value="{{ $accessoryCategory->title }}" placeholder="Title / Name">
        </div>

        @php
            $types = ['interior', 'exterior'];
        @endphp

        <div class="field">
            <label>Category</label>
            <select name="type" class="ui fluid dropdown">
                @foreach ($types as $type)
                    @if ($accessoryCategory->type == $type)
                        <option selected value="{{$type}}">{{$type}}</option>
                    @else
                        <option value="{{$type}}">{{$type}}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <button type="submit" class="ui button" tabindex="0">Submit</button>
    </form>
    <div class="absolute bottom-0 right-0">
        <form method="post" action="/cms/accessory-categories/{{$accessoryCategory->id}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="ui button red mt-5" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>

@endsection
