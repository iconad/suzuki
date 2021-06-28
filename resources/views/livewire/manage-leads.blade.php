<div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th colspan="7">
                    <div class="ui secondary menu ">
                        <div class="right menu fitted">
                            <form wire:submit.prevent="downloadLead" class="flex items-center space-x-4">
                                <div class="ui icon input">
                                    <input wire:model="term" type="text" placeholder="Search by email">
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
            <th>TID</th>
            <th>Title</th>
            <th>Name</th>
            <th>Email</th>
            <th>Signed up emails</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($leads as $lead)
            <tr>
                <td> {{$lead->id}} </td>

                <td>

                    @if ($lead->title)
                        {{$lead->title}}
                    @else
                        <span class="ml-5">-</span>
                    @endif

                </td>
                <td>
                    <a href="/cms/leads/{{$lead->id}}">
                        {{ $lead->first_name }}
                        {{ $lead->last_name }}
                    </a>
                </td>
                <td> {{ $lead->email ? $lead->email : "---" }} </td>
                <td> {{($lead->check_for_email === 1) ? 'Yes' : 'No'}} </td>
                <td> {{$lead->date_for_humans}} </td>
                <td>
                    <div class="ui mini buttons">
                        <a href="/cms/leads/{{$lead->id}}" class="ui button">View</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">
                    No Record Found.
                </td>
            </tr>
            @endforelse
            @if($leads->hasPages())
            <tr>
                <td colspan="7">
                    {{$leads->links()}}
                </td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
