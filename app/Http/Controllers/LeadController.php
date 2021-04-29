<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $adminEmail = "burhan.gani@alrostamanigroup.ae";
    public $adminName = "Suzuki UAE";

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }


    public function accessoriesQuote (Request $request) {

        $request->validate([
            'purchase_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'age' => 'required',
            'cart' => 'required',
            'showroom' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }


        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'showroom' => $request->showroom,
            'purchase_type' => $request->purchase_type,
            'tel' => $request->tel,
            'age' => $request->age,
            'cart' => $request->cart,
            'model' => $request->model,
            'user_id' => $user->id,
            'type' => 'accessory-quotations',
        ]);

        $email =  $request->email;

        $data = array(
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'purchase_type' => $request->purchase_type,
            'cart' => json_decode($request->cart),
            'model' => $request->model,
        );


        Mail::send('mail.admin.accessory_quote', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Accessory Quote Request ');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Done!",
                    "message" => "We have got your message."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }

    public function newsletter (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        $checkLead = Lead::where('email', $request->email)->get()->count();

        if ($checkLead === 0) {

            $lead = Lead::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'hear' => $request->hear,
                'user_id' => $user->id,
                'type' => 'newsletter',
            ]);

            $email =  $request->email;

            $data = array(
                'name' => $name,
                'email' => $request->email,
                'bodyMessage' => $request->message
            );


            Mail::send('mail.admin.newletter_signup', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($this->adminEmail, $this->adminName)->subject('New newsletter signup');
            });


            if($lead) {
                return response()->json(
                    [
                        "wow" => "Awesome!",
                        "message" => "Thanks for signing up."
                    ]
                );
            }else{
                return response()->json(
                    [
                        "wow" => "opps!",
                        "message" => "Something went wrong! please try again."
                    ]
                );
            }

        }else {
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Email is already exists."
                ]
            );
        }


    }


    public function financeQuote (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'title' => "-",
            'mobile' => $request->mobile,
            'user_id' => $user->id,
            'type' => 'finance-quote',
        ]);

        $email =  $request->email;

        $data = array(
            'name' => $name,
            'email' => $request->email,
            'vehicle' => $request->vehicle,
            'deposit' => $request->deposit,
            'duration' => $request->duration,
            'mobile' => $request->mobile,
            'price' => $request->price,
            'total_interest' => $request->total_interest,
            'total_payable' => $request->total_payable,
            'interest_rate' => $request->interest_rate,
            'bodyMessage' => $request->message
        );


        Mail::send('mail.admin.finance_quote', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('New Finance Quotation');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "Soon you will hear from us."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }


    }


    public function ourCommitment (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'vin' => 'required',
            'location' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        // return $request;


        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'tel' => $request->tel,
            'user_id' => $user->id,
            'vin' => $request->vin,
            'age' => $request->age,
            'location' => $request->location,
            'type' => 'commitments',
        ]);

        $email =  $request->email;

        $data = array(
            'title' => $request->title,
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'location' => $request->location,
            'vin' => $request->vin,
        );

        Mail::send('mail.admin.our_commitment', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('New member joined Suzuki family');
        });

        Mail::send('mail.user.our_commitment', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Welcome to Suzuki family');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "We have recived your request! check you email."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }

    public function geniuneParts (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'model' => 'required',
            'part' => 'required',
            'vin' => 'required',
            'date' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        // return $request;


        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'tel' => $request->tel,
            'emirate' => $request->emirate,
            'showroom' => $request->showroom,
            'user_id' => $user->id,
            'model' => $request->model,
            'vin' => $request->vin,
            'part' => $request->part,
            'detail' => $request->detail,
            'type' => 'geniune-part',
        ]);

        $email =  $request->email;

        $data = array(
            'title' => $request->title,
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'part' => $request->part,
            'vin' => $request->vin,
            'showroom' => $request->showroom,
            'emirate' => $request->emirate,
        );

        Mail::send('mail.admin.geniune_part', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('Geniune Part Quote');
        });

        Mail::send('mail.user.geniune_part', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Geniune Part Quote | Suzuki.ae');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "We have recived your request! check you email."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }

    public function bookService (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'model' => 'required',
            'year' => 'required',
            'service_type' => 'required',
            'date' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        // return $request;

        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'tel' => $request->tel,
            'emirate' => $request->emirate,
            'showroom' => $request->showroom,
            'user_id' => $user->id,
            'model' => $request->model,
            'year' => $request->year,
            'type' => 'services',
        ]);

        $email =  $request->email;

        $data = array(
            'title' => $request->title,
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'date' => $request->date,
            'showroom' => $request->showroom,
            'emirate' => $request->emirate,
        );

        Mail::send('mail.admin.book_service', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('Book a service request');
        });

        Mail::send('mail.user.book_service', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Book a service | Suzuki');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "We have recived your request! check you email."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }

    public function testDrive (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

        // return $request;


        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'hear' => $request->hear,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'tel' => $request->phone,
            'emirate' => $request->emirate,
            'showroom' => $request->showroom,
            'showroom' => $request->showroom,
            'user_id' => $user->id,
            'model' => $request->model['id'],
            'type' => 'test-drive',
        ]);

        $email =  $request->email;

        $data = array(
            'title' => $request->title,
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'showroom' => $request->showroom,
            'emirate' => $request->emirate,
        );


        Mail::send('mail.admin.test_drive', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('Test Drive Request');
        });

        Mail::send('mail.user.test_drive', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Test Drive Request');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "We have recived your request! check you email."
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }

    public function getBrochure (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);


        $files = [];
        foreach ($request->models as $model) {
            $file = Vehicle::where('id', $model['id'])->first()->brochure[0];
            $pdf = $file->getMedia('file')->count() != 0 ? $file->getMedia('file')[0]->getUrl() : null;
            $data = array(
                'model'=> $file->vehicle->title,
                'pdf'=> $pdf,
            );
            $files[] = $data;
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;
        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

            $lead = Lead::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'hear' => $request->hear,
                'emirate' => $request->emirate,
                'user_id' => $user->id,
                'type' => 'brochure',
            ]);

            $email =  $request->email;
            $email =  $request->email;

            $data = array(
                'name' => $name,
                'email' => $request->email,
                'files' => $files,
                'bodyMessage' => $request->message
            );


            Mail::send('mail.admin.get_brochure_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($this->adminEmail, $this->adminName)->subject('New entry for brochure download');
            });


            Mail::send('mail.user.get_brochure_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($email, $name)->subject('Suzuki Brochure download link');
            });


            if($lead) {
                return response()->json(
                    [
                        "wow" => "Awesome!",
                        "message" => "Thanks! Shortly you will get an email with download links!"
                    ]
                );
            }else{
                return response()->json(
                    [
                        "wow" => "opps!",
                        "message" => "Something went wrong! please try again."
                    ]
                );
            }
    }

    public function getSpecSheet (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);


        $files = [];
        foreach ($request->models as $model) {
            $file = Vehicle::where('id', $model['id'])->first()->specsheet[0];
            $pdf = $file->getMedia('file')->count() != 0 ? $file->getMedia('file')[0]->getUrl() : null;
            $data = array(
                'model'=> $file->vehicle->title,
                'pdf'=> $pdf,
            );
            $files[] = $data;
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;
        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

            $lead = Lead::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'hear' => $request->hear,
                'emirate' => $request->emirate,
                'user_id' => $user->id,
                'type' => 'specsheet',
            ]);

            $email =  $request->email;
            $email =  $request->email;

            $data = array(
                'name' => $name,
                'email' => $request->email,
                'files' => $files,
                'bodyMessage' => $request->message
            );


            Mail::send('mail.admin.get_specsheet_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($this->adminEmail, $this->adminName)->subject('New entry for specsheet download');
            });


            Mail::send('mail.user.get_specsheet_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($email, $name)->subject('Suzuki specsheet download link');
            });


            if($lead) {
                return response()->json(
                    [
                        "wow" => "Awesome!",
                        "message" => "Thanks! Shortly you will get an email with download links!"
                    ]
                );
            }else{
                return response()->json(
                    [
                        "wow" => "opps!",
                        "message" => "Something went wrong! please try again."
                    ]
                );
            }
    }

    public function getAccessoriesBrochure (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);


            $model = Vehicle::where('id', $request->model)->first();
            $file = $model->accessory_brochure;
            $pdf = $file[0]->getMedia('file')->count() != 0 ? $file[0]->getMedia('file')[0]->getUrl() : null;

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;
        $name = $request->first_name . ' ' . $request->last_name;

        if ($validator->fails()) {
            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
            $roles = [2];
            $user->roles()->sync($roles);
        }else{
            $user = User::where('email', $request->email)->first();
        }

            $lead = Lead::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'emirate' => $request->emirate,
                'user_id' => $user->id,
                'type' => 'accessory-brochure',
            ]);

            $email =  $request->email;
            $email =  $request->email;

            $data = array(
                'name' => $name,
                'email' => $request->email,
                'file' => $file,
                'pdf' => $pdf,
                'model' => $model->title,
                'bodyMessage' => $request->message
            );


            Mail::send('mail.admin.get_accessory_brochure_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($this->adminEmail, $this->adminName)->subject('New entry for accessories brochure download');
            });


            Mail::send('mail.user.get_accessory_brochure_download_link', $data, function ($message) use ($email, $name) {
                $message->from('info@suzuki.ae');
                $message->to($email, $name)->subject('Suzuki Accessories Brochure download link');
            });


            if($lead) {
                return response()->json(
                    [
                        "wow" => "Awesome!",
                        "message" => "Thanks! Shortly you will get an email with download links!"
                    ]
                );
            }else{
                return response()->json(
                    [
                        "wow" => "opps!",
                        "message" => "Something went wrong! please try again."
                    ]
                );
            }
    }

    public function contactUs (Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);


        $name = $request->first_name . ' ' . $request->last_name;
        $name = $request->first_name . ' ' . $request->last_name;


        $lead = Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'type' => 'contact-us',
        ]);

        $email =  $request->email;

        $data = array(
            'title' => $request->title,
            'name' => $name,
            'email' => $request->email,
            'mobile' => $request->email,
            'bodyMessage' => $request->message
        );


        Mail::send('mail.admin.contact_us', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($this->adminEmail, $this->adminName)->subject('New inquiry from suzuki.ae contact form');
        });


        Mail::send('mail.user.contact_us', $data, function ($message) use ($email, $name) {
            $message->from('info@suzuki.ae');
            $message->to($email, $name)->subject('Suzuki UAE contact');
        });


        if($lead) {
            return response()->json(
                [
                    "wow" => "Awesome!",
                    "message" => "We have received your message"
                ]
            );
        }else{
            return response()->json(
                [
                    "wow" => "opps!",
                    "message" => "Something went wrong! please try again."
                ]
            );
        }




    }



}
