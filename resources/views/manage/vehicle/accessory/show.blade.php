@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/cms/vehicles" class="section">Vehicles</a>
        <div class="divider"> / </div>
        <a href="/cms/vehicles/{{$vehicle->id}}" class="section">{{$vehicle->id}}</a>
        <div class="divider"> / </div>
        <a href="/cms/vehicles/{{$vehicle->id}}/accessories" class="section"> Accessories </a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="/cms/vehicles/{{$vehicle->id}}/accessories/{{$accessory->id}}" method="post" enctype="multipart/form-data">
        {{method_field('PUT')}}
        @csrf
        <h3 class="ui header">Add New Accessory</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>Title *</label>
            <input type="text" name="title" value="{{$accessory->title}}" placeholder="Title / Name">
        </div>

        <div class="field">
            <label>SKU *</label>
            <input type="text" name="sku" value="{{$accessory->sku}}" placeholder="75901M79M50">
        </div>

        <div class="field">
            <label>Weight *</label>
            <input type="text" name="weight" value="{{$accessory->weight}}" placeholder="2.4">
        </div>

        <div class="field">
            <label>Length *</label>
            <input type="text" name="length" value="{{$accessory->length}}" placeholder="72">
        </div>

        <div class="field">
            <label>widh *</label>
            <input type="text" name="width" value="{{$accessory->width}}" placeholder="51">
        </div>

        <div class="field">
            <label>Height *</label>
            <input type="text" name="height" value="{{$accessory->height}}" placeholder="8">
        </div>

        <div class="field">
            <label>Color *</label>
            <input type="text" name="color" value="{{$accessory->color}}" placeholder="Color Name">
        </div>

        <div class="field">
            <label>Category</label>
            <select name="category" class="ui fluid dropdown">
                @foreach ($categories as $category)
                @if ($category->id == $accessory->accessory_category_id)
                <option selected value="{{$category->id}}">{{$category->title}}</option>
                @else
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="field">
            <label>Change Thumbnail</label>

            <div class="ui small image mb-4">
                <img src="{{$thumbnail}}">
            </div>

            <input type="file" name="thumbnail">
        </div>

        <div class="field">
            <label>Short Description</label>
            <textarea rows="3" name="excerpt" placeholder="Short Description">{{$accessory->excerpt}}</textarea>
        </div>

        <div class="field">
            <label>Description</label>
            <textarea rows="6" name="detail" placeholder="Description">{{$accessory->detail}}</textarea>
        </div>

        @php
            $status = [0, 1];
        @endphp
        <div class="ui form">
            <div class="inline fields">
              <label for="fruit">Status</label>
              @foreach ($status as $sts)
              <div class="field">
                <div class="ui radio checkbox">
                  @if ($accessory->status == $sts)
                  <input checked type="radio" name="status" id="{{$sts}}" value="0" tabindex="0">
                  @else
                  <input type="radio" name="status" id="0" value="{{$sts}}" tabindex="0">
                  @endif
                  <label class="cursor-pointer capitalize" for="{{$sts}}">
                    {{$sts == 0 ? 'Draft' : 'Published'}}
                </label>
                </div>
              </div>
              @endforeach

            </div>
          </div>



        <button type="submit" class="ui button" tabindex="0">Submit</button>
    </form>
    <div class="absolute bottom-0 right-0">
        <form method="post" action="/cms/vehicles/{{$vehicle->id}}/accessories/{{$accessory->id}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="ui button red mt-5" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>

@endsection
