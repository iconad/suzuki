@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section">Media</div>
    </div>
</div>

<div class="border p-5 border-gray-300">
    <form class="ui form" action="/cms/media/store" method="post" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label>Image</label>
            <input type="file" name="image" required>
        </div>

        <div class="field">
            <button type="submit" class="ui button" tabindex="0">Add</button>
        </div>

    </form>


</div>

{{-- <div class="flex items-center justify-between">
    <a href="/cms/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">Media</h3>
    </span>
    {{-- <div class="right menu fitted">
      <a href="/cms/recall-announcements/create" class="ui button item">
        Add New
      </a>
    </div> --}}
  </div>

<div class="branches">
    <table class="ui celled table">
        <thead>
          <tr>
            <th>ID</th>
            <th>URL To Copy</th>
            <th>Image</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (count($media) != 0)
        <tbody>
            @foreach ($media as $med)
            <tr>
                <td> {{ $med->name}} </td>
                <td class="flex items-center space-x-4">
                    <span>{{ url("/storage/$med->id/$med->file_name/") }}</span>
                    {{-- <a href="{{ url("/storage/$med->id/$med->file_name/") }}" target="_blank" class="theme-link text-red-500">View image</a> --}}
                </td>
                <td>
                    <img src="{{ url("/storage/$med->id/$med->file_name/") }}" alt="image" class="w-24 bg-gray-500">
                </td>
                <td> {{ $med->created_at->format('d M, Y')}} </td>
                <td>
                    <div class="">
                        <form method="post" action="/cms/media/{{$med->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="ui small red button" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @if($media->hasPages())
            <tr>
                <td colspan="4">
                    {{$media->links()}}
                </td>
            </tr>
            @endif
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
