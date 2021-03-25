@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Vehicles</div>
    </div>
</div>

<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Vehicles</h3>
    </span>
    <div class="right menu fitted">
      <a href="/cms/vehicles/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>price</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @if ($vehicles->count() == 0)
            <tr>
                <td colspan="4">No record found!</td>
            </tr>
            @endif
            @foreach ($vehicles as $vehicle)
            <tr>
                <td>
                    <a href="/cms/vehicles/{{$vehicle->id}}"> {{$vehicle->title}} </a>
                </td>
                <td> {{$vehicle->price}} </td>
                <td>
                    @if ($vehicle->status == 1)
                        Published
                    @else
                        Draft
                    @endif
                </td>
                <td>
                    <div class="ui basic mini buttons">
                        <a href="/cms/vehicles/{{$vehicle->id}}" class="ui button">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
