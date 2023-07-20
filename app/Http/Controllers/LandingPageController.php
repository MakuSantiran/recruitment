<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;

class LandingPageController extends Controller
{
    var $oppCount = 3;

    public function getAllOpp()
    {
        $opportunities = Opportunity::where('status', 1)->paginate(6);
        
        return view('landing_page.opportunities', compact('opportunities'));
    }

    public function searchOpp(Request $request)
    {
        // yung nasearched
        $searched = $request->q;

        if ($request->order == 'latest') {
            $opportunities = Opportunity::where($request->type, 'LIKE', '%'.$request->q.'%')->latest()->get();
        } else {
            $opportunities = Opportunity::where($request->type, 'LIKE', '%'.$request->q.'%')->oldest()->get();
        }
        
        return view('landing_page.search', compact('opportunities', 'searched'));
    }

    public function showOpp($slug)
    {
        $opportunity = Opportunity::where('slug', $slug)->first();

        $documents = [
            'cert_employment' => [
                "Certificate of Employment",
                $opportunity['cert_employment']
            ],
            'service_record' => [
                "Service Record",
                $opportunity['service_record']
            ],
            'transcript_of_records' => [
                "Transcript of Record",
                $opportunity['transcript_of_records']
            ],
            'diploma' => [
                "Diploma",
                $opportunity['diploma']
            ],
            'certification_of_units' => [
                "Certification of Units",
                $opportunity['certification_of_units']
            ],
            'cs_eligibility' => [
                "Civil Service Eligibility",
                $opportunity['cs_eligibility']
            ],
            'prc_license' => [
                "PRC License",
                $opportunity['prc_license']
            ],
            'board_rating' => [
                "Board Rating",
                $opportunity['board_rating']
            ],
            'trainings_seminars_awards' => [
                "Trainings, Seminars, and Awards",
                $opportunity['trainings_seminars_awards']
            ],
            'latest_performance_rating' => [
                "Latest Performance Rating",
                $opportunity['latest_performance_rating']
            ],
        ];

        $required = [];
        $optional = [];

        foreach ($documents as $k => $v) {
            if ($v[1] == 2) {
                array_push($required, $v[0]);
            } elseif ($v[1] == 1) {
                array_push($optional, $v[0]);
            }
        }

        return view('landing_page.opportunity', compact(
            'opportunity', 
            'required',
            'optional'
        ));
    }

    public function getActiveOpp()
    {
        $opportunities = Opportunity::where('status', 1)->latest()->take($this->oppCount)->get();
        
        return view('landing_page.index', compact('opportunities'));
    }


}
