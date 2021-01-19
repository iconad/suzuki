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
        <a href="/manage/vehicles/{{$vehicle->id}}/accessories" class="section"> Accessories </a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('accessories.store', $vehicle->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Add New Accessory</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title *</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>SKU *</label>
        <input type="text" name="sku" value="{{old('sku')}}" placeholder="75901M79M50">
    </div>

    <div class="field">
        <label>Weight *</label>
        <input type="text" name="weight" value="{{old('weight')}}" placeholder="2.4">
    </div>

    <div class="field">
        <label>Length *</label>
        <input type="text" name="length" value="{{old('length')}}" placeholder="72">
    </div>

    <div class="field">
        <label>widh *</label>
        <input type="text" name="width" value="{{old('width')}}" placeholder="51">
    </div>

    <div class="field">
        <label>Height *</label>
        <input type="text" name="height" value="{{old('height')}}" placeholder="8">
    </div>

    <div class="field">
        <label>Color *</label>
        <input type="text" name="color" value="{{old('color')}}" placeholder="Color Name">
    </div>

    <div class="field">
        <label>Category</label>
        <select name="category" class="ui fluid dropdown">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="field">
        <label>Thumbnail</label>
        <input type="file" name="thumbnail">
    </div>

    <div class="field">
        <label>Short Description</label>
        <textarea rows="3" name="excerpt" value="{{old('excerpt')}}" placeholder="Short Description">
        </textarea>
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="6" name="detail" value="{{old('description')}}" placeholder="Description">
        </textarea>
    </div>



    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
