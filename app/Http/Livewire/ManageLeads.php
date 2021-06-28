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
        if($this->type == 'finance-quote') {
            $callback = $this->getFinanceQuoteLeads($leads);
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
        elseif($this->type == 'recall') {
            $callback = $this->getRecallLeads($leads);
        }
        elseif($this->type == 'accessory-quotations') {
            $callback = $this->getAccessoryQuotationsLeads($leads);
        }
        elseif($this->type == 'test-drive') {
            $callback = $this->getTestDriveLeads($leads);
        }
        elseif($this->type == 'quotations') {
            $callback = $this->getQuoteLeads($leads);
        }

        return response()->stream($callback, 200, $headers);

    }

    public function getRecallLeads ($leads) {
        $columns = array('Tracking ID', 'First Name', 'Last Name', 'Mobile', 'Email', 'Chassis', 'Registration', 'Model', 'Year', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']    = $lead->id;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Chassis']  = $lead->chassis;
            $row['Registration']  = $lead->registration;
            $row['Model']  = $lead->model;
            $row['Year']  = $lead->year;
            $row['Date']  = $lead->date_for_humans;

            fputcsv($file, array($row['Tracking ID'], $row['First Name'], $row['Last Name'], $row['Mobile'], $row['Email'], $row['Chassis'], $row['Registration'], $row['Model'], $row['Year'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getNewsletterLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Source of Lead', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = $lead->date_for_humans;

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Source of Lead'],
                $row['Date']
            ));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getFinanceQuoteLeads ($leads) {
        $columns = array('Tracking ID', 'First Name', 'Last Name', 'Mobile', 'Email', 'Model', 'Emirate', 'Source of Lead', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Model']  = $lead->model;
            $row['Emirate']  = $lead->emirate;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = $lead->date_for_humans;

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Model'],
                $row['Emirate'],
                $row['Source of Lead'],
                $row['Date']
            ));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getCommitmentsLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Age', 'VIN', 'Location', 'Source of Lead', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['VIN']  = $lead->vin;
            $row['Location']  = $lead->location;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Age'],
                $row['VIN'],
                $row['Location'],
                $row['Source of Lead'],
                $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getContactLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Date']
            ));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getServicesLeads ($leads) {
        $columns = array(
            'Tracking ID',
            'Title',
            'First Name',
            'Last Name',
            'Mobile',
            'Email',
            'Tel',
            'Age',
            'Emirate',
            'Model',
            'Year',
            'Service Type',
            'Service Date',
            'Branch',
            'Date'
        );

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Tel']  = $lead->tel;
            $row['Age']  = $lead->age;
            $row['Emirate']  = $lead->emirate;
            $row['Model']  = $lead->model;
            $row['Year']  = $lead->year;
            $row['Service Type']  = $lead->service_type;
            $row['Service Date']  = $lead->service_date;
            $row['Branch']  = $lead->showroom;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Tel'],
                $row['Age'],
                $row['Emirate'],
                $row['Model'],
                $row['Year'],
                $row['Service Type'],
                $row['Service Date'],
                $row['Branch'],
                $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getGeniunePartLeads ($leads) {
        $columns = array(
            'Tracking ID',
            'Title',
            'First Name',
            'Last Name',
            'Mobile',
            'Email',
            'Age',
            'Purchase Type',
            'Tel',
            'Branch',
            'Date'
        );

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Purchase Type']  = $lead->purchase_type;
            $row['Tel']  = $lead->tel;
            $row['Branch']  = $lead->showroom;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Age'],
                $row['Purchase Type'],
                $row['Tel'],
                $row['Branch'],
                $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getQuotationsLeads ($leads) {
        $columns = array(
            'Tracking ID',
            'Title',
            'First Name',
            'Last Name',
            'Mobile',
            'Email',
            'Purchase Type',
            'Age',
            'Tel',
            'Emirate',
            'Branch',
            'Source of Lead',
            'Date'
        );

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Purchase Type']  = $lead->purchase_type;
            $row['Age']  = $lead->age;
            $row['Tel']  = $lead->tel;
            $row['Emirate']  = $lead->emirate;
            $row['Branch']  = $lead->showroom;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Purchase Type'],
                $row['Age'],
                $row['Tel'],
                $row['Emirate'],
                $row['Branch'],
                $row['Source of Lead'],
                $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getAccessoryQuotationsLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Email', 'Age', 'Showroom', 'Purchase Type', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Showroom']  = $lead->showroom;
            $row['Purchase Type']  = $lead->purchase_type;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array($row['Tracking ID'], $row['Title'], $row['First Name'], $row['Last Name'], $row['Email'], $row['Age'], $row['Showroom'], $row['Purchase Type'], $row['Date']));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getTestDriveLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Age', 'Emirate', 'Showroom', 'Model', 'Source of Lead', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Emirate']  = $lead->emirate;
            $row['Showroom']  = $lead->showroom;
            $row['Model']  = $lead->model;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Age'],
                $row['Emirate'],
                $row['Showroom'],
                $row['Model'],
                $row['Source of Lead'],
                $row['Date']
            ));
        }
        fclose($file);
        };
        return $callback;
    }

    public function getQuoteLeads ($leads) {
        $columns = array('Tracking ID', 'Title', 'First Name', 'Last Name', 'Mobile', 'Email', 'Age', 'Emirate', 'Showroom', 'Model', 'Source of Lead', 'Date');

        $callback = function() use($leads, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($leads as $lead) {
            $row['Tracking ID']  = $lead->id;
            $row['Title']  = $lead->title;
            $row['First Name']    = $lead->first_name;
            $row['Last Name']    = $lead->last_name;
            $row['Mobile']  = $lead->mobile;
            $row['Email']  = $lead->email;
            $row['Age']  = $lead->age;
            $row['Emirate']  = $lead->emirate;
            $row['Showroom']  = $lead->showroom;
            $row['Model']  = $lead->model;
            $row['Source of Lead']  = $lead->hear;
            $row['Date']  = date('d M, Y', strtotime($lead->created_at));

            fputcsv($file, array(
                $row['Tracking ID'],
                $row['Title'],
                $row['First Name'],
                $row['Last Name'],
                $row['Mobile'],
                $row['Email'],
                $row['Age'],
                $row['Emirate'],
                $row['Showroom'],
                $row['Model'],
                $row['Source of Lead'],
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
                ->where('created_at','>=',Carbon::now()->subdays($this->days))
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }else{
            $leads = Lead::search('email', $this->term)
                ->where('type', $this->type)
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        return view('livewire.manage-leads', [
            'leads' => $leads
        ]);
    }
}
