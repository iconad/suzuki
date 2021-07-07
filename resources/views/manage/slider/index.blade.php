@extends('manage.layouts.app')

@section('content')

{{-- {{ Breadcrumbs::render('manage.sliders') }} --}}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        <span>Sliders</span>
        <a href="{{route('sliders.create')}}" class="text-sm block theme-link">Add New Slider</a>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="ui celled table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Cover</th>
                <th>mobile</th>
                <th>link</th>
                <th>Date Created</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                @foreach ($sliders as $slider)
                <tr>
                    <td>
                        <p class="text-gray-700">{{$slider->id}}</p>
                    </td>
                    <td>
                        <p class="text-gray-700">{{$slider->title}} </p>
                    </td>
                    <td>
                        @if (count($slider->getMedia('desktop-home-cover')) != 0)

                            <img class="w-32" src="{{"/storage/".$slider->getMedia('desktop-home-cover')[0]->id."/".$slider->getMedia('desktop-home-cover')[0]->file_name}}" alt="">
                        @else
                        NO IMAGE
                        @endif
                    </td>
                    <td>
                        @if (count($slider->getMedia('mobile-home-cover')) != 0)
                            <img class="w-16" src="{{"/storage/".$slider->getMedia('mobile-home-cover')[0]->id."/".$slider->getMedia('mobile-home-cover')[0]->file_name}}" alt="">
                        @else
                        NO IMAGE
                        @endif
                    </td>
                    {{-- <td>
                        <p class="text-gray-700">{{ $slider->type }}</p>
                    </td> --}}
                    <td>
                        <p class="text-gray-700">{{$slider->link ? $slider->link : 'no link'}} </p>
                    </td>
                    <td>
                        <p class="text-gray-700">{{date('d M, Y', strtotime($slider->created_at))}}</p>
                    </td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="ui small buttons">
                                <a href="sliders/{{$slider->id}}" class="ui button">Edit</a>
                            </div>
                            <form method="post" action="/cms/sliders/{{$slider->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="ui small red button" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
