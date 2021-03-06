@extends('manage.layouts.app')

@section('content')

<div class="mb-5">
    <div class="ui breadcrumb">
        <a class="section">Dashboard</a>
        <div class="divider"> / </div>
        <div class="active section capitalize">{{$lead->type}}</div>
    </div>
</div>

{{-- <div class="flex items-center justify-between">
    <a href="/cms/" class="ui header">Add New</a>
</div> --}}
<div class="ui secondary menu">
    <span class="item fitted">
        <h3 class="ui header">
            {{$lead->first_name}}
            {{$lead->last_name}}
        </h3>
    </span>
  </div>

  <div class="mt-10">
    <table class="ui celled table">
        <thead>
            <tr>
                <th colspan="2">
                    <span class="capitalize"> {{str_replace("-", " ", $lead->type)}} </span>
                    <span class="capitalize">#{{$lead->id}}</span>
                </th>
            </tr>
        </thead>
        <tbody>

        <tr>
            <td data-label="TID" width="300px">
                <span class="font-bold">TID</span>
            </td>
            <td data-label="Job">
                {{$lead->id}}
            </td>
        </tr>

        @if ($lead->first_name)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold">Fist Name</span>
            </td>
            <td data-label="Job">
                {{-- <a href="/cms/users/{{$lead->user->id}}">{{$lead->first_name}} <i class="icon user"></i> </a> --}}
                {{$lead->first_name}}
            </td>
        </tr>
        @endif

        @if ($lead->last_name)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold">Last Name</span>
            </td>
            <td data-label="Job">{{$lead->last_name}}</td>
        </tr>
        @endif

        @if ($lead->email)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold">Email</span>
            </td>
            <td data-label="Job">{{$lead->email}}</td>
        </tr>
        @endif

        @if ($lead->age)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">age</span>
            </td>
            <td data-label="Job">{{$lead->age}}</td>
        </tr>
        @endif

        @if ($lead->mobile)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">mobile</span>
            </td>
            <td data-label="Job">{{$lead->mobile}}</td>
        </tr>
        @endif

        @if ($lead->tel)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Phone</span>
            </td>
            <td data-label="Job">{{$lead->tel}}</td>
        </tr>
        @endif

        @if ($lead->emirate)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Emirate</span>
            </td>
            <td data-label="Job">{{$lead->emirate}}</td>
        </tr>
        @endif

        @if ($lead->showroom)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Showroom</span>
            </td>
            <td data-label="Job">{{$lead->showroom}}</td>
        </tr>
        @endif

        @if ($lead->location)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">location</span>
            </td>
            <td data-label="Job">{{$lead->location}}</td>
        </tr>
        @endif

        @if ($lead->chassis)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Chassis Number</span>
            </td>
            <td data-label="Job">{{$lead->chassis}}</td>
        </tr>
        @endif

        @if ($lead->registration)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Registration Number</span>
            </td>
            <td data-label="Job">{{$lead->registration}}</td>
        </tr>
        @endif

        @if ($lead->model)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">model</span>
            </td>
            @if(is_numeric($lead->model))
            <td data-label="Job">{{$lead->vehicle->title}}</td>
            @else
            <td data-label="Job">{{$lead->model}}</td>
            @endif
        </tr>
        @endif


        @if ($lead->hear)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">How did you hear about us?</span>
            </td>
            <td data-label="Job">{{$lead->hear}}</td>
        </tr>
        @endif

        @if ($lead->year)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">year</span>
            </td>
            <td data-label="Job">{{$lead->year}}</td>
        </tr>
        @endif

        @if ($lead->service_type)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">service type</span>
            </td>
            <td data-label="Job">{{$lead->service_type}}</td>
        </tr>
        @endif

        @if ($lead->service_date)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">service date</span>
            </td>
            <td data-label="Job">{{$lead->service_date}}</td>
        </tr>
        @endif

        @if ($lead->branch)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Branch</span>
            </td>
            <td data-label="Job">{{$lead->branch}}</td>
        </tr>
        @endif

        @if ($lead->detail)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">detail</span>
            </td>
            <td data-label="Job">{{$lead->detail}}</td>
        </tr>
        @endif

        @if ($lead->purchase_type)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">purchase type</span>
            </td>
            <td data-label="Job">{{$lead->purchase_type}}</td>
        </tr>
        @endif

        @if ($lead->cart)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Cart</span>
            </td>
            <td data-label="Job">
                <lead-cart :cart="{{$lead->cart}}"></lead-cart>
            </td>
        </tr>
        @endif

        <tr>
            <td width="300px">
                <span class="font-bold capitalize">Signed up emails</span>
            </td>
            <td>{{($lead->check_for_email === 1) ? 'Yes' : 'No'}}</td>
        </tr>

        @if ($lead->created_at)
        <tr>
            <td data-label="Name" width="300px">
                <span class="font-bold capitalize">Date</span>
            </td>
            <td data-label="Job">{{date('d M, Y', strtotime($lead->created_at))}}</td>
        </tr>
        @endif



        </tbody>
      </table>
      <a href="/cms/leads/type/{{$lead->type}}" class="ui button">Go Back &nbsp; <i class="icon hand point left"></i></a>
  </div>



@endsection
