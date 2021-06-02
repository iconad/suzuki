<?php

namespace App\Http\Controllers;
use App\Models\Lead;

use Illuminate\Http\Request;

class ManagePages extends Controller
{
    public function dashboard () {
        return view('manage.dashboard');
    }

    public function singleLead ($id) {
        $lead = Lead::where('id', $id)->first();
        return view('manage.lead.single', compact('lead'));
    }

    public function menus () {
        return view('manage.menu.index');
    }

    public function index ($type) {

        $types = ['newsletter', 'finance-quote', 'commitments', 'recall', 'contact-us', 'services', 'geniune-part', 'quotations', 'accessory-quotations', 'test-drive'];

        if (in_array($type, $types)) {

        $leads = Lead::where('type', $type)->get();
        return view('manage.lead.index', compact('leads', 'type'));

        }else{
            return redirect('/cms/dashboard');
        }

    }


}
