@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a class="section">Accessory Categories</a>
    </div>
</div>

<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header"> Accessory Categories</h3>
    </span>
    <div class="right menu fitted">
      <a href="/manage/accessory-categories/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @if ($categories->count() == 0)
            <tr>
                <td colspan="4">No record found!</td>
            </tr>
            @endif
            @foreach ($categories as $category)
            <tr>
                <td>
                    <a href="/manage/accessory-categories/{{$category->id}}"> {{$category->title}} </a>
                </td>
                <td>
                    @if ($category->status == 1)
                        Published
                    @else
                        Draft
                    @endif
                </td>
                <td>
                    <div class="ui basic mini buttons">
                        <a href="/manage/accessory-categories/{{$category->id}}/" class="ui button">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
