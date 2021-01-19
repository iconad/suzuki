<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ManageLeads extends Component
{

    use WithPagination;

    public $type = null;
    public $days = 1;
    public $term = null;

    protected $listeners = ['refreshLeads' => '$refresh'];

    public function mount($type) {

        $this->type = $type;
        $this->days = 'all';

    }

    public function filterLeadsByDays () {
        $this->resetPage();
    }

    public function downloadLead () {

        if($this->days == 'all'){
            $leads = Lead::where('type', $this->type)->get();
            $fileName = "complete-lead-list-of-$this->type.csv";
        }else{
            $leads = Lead::where('type', $this->type)->where('created_at','>=',Carbon::now()->subdays($this->days))->get();
            $fileName = "$this->type-leads-last-$this->days-days.csv";
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        if($this->type == 'newsletter') {
            $callback = $this->getNewsletterLeads($leads);
        }
        elseif($this->type == 'commitments') {
            $callback = $this->getCommitmentsLeads($leads);
        }
        elseif($this->type == 'contact-us') {
            $callback = $this->getContactLeads($leads);
        }
        elseif($this->type == 'services') {
            $callback = $this->getServicesLeads($leads);
        }
        elseif($this->type == 'geniune-part') {
            $callback = $this->getGeniunePartLeads($leads);
        }
        elseif($this->type == 'quotations') {
            $callback = $this->getQuotationsLeads($leads);
        }
        elseif($this->type == 'accessory-quotations') {
            $callback = $this->getAccessoryQuotationsLeads($leads);
        }
        elseif($this->type == 'test-drive') {
            $callback = $this->getTestDriveLeads($leads);
        }

        return response()->stream($callback, 200, $headers);

    }

    public function getNewsletterLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = $lead->date_for_humans;

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getCommitmentsLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getContactLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getServicesLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getGeniunePartLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getQuotationsLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getAccessoryQuotationsLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Email', 'Age', 'Showroom', 'Purchase Type', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Showroom']  = $lead->showroom;
            $row['Purchase Type']  = $lead->purchase_type;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Title'], $row['First Name'], $row['Last Name'], $row['Email'], $row['Age'], $row['Showroom'], $row['Purchase Type'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getTestDriveLeads ($leads) {
        $columns = array('Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Age', 'Emirate', 'Showroom', 'Model', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Emirate']  = $lead->emirate;
            $row['Showroom']  = $lead->showroom;
            $row['Model']  = $lead->model;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Age'],
                $row['Emirate'],
                $row['Showroom'],
                $row['Model'],
                $row['Date']
            ));
        }
        fclose($file);
        };
        return $callback;
    }

    public function render()
    {
        if($this->days != 'all') {
            $leads = Lead::search('email', $this->term)
                ->where('type', $this->type)
                ->where('created_at','>=',Carbon::now()
                ->subdays($this->days))
                ->paginate(20);
        }else{
            $leads = Lead::search('email', $this->term)
                ->where('type', $this->type)
                ->paginate(20);
        }
        return view('livewire.manage-leads', [
            'leads' => $leads
        ]);
    }
}
