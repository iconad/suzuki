@extends('manage.layouts.app')

@section('content')

    <div class="mb-5">
        <div class="ui breadcrumb">
            <a class="section">Dashboard</a>
            <div class="divider"> / </div>
            <a href="/manage/vehicles/" class="section">Vehicles</a>
            <div class="divider"> / </div>
            <div class="active section">{{$vehicle->id}}</div>
        </div>
    </div>

    <div class="relative">
        <form class="ui form" action="{{route('vehicles.update', $vehicle->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <h3 class="ui header">{{$vehicle->title}}</h3>
            <div class="ui divider"></div>

            <div class="field">
                <label>Title / Name *</label>
                <input type="text" name="title" value="{{$vehicle->title}}" placeholder="Title / Name">
            </div>

            <div class="field">
                <label>Sub Title</label>
                <input type="text" name="sub_title" value="{{$vehicle->sub_title}}" placeholder="Tag line / Sub Title">
            </div>

            <div class="field">
                <label>360 IFrame URL</label>
                <input type="url" name="iframe" value="{{$vehicle->iframe}}" placeholder="https://iframe-url.com">
            </div>

            <div class="field">
                <label>Price</label>
                <input type="number" name="price" value="{{$vehicle->price}}" placeholder="44,000">
            </div>

            <div class="field">
                <label>Change Thumbnail</label>

                <div class="ui small image mb-4">
                    <img src="{{$thumbnail}}">
                </div>

                <input type="file" name="thumbnail">
            </div>

            <div class="field">
                <label>Change Shawroom Slide Image</label>
                <div class="ui small image mb-4">
                    <img src="{{$showroom}}">
                </div>

                <input type="file" name="showroom_image">
            </div>

            <div class="field">
                <label>Change Logo</label>
                <div class="ui small image mb-4">
                    <div class="bg-gray-400 p-2">
                        <img src="{{$logo}}">
                </div>
                </div>

                <input type="file" name="logo">
            </div>

            <div class="field">
                <label>Detail</label>
                <textarea name="detail" placeholder="Short Detail">
                    {{$vehicle->body}}
                </textarea>
            </div>

            <div class="field">
                <label>HTML Content</label>
                <textarea rows="15" name="html_content" placeholder="Paste HTML code">
                    {!! $vehicle->html_content !!}
                    {{-- {!!html_entity_decode($vehicle->html_content)!!} --}}
                </textarea>
            </div>



            <button type="submit" class="ui button" tabindex="0">Submit</button>
        </form>
        <div class="absolute bottom-0 right-0">
            <form method="post" action="/manage/vehicles/{{$vehicle->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="ui button red mt-5" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="my-10">
        <div class="ui divider"></div>
    </div>

    <div class="ui secondary menu">
        <span class="item fitted">
            <h3 class="ui header">{{$vehicle->title}}' files</h3>
        </span>
        <div class="right menu fitted">
          <a href="/manage/vehicles/{{$vehicle->id}}/file-upload" class="ui button item">
            Add New File
          </a>
        </div>
      </div>



@endsection
