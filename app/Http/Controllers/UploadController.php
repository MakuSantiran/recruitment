<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Uploaded_Documents;
use App\Models\PendingApplication;

class UploadController extends Controller
{
    public function saveToDatabase($userid, $opId, $docName, $address)
    {
        $checkedDocument = Uploaded_Documents::where([
            ['user_id', '=', $userid],
            ['opp_id', '=', $opId],
            ['document_type', '=', $docName]
        ]);

        // check if there's existing file
        if ($checkedDocument->exists()){
            
            // deletes the file
            unlink($checkedDocument->get()->first()['document_address']);

            // simply update
            Uploaded_Documents::where([
                ['user_id', '=', $userid],
                ['opp_id', '=', $opId],
                ['document_type', '=', $docName]
            ])->update(['document_address'=>$address]);

        // if not, just create a new ones
        } else {

            // then make a database of the document 
            $newDoc = new Uploaded_Documents;

            // these 2 can be simplified ~Maku
            $newDoc->user_id = $userid;
            $newDoc->opp_id = $opId;

            $newDoc->document_type = $docName;
            $newDoc->document_address = $address;

            $newDoc->save();
        }
    }

    public function uploadFile($requestData, $fileId, $docName, $docNameWSpace, $id, $opId)
    {
        // reference: https://tutorial101.blogspot.com/2022/03/vuejs-vue-cli-file-upload-with-axios.html
        header('Access-Control-Allow-Origin: *');  
        $filename = $_FILES[$docName]['name'];
        $allowed_extensions = array('jpg','jpeg','png','pdf');
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        
        //$dirpath = dirname(getcwd());

        /**/
        //  Reference: https://stackoverflow.com/questions/13096615/php-create-multiple-directories
        $folder_full = "userUploads/".$id."_".$opId;
        if (!is_dir($folder_full)) mkdir($folder_full, 0777, true);

        // then, name will be changed
        $newFileName = $docNameWSpace.".".$extension;
        $savedAt = $folder_full . "/" .  $newFileName;

        /**/
        if(in_array(strtolower($extension),$allowed_extensions) ) {     
            if(move_uploaded_file($_FILES[$docName]['tmp_name'], $savedAt )){
                
                // save to database
                $this->saveToDatabase($id, $opId, $docNameWSpace, $savedAt);

            }else{
                //echo 0;
            }
        }else{ 
           return "Invalid file! Only jpg, jpeg, png and pdf are supported";
        }
    }

    public function initiateUpload(Request $request)
    {   
       
        // since we only accept string because of form
        // we now have to convert it into an array
        $optionalArray = explode(',',$request['option']);
        $requiredArray = explode(',',$request['req']);

        // for (option)
        foreach($optionalArray as $key=>$value) {
            // remove space
            $noSpace = str_replace(' ', '', $value);

            if (array_key_exists($noSpace, $_FILES)){
                $this->uploadFile($request, 1, $noSpace, $value, $request['id'], $request['oppId']);
            }
        }
        //

        // for (req)
        foreach($requiredArray as $key=>$value) {
            // remove space
            $noSpace = str_replace(' ', '', $value);

            if (array_key_exists($noSpace, $_FILES)){
                $this->uploadFile($request, 1, $noSpace, $value, $request['id'], $request['oppId']);
            } else {
                //return "Missing document! Please upload all the required files";
            }
        }

        // check first if it already exists
        if (PendingApplication::where([
                ['user_id', '=', $request['id']],
                ['opp_id', '=',$request['oppId']],
                ['admin_id', '=', 2] // this must be changed ~Maku
            ]
        )->exists()){} else {
            // make a pending first (to "connect" it with the uploaded document) ~Maku
            $newPending = new PendingApplication;
            $newPending->pend_status = 1;
            //$newPending->admin_id = $adminId; // although i could do this, im running out of time.. ~Maku
            $newPending->admin_id = 2;
            $newPending->user_id = $request['id'];
            $newPending->opp_id = $request['oppId'];

            $newPending->save();
        }


        return "Successfully uploaded the documents :]";
    }

    // opportunity deletion



    // downloading? // downloading? // downloading? // downloading?// downloading? // downloading?
    public function getFileAddress(Request $request)
    {
        $user_id = $request->compiledData['userId'];
        $opp_id = $request->compiledData['oppId'];
        $documentType = $request->compiledData['fileName'];   

    

        $result = Uploaded_Documents::where([
            ['user_id', '=', $user_id],
            ['opp_id', '=', $opp_id],
            ['document_type', '=', $documentType]
        ]);


        if ($result->exists() == 1){
            $theFile = $result->get()->first();
            return $theFile['document_address'];
        } else {
            return "--";
        }
        
        


    }



}
