@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Pages</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/manage/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Pages</h3>
    </span>
    <div class="right menu fitted">
      <a href="/manage/pages/create" class="ui button item">
        Add New
      </a>
    </div>
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>Title</th>
            <th>URL</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (count($pages) != 0)
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>
                    <a class="capitalize" href="pages/{{$page->id}}">{{$page->title}}</a>
                </td>
                <td class="flex items-center space-x-3">
                    <span class="bg-gray-100 block px-3 rounded text-lg">{{ url('/page',$page->slug) }}</span>
                    <a href="{{ url('/page',$page->slug) }}" target="_blank" class="rounded-full inline-block transition border border-gray-500 bg-gray-500 hover:bg-transparent px-3 text-gray-100">Visit Page <i class="linkify icon"></i> </a>
                </td>
                <td> {{ $page->status == 1 ? 'Published' : 'Draft' }} </td>
                <td>
                    <div class="ui basic mini buttons">
                        <a href="pages/{{$page->id}}" class="ui button">Edit</a>
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
