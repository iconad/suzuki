<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class afterSalesController extends Controller
{
    public function vehicleAccessories($vehicle)
    {
        return view('aftersales.accessories');
    }

    public function RecallAnnouncements()
    {
        return view('aftersales.recall-announcements');
    }

    public function RecallAnnouncement()
    {
        return view('aftersales.recall-announcement');
    }

    public function OurCommitment()
    {
        return view('aftersales.out-commitment');
    }

    public function services()
    {
        return view('aftersales.services');
    }

    public function warranty()
    {
        return view('aftersales.warranty');
    }

    public function servicePaymentPlan()
    {
        return view('aftersales.service-payment-plan');
    }

    public function bookService()
    {
        return view('aftersales.book-service');
    }

    public function genuineParts()
    {
        return view('aftersales.genuine-parts');
    }

}
