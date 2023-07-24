<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\Applicant_Detail;
use App\Models\Education;
use App\Models\WorkExperience;
use App\Models\Eligibility;
use App\Models\Training;

class PortfolioController extends Controller
{
    public function helloWorld()
    {
        //$result = Opportunity::all();
        print "Helo World";
        //return $result;
    }

    public function getAddress(Request $request)
    {
        return Addresses::where('user_id', $request->userId)->get()->first();
    }

    public function addUserEducattion(Request $request)
    {  
        print $request->compiledData['school_name'];
        
        $newEducation = new Education;
        $newEducation->user_id = $request->compiledData['userId'];
        $newEducation->year_level = $request->compiledData['year_level'];
        $newEducation->school_name = $request->compiledData['school_name'];
        $newEducation->degree_earned = $request->compiledData['degree_earned'];
        $newEducation->units_earned = (double) $request->compiledData['units_earned'];
        $newEducation->year_attended_from = $request->compiledData['year_attended_from'];
        $newEducation->year_attended_to = $request->compiledData['year_attended_to'];
        $newEducation->honors = $request->compiledData['honors'];

        $newEducation->year_graduated = $request->compiledData['year_attended_to'];

        print $newEducation;
        $newEducation->save();
    }

    public function updateUserForm(Request $request)
    {
        // update the user detail first
        $updateUser = Applicant_Detail::where('id', $request->compiledData['User']['id'])->update([
            'firstname'=>   $request->compiledData['User']['firstname'],
            'middlename'=>  $request->compiledData['User']['middlename'],
            'surname'=>     $request->compiledData['User']['surname'],
            'sex'=>         $request->compiledData['User']['sex'],
            'birthdate'=>   $request->compiledData['User']['birthdate'],
            'civil_status'=>$request->compiledData['User']['civil_status'],
            'citizenship'=> $request->compiledData['User']['citizenship'],
            'contact_no'=>  $request->compiledData['User']['contact_no'],
        ]);  

        // now check if there exists an address that is correlated to the user
        // if found then just update
        if (Addresses::where('user_id', $request->compiledData['User']['id'])->exists()){

            $updateUser = Addresses::where('user_id', $request->compiledData['User']['id'])->update([
                'region'=>          $request->compiledData['Address']['region'],
                'province'=>        $request->compiledData['Address']['province'],
                'municipality'=>    $request->compiledData['Address']['municipality'],
                'barangay'=>        $request->compiledData['Address']['barangay'],
                'postal_code'=>     $request->compiledData['Address']['postal_code'],
            ]);  

           //print "B";

        // if not found then create new
        } else {

            $newAddress = new Addresses;
            $newAddress->user_id = $request->compiledData['User']['id'];
            $newAddress->region = $request->compiledData['Address']['region'];
            $newAddress->province = $request->compiledData['Address']['province'];
            $newAddress->municipality = $request->compiledData['Address']['municipality'];
            $newAddress->barangay = $request->compiledData['Address']['barangay'];
            $newAddress->postal_code = $request->compiledData['Address']['postal_code'];

            $newAddress->save();
 
        }
    }


    public function addUserExp(Request $request)
    {  
        $newExperience = new WorkExperience;

        //$newEducation->user_id = $request->compiledData['userId'];

        $newExperience->user_id = $request->compiledData['userId'];
        $newExperience->from = $request->compiledData['from'];
        $newExperience->to = $request->compiledData['to'];
        $newExperience->position = $request->compiledData['position'];
        $newExperience->company = $request->compiledData['company'];
        $newExperience->monthly_salary = $request->compiledData['monthly_salary'];
        $newExperience->sg_step = "SG_".(string)$request->compiledData['sg_step'];
        $newExperience->status_of_employment = $request->compiledData['status_of_employment'];

        $newExperience->save();
    }

    public function addUserEli(Request $request)
    {  
        $newEligibility = new Eligibility;

        $newEligibility->user_id = $request->compiledData['userId'];
        $newEligibility->eligibility = $request->compiledData['eligibility'];
        $newEligibility->rating = $request->compiledData['rating'];
        $newEligibility->date_of_examination = $request->compiledData['date_of_examination'];
        $newEligibility->place_of_examination = $request->compiledData['place_of_examination'];
        $newEligibility->license_no = $request->compiledData['license_no'];
        $newEligibility->date_of_released = $request->compiledData['date_of_released'];

        //print "Hello World";
        $newEligibility->save();
    }

    public function addUserTrain(Request $request)
    {  
        $newTraining = new Training;

        $newTraining->user_id = $request->compiledData['userId'];
        $newTraining->title = $request->compiledData['title'];
        $newTraining->hours = $request->compiledData['hours'];
        $newTraining->from = $request->compiledData['from'];
        $newTraining->to = $request->compiledData['to'];
        $newTraining->sponsor = $request->compiledData['sponsor'];
        $newTraining->type = $request->compiledData['type'];

        $newTraining->save();
    }



}
