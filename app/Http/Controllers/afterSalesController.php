<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Recall;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Dymantic\InstagramFeed\Profile;

class afterSalesController extends Controller
{
    public function vehicleAccessories($slug)
    {
        $vehicle = Vehicle::where('slug', $slug)->first();
        $logo = $vehicle->getMedia('logo')->count() != 0 ? $vehicle->getMedia('logo')[0]->getUrl() : null;
        $accessory_cover = $vehicle->getMedia('accessory_cover')->count() != 0 ? $vehicle->getMedia('accessory_cover')[0]->getUrl() : null;
        $brochure = $vehicle->accessory_brochure;
        return view('aftersales.accessories', compact('vehicle', 'logo', 'brochure', 'accessory_cover'));
    }

    public function RecallAnnouncements()
    {
        $recalls = Recall::paginate();
        return view('aftersales.recall-announcements', compact('recalls'));
    }

    public function RecallAnnouncement($slug)
    {
        $recall = Recall::where('slug', $slug)->first();
        return view('aftersales.recall-announcement', compact('recall'));
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
