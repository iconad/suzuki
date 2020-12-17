@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Newsletter</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/manage/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Newsletter Signups</h3>
    </span>
    <div class="right menu fitted">
      <a href="/manage/branches/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Email</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
            <tr>
                <td>
                    <a href="branches/{{$lead->id}}">{{$lead->title}}</a>
                </td>
                <td> {{ $lead->email ? $lead->email : "---" }} </td>
                <td> {{ $lead->created_at ? $lead->created_at : "---" }} </td>
                <td>
                    <div class="ui inverted red mini buttons">
                        <div class="ui button">Delete</div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
