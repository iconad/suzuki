@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a class="section">Vehicles</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('vehicles.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Add New Vehicle</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title / Name *</label>
        <input type="text" name="title" value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Sub Title</label>
        <input type="text" name="sub_title" value="{{old('sub_title')}}" placeholder="Tag line / Sub Title">
    </div>

    <div class="field">
        <label>360 IFrame URL</label>
        <input type="url" name="iframe" value="{{old('iframe')}}" placeholder="https://iframe-url.com">
    </div>

    <div class="field">
        <label>Price</label>
        <input type="number" name="price" value="{{old('price')}}" placeholder="44,000">
    </div>

    <div class="field">
        <label>Thumbnail</label>
        <input type="file" name="thumbnail">
    </div>

    <div class="field">
        <label>Shawroom Slide Image</label>
        <input type="file" name="showroom_image">
    </div>

    <div class="field">
        <label>Logo</label>
        <input type="file" name="logo">
    </div>

    <div class="field">
        <label>Detail</label>
        <textarea name="detail" value="{{old('detail')}}" placeholder="Short Detail">
        </textarea>
    </div>

    <div class="field">
        <label>HTML Content</label>
        <textarea rows="15" name="html_content" value="{{old('html_content')}}" placeholder="Paste HTML code">
        </textarea>
    </div>



    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
