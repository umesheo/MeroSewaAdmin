<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
class WorkerController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'Workers';
    }
    public function index(){
        return view('worker.index');
    }
    public function store(Request $request){

        $postData = [
            'Name'=>$request->Name,
            'Email'=>$request->Email,
            'PhoneNumber'=>$request->Phone,
            'Address'=>$request->Address,
            'Category'=>$request->Category,


        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef){
            notify()->success('Worker Added Successfully', 'Cloud Database');

            return redirect('worker');
        }
        else{
            return redirect('worker')->with('status','Worker Not Added');
        }
    }
}
