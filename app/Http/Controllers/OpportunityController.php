<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OpportunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except([
            'getAll'
        ]);
    }


    public function publish(Request $request)
    {
        // validate

        $deadline = $request->deadline;
        $req = (object) $request->reqs;        

        // dd($request->opportunity['title']);
        $new_opp = new Opportunity;
        $new_opp->admin_id = 2; //update
        $new_opp->title = $request->opportunity['title'];
        $new_opp->slug = Str::slug($request->opportunity['title'].now());
        $new_opp->position = $request->opportunity['position'];
        $new_opp->description = $request->opportunity['description'];
        $new_opp->qualifications = $request->opportunity['qualifications'];   

        $new_opp->submission_deadline = $deadline;
    
        $new_opp->cert_employment = (int) $req->cert_employment['value'];
        $new_opp->service_record = (int) $req->service_record['value'];
        $new_opp->transcript_of_records = (int) $req->transcript_of_records['value'];
        $new_opp->diploma = (int) $req->diploma['value'];
        $new_opp->certification_of_units = (int) $req->certification_of_units['value'];
        $new_opp->cs_eligibility = (int) $req->cs_eligibility['value'];
        $new_opp->prc_license = (int) $req->prc_license['value'];
        $new_opp->board_rating = (int) $req->board_rating['value'];
        $new_opp->trainings_seminars_awards = (int) $req->trainings_seminars_awards['value'];
        $new_opp->latest_performance_rating = (int) $req->latest_performance_rating['value'];

        $new_opp->status = $request->opportunity['status'];

        $result = $new_opp->save();

        return $result;
    }


    public function getAll()
    {
        $result = Opportunity::all();
        
        return $result;
    }

    public function update(Request $request)
    {

        // dd($request->deadline);
        $opp = Opportunity::where("id", $request->opportunity['id'])->update([
            'title'=>$request->opportunity['title'],
            'position'=>$request->opportunity['position'],
            'description'=>$request->opportunity['description'],
            'qualifications'=>$request->opportunity['qualifications'],
            
            'submission_deadline'=>$request->deadline,

            'cert_employment'=> (int) $request->reqs['cert_employment'],
            'service_record'=> (int) $request->reqs['service_record'],
            'transcript_of_records'=> (int) $request->reqs['transcript_of_records'],
            'diploma'=> (int) $request->reqs['diploma'],
            'certification_of_units'=> (int) $request->reqs['certification_of_units'],
            'cs_eligibility'=> (int) $request->reqs['cs_eligibility'],
            'prc_license'=> (int) $request->reqs['prc_license'],
            'board_rating'=> (int) $request->reqs['board_rating'],
            'trainings_seminars_awards'=> (int) $request->reqs['trainings_seminars_awards'],
            'latest_performance_rating'=> (int) $request->reqs['latest_performance_rating'],
        ]);

        return $opp;
    
    }

    public function deleteOpportunity($id)
    {
        $result = Opportunity::where("id", $id)->delete();

        return $result;
    }

    public function adminIndex()
    {
        return view('app');
    }
        
    
}
