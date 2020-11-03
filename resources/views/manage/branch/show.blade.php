@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <a class="section">Branches</a>
        <div class="divider"> / </div>
        <div class="active section">{{$branch->title}}</div>
    </div>
</div>

<div class="relative">
    <form class="ui form" action="{{route('branches.update', $branch->id)}}" method="post" >
        {{method_field('PUT')}}
        @csrf
        <h3 class="ui header">{{$branch->title}}</h3>
        <div class="ui divider"></div>

        <div class="field">
            <label>Title / Name *</label>
            <input type="text" name="title" value="{{ $branch->title }}" placeholder="Title / Name">
        </div>

        <div class="field">
            <label>Email</label>
            <input type="text" name="email" value="{{ $branch->email }}" placeholder="info@example.com">
        </div>

        <div class="fields">
            <div class="eight wide field">
                <label>Manager Name</label>
                <input type="text" name="manager" value="{{ $branch->manager }}" placeholder="Manager name if any">
            </div>
            <div class="four wide field">
                <label>Tel</label>
                <input type="text" name="tel" value="{{ $branch->tel }}" placeholder="Telephone Number">
            </div>
            <div class="four wide field">
                <label>Fax</label>
                <input type="text" name="fax" value="{{ $branch->fax }}" placeholder="Fax Number">
            </div>
        </div>

        <button type="submit" class="ui button" tabindex="0">Update</button>
    </form>
    <div class="absolute right-0 bottom-0">
        <delete-record :id="{{$branch->id}}" model="branches"></delete-record>
    </div>
</div>

<div class="border rounded p-5 mt-10">
    <div class="content">
      <h4 class="ui header">{{$branch->title}}'s Locations</h4>
      <div class="meta">
        <div class="ui divider"></div>
            <table class="ui celled table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Map</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if ($branch->showroom_a->count() != 0)
                    <tr>
                        <td>
                            <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->showroom_a[0]->id}}?type=showroom">{{$branch->showroom_a[0]->title}}</a>
                        </td>
                        <td class="capitalize">{{ $branch->showroom_a[0]->type}}</td>
                        <td>{{ $branch->showroom_a[0]->email ? $branch->showroom_a[0]->email : "---" }}</td>
                        <td>{{ $branch->showroom_a[0]->tel ? $branch->showroom_a[0]->tel : "---" }}</td>
                        <td>{{ $branch->showroom_a[0]->map ? "Yes" : "No" }}</td>
                        <td>
                            <div class="ui basic mini buttons">
                                <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->showroom_a[0]->id}}?type=showroom" class="ui button">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>
                            <button class="ui basic mini button">
                                <i class="plus icon"></i>
                                <h4 class="ui header inline">
                                    <a href="/manage/branches/{{ $branch->id }}/offices/create?type=showroom">Add Showroom</a>
                                </h4>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @if ($branch->services_a->count() != 0)
                    <tr>
                        <td>
                            <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->services_a[0]->id}}">{{$branch->services_a[0]->title}}</a>
                        </td>
                        <td class="capitalize">{{ $branch->services_a[0]->type}}</td>
                        <td>{{ $branch->services_a[0]->email ? $branch->services_a[0]->email : "---" }}</td>
                        <td>{{ $branch->services_a[0]->tel ? $branch->services_a[0]->tel : "---" }}</td>
                        <td>{{ $branch->services_a[0]->map ? "Yes" : "No" }}</td>
                        <td>
                            <div class="ui basic mini buttons">
                                <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->services_a[0]->id}}?type=services" class="ui button">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">
                            <button class="ui basic mini button">
                                <i class="plus icon"></i>
                                <h4 class="ui header inline">
                                    <a href="/manage/branches/{{ $branch->id }}/offices/create?type=services">Add Services</a>
                                </h4>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @if ($branch->parts_a->count() != 0)
                    <tr>
                        <td>
                            <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->parts_a[0]->id}}?type=showroom">{{$branch->parts_a[0]->title}}</a>
                        </td>
                        <td class="capitalize">{{ $branch->parts_a[0]->type}}</td>
                        <td>{{ $branch->parts_a[0]->email ? $branch->parts_a[0]->email : "---" }}</td>
                        <td>{{ $branch->parts_a[0]->tel ? $branch->parts_a[0]->tel : "---" }}</td>
                        <td>{{ $branch->parts_a[0]->map ? "Yes" : "No" }}</td>
                        <td>
                            <div class="ui basic mini buttons">
                                <a href="/manage/branches/{{$branch->id}}/offices/{{$branch->parts_a[0]->id}}?type=parts" class="ui button">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">
                            <button class="ui basic mini button">
                                <i class="plus icon"></i>
                                <h4 class="ui header inline">
                                    <a href="/manage/branches/{{ $branch->id }}/offices/create?type=parts">Add Parts</a>
                                </h4>
                            </button>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
