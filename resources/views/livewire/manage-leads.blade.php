<div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th colspan="5">
                    <div class="ui secondary menu ">
                        <div class="right menu fitted">
                            <form wire:submit.prevent="downloadLead" action="/manage/leads/download" method="post" class="flex items-center space-x-4">
                                <div class="ui icon input">
                                    <input wire:model="term" type="text" placeholder="Search by name & email...">
                                    <i class="search icon"></i>
                                </div>

                                <div class="flex items-center space-x-4 ui input">
                                    <select wire:model="days" wire:change="filterLeadsByDays" class="ui dropdown">
                                        <option value="1">Last 24 hours</option>
                                        <option value="7">Last 6 days</option>
                                        <option value="15">Last 15 days</option>
                                        <option value="30">Last 30 days</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>

                                <button type="submit" class="ui labeled icon button">
                                    <i class="download icon"></i>
                                    Download
                                </button>
                            </form>
                        </div>
                      </div>
                </th>
            </tr>
        </thead>
        <thead>
          <tr>
            <th>Title</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($leads as $lead)
            <tr>
                <td>{{$lead->title}}</td>
                <td>
                    <a href="/manage/leads/{{$lead->id}}">
                        {{ $lead->first_name }}
                        {{ $lead->last_name }}
                    </a>
                </td>
                <td> {{ $lead->email ? $lead->email : "---" }} </td>
                <td> {{$lead->date_for_humans}} </td>
                <td>
                    <div class="ui mini buttons">
                        <a href="/manage/leads/{{$lead->id}}" class="ui button">View</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    No Record Found.
                </td>
            </tr>
            @endforelse
            @if($leads->hasPages())
            <tr>
                <td colspan="5">
                    {{$leads->links()}}
                </td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
