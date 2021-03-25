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
        <div class="active section">files</div>
    </div>
</div>

<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Vehicles</h3>
    </span>
    <div class="right menu fitted">
      <a href="/cms/vehicles/{{$vehicle->id}}/files/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @if ($files->count() == 0)
            <tr>
                <td colspan="4">No record found!</td>
            </tr>
            @endif
            @foreach ($files as $file)
            <tr>
                <td>
                    <a href="/cms/vehicles/{{$vehicle->id}}/files/{{$file->id}}"> {{$file->title}} </a>
                </td>
                <td> {{$file->year}} </td>
                <td class="capitalize"> {{$file->type}} </td>
                <td>
                    @if ($vehicle->status == 1)
                        Published
                    @else
                        Draft
                    @endif
                </td>
                <td>
                    <div class="ui basic mini buttons">
                        <div class="ui button">Edit</div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
