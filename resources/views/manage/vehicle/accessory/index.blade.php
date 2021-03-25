@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/cms/vehicles" class="section">vehicles</a>
        <div class="divider"> / </div>
        <a href="/cms/vehicles/{{$vehicle->id}}" class="section">{{$vehicle->id}}</a>
        <div class="divider"> / </div>
        <div class="active section">Accessories</div>
    </div>
</div>

<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header"> {{$vehicle->title}} Accessories</h3>
    </span>
    <div class="right menu fitted">
      <a href="/cms/vehicles/{{$vehicle->id}}/accessories/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>SKU</th>
            <th>Title</th>
            <th>Weight</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Image</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @if ($accessories->count() == 0)
            <tr>
                <td colspan="4">No record found!</td>
            </tr>
            @endif
            @foreach ($accessories as $accessory)
            <tr>
                <td>
                    <a href="/cms/vehicles/{{$accessory->id}}"> {{$accessory->title}} </a>
                </td>
                <td> {{$accessory->title}} </td>
                <td> {{$accessory->weight}} </td>
                <td> {{$accessory->length}} </td>
                <td> {{$accessory->width}} </td>
                <td> {{$accessory->height}} </td>
                <td>
                    <img src="{{$accessory->getMedia('thumbnail')->count() != 0 ? $accessory->getMedia('thumbnail')[0]->getUrl() : null}}" class="w-24" alt="image">
                </td>
                <td>
                    @if ($accessory->status == 1)
                        Published
                    @else
                        Draft
                    @endif
                </td>
                <td>
                    <div class="ui basic mini buttons">
                        <a href="/cms/vehicles/{{$vehicle->id}}/accessories/{{$accessory->id}}" class="ui button">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
