@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a href="/manage/recall-announcements" class="section">Pages</a>
        <div class="divider"> / </div>
        <div class="active section">Create</div>
    </div>
</div>

<form class="ui form" action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3 class="ui header">Create New Page</h3>
    <div class="ui divider"></div>

    <div class="field">
        <label>Title *</label>
        <input type="text" name="title" required value="{{old('title')}}" placeholder="Title / Name">
    </div>

    <div class="field">
        <label>Cover</label>
        <input type="file" name="cover">
    </div>

    <div class="field">
        <label>Content</label>
        <textarea required rows="10" name="body" placeholder="Detail"></textarea>
    </div>

    <button type="submit" class="ui button" tabindex="0">Submit</button>
</form>

@endsection
