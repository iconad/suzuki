@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Recall Announcements</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/cms/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Recall Announcements</h3>
    </span>
    <div class="right menu fitted">
      <a href="/cms/recall-announcements/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Vehicle</th>
            <th>Till Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (count($recalls) != 0)
        <tbody>
            @foreach ($recalls as $recall)
            <tr>
                <td>
                    <a href="recall-announcements/{{$recall->id}}">{{$recall->title}}</a>
                </td>
                <td> {{ $recall->vehicle->title}} </td>
                <td> {{ $recall->till_date}} </td>
                <td>
                    <div class="ui basic mini buttons">
                        <a href="recall-announcements/{{$recall->id}}" class="ui button">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td colspan="4"> 0 Record found. </td>
            </tr>
        </tbody>
        @endif
    </table>
</div>

@endsection
