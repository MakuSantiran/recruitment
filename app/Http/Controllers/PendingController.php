<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PendingApplication;
use App\Models\Opportunity;
use App\Models\Uploaded_Documents;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\DB;

use Exception;

class PendingController extends Controller
{

    public function helloWorld(Request $request){
        $userId = $request->applicantId;

        // first find the relation
        $pendings = PendingApplication::select('*', DB::raw("pending_applications.id as pend_id"))
        ->join('opportunities', 'pending_applications.opp_id', '=', 'opportunities.id')
        ->where('user_id', $userId)
        ->get();

        echo $pendings;
    }

    
    public function getPendingAsAdmin(Request $request){

        // Reference https://stackoverflow.com/questions/58816908
        $adminId = Auth::guard('admin')->user()->id;

        // Reference https://stackoverflow.com/questions/59981237
        // https://stackoverflow.com/questions/30580874
        $pendings = PendingApplication::select('*', DB::raw("pending_applications.id as pend_id"))
        ->join('applicant_details', 'pending_applications.user_id', '=', 'applicant_details.user_id')
        ->join('opportunities', 'pending_applications.opp_id', '=', 'opportunities.id')
        ->get();

        return $pendings;
    }

    // Reference : https://stackoverflow.com/questions/7288029
    function rmdir_recursive($dir) {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")){
                $this->rmdir_recursive("$dir/$file");
            } else {
                unlink("$dir/$file");
            }
        }
        rmdir($dir);
    }

    // or delete application
    public function withdrawApplication(Request $request){
        //echo "New";
        $userId = $request->compiledData['userId'];
        $oppId = $request->compiledData['oppId'];
        $pendId = $request->compiledData['pendId']; //should've merged pendId with the uploaded_Docs

        
        // first delete the pending applications
        $pendingDelete = PendingApplication::where("id", $pendId)->delete();

        // then delete the stored uploaded file
        $allFileDel = Uploaded_Documents::where([
            ["opp_id", $oppId],
            ["user_id", $userId]
        ]);
        
        $allFile = $allFileDel->get();

        /**/
        // scan each value
        foreach($allFile as $key=>$value) {
            $directoryCode = $value['user_id']."_".$value['opp_id'];
            $fullDir = "userUploads/".$directoryCode;

            try{
                $this->rmdir_recursive($fullDir);
            } catch(Exception $mes) {
            }
        }

        // and delete the uploaded file in the database
        $allFileDel->delete();
        /**/

    }

    public function markPending(Request $request){
        $comment = $request->compiledData['comment'];
        $pendValue = $request->compiledData['pendValue'];
        $pendId = $request->compiledData['pendId'];

        PendingApplication::where([
            ['id', '=', $pendId]
        ])->update(
            ['pend_status'=>$pendValue]
        );

        PendingApplication::where([
            ['id', '=', $pendId]
        ])->update(
            ['comments'=>$comment]
        );
    }


    public function checkIfPending(Request $request){
        $userId = $request->compiledData['userId'];
        $oppId = $request->compiledData['oppId'];

        $result = PendingApplication::where([
            ['user_id', $userId],
            ['opp_id', $oppId]
        ])->exists();


        return $result;
    }

}
