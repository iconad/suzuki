@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Branches</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/manage/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Branches</h3>
    </span>
    <div class="right menu fitted">
      <a href="/cms/branches/create" class="ui button item">
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
            <th>Manager</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
            <tr>
                <td>
                    <a href="branches/{{$branch->id}}">{{$branch->title}}</a>
                </td>
                <td> {{ $branch->email ? $branch->email : "---" }} </td>
                <td> {{ $branch->manager ? $branch->manager : "---" }} </td>
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
