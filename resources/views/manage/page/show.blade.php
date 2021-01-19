@extends('manage.layouts.app')
@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/manage/pages" class="section">Pages</a>
        <div class="divider"> / </div>
        <div class="active section">{{$page->id}}</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="{{route('pages.update', $page->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <h3 class="ui header">{{$page->title}}</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>COPY URL</label>
            <div class="flex items-center space-x-4">
                <span class="bg-gray-100 p-2 px-3 rounded text-lg">{{ url('/page',$page->slug) }}</span>
                <a href="{{ url('/page',$page->slug) }}" target="_blank" class="hover:underline">Visit Page <i class="linkify icon"></i> </a>
            </div>
        </div>

        <div class="field mb-5">
            <label>Title *</label>
            <input type="text" name="title" required value="{{$page->title}}" placeholder="Title / Name">
        </div>

        <div class="field mb-5">
            <label>Change URL *</label>
            <input type="text" name="slug" required value="{{$page->slug}}" placeholder="change url">
        </div>

        <div class="field">
            <label>Change cover</label>

            <div class="ui large image mb-4">
                <img src="{{$cover}}">
            </div>

            <input type="file" name="cover">
        </div>

        <div class="field">
            <label>Content *</label>
            <textarea required rows="10" name="body" placeholder="Detail">{{$page->body}}</textarea>
        </div>

        <button type="submit" class="ui button" tabindex="0">Update</button>
    </form>
    <div class="absolute right-0 bottom-0">
        <delete-record :id="{{$page->id}}" model="pages"></delete-record>
    </div>
</div>

@endsection
