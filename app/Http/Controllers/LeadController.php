<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
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
                $message->to($email, $name)->subject('New newsletter signup');
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



}
