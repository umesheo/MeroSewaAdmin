<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Auth;
use Kreait\Laravel\Firebase\Facades\Firebase;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkerController extends Controller
{
    public function __construct(Database $database, Auth $auth)
    {
        $this->database = $database;
        $this->auth = $auth;
        $this->tablename = 'Workers';

    }

    public function paginate($items, $perPage = 4, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        if (is_countable($items) && count($items) > 0) {
            $total = count($items);
            $currentpage = $page;
            $offset = ($currentpage * $perPage) - $perPage;
            $itemstoshow = array_slice($items, $offset, $perPage);
            return new LengthAwarePaginator($itemstoshow, $total, $perPage);
        }
        return new LengthAwarePaginator(null, null,1, );


    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $keyword = $search;
            if(is_numeric($keyword) != 1){
                $workers = $this->database->getReference($this->tablename)->orderByChild('Name')->equalTo($keyword)->getValue();
            }
            else{
                $workers = $this->database->getReference($this->tablename)->orderByChild('PhoneNumber')->equalTo($keyword)->getValue();
            }


            $total_count = $reference = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
            $workers = $this->paginate($workers);

            $workers->withPath('paginate');


        }
        else {
            $worker = $this->database->getReference($this->tablename)->getValue();


            $workers = $this->paginate($worker);

            $workers->withPath('paginate');

            $total_count = $reference = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        }
        return view('worker.index', compact('workers', 'total_count','search'));
    }


    public function store(Request $request)
    {
        $url = "";
        if ($request->file('image')) {
            $storage = app('firebase.storage');

            $defaultBucket = $storage->getBucket();
//
            $file = $request->file('image');


            $uploadOptions = array_filter([
                'name' => $file->getClientOriginalName(),
                'predefinedAcl' => 'publicRead',
            ]);

            $uploadedFile = $defaultBucket->upload(fopen($file, 'rb'), $uploadOptions);

            $url = 'https://' . $defaultBucket->name() . '.storage.googleapis.com/' . $uploadedFile->name();


            //dd($uploadedFile);
        }
        $postData = [
            'Name' => $request->Name,

            'PhoneNumber' => $request->Phone,
            'Address' => $request->Address,
            'Category' => $request->Category,
            'URL' => $url,


        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            notify()->success('Worker Data Added Successfully', 'Cloud Database');


            return redirect('worker');
        } else {
            notify()->warning('Worker Data Not  Added Successfully', 'Cloud Database');
            return redirect('worker')->with('status', 'Worker Not Added Successfully');
        }
    }

    public function edit($id)
    {
        $key = $id;

        $editData = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editData) {
            return view('worker.edit', compact('editData', 'key'));
        } else {
            notify()->warning('Worker Id Not Found', 'Cloud Database');
            return redirect('worker')->with('status', 'Worker Id Not Found');
        }
    }

    public function update(Request $request, $id)
    {
        $url = "";
        if ($request->file('image')) {
            $storage = app('firebase.storage');

            $defaultBucket = $storage->getBucket();
//
            $file = $request->file('image');


            $uploadOptions = array_filter([
                'name' => $file->getClientOriginalName(),
                'predefinedAcl' => 'publicRead',
            ]);

            $uploadedFile = $defaultBucket->upload(fopen($file, 'rb'), $uploadOptions);

            $url = 'https://' . $defaultBucket->name() . '.storage.googleapis.com/' . $uploadedFile->name();


            //dd($uploadedFile);
        }
        $key = $id;
        if ($request->file('image')){
            $updateData = [
                'Name' => $request->Name,
                'Email' => $request->Email,
                'PhoneNumber' => $request->Phone,
                'Address' => $request->Address,
                'Category' => $request->Category,
                'URL' => $url,

            ];
        }
        else{
            $updateData = [
                'Name' => $request->Name,
                'Email' => $request->Email,
                'PhoneNumber' => $request->Phone,
                'Address' => $request->Address,
                'Category' => $request->Category,


            ];
        }

        $res_updated = $this->database->getReference($this->tablename . '/' . $key) // this is the root reference
        ->update($updateData);
        if ($res_updated) {
            notify()->success('Worker Data Updated Successfully', 'Cloud Database');

            return redirect('worker');
        } else {
            notify()->warning('Worker Data Not  Updated Successfully', 'Cloud Database');
            return redirect('worker')->with('status', 'Worker Not Updated Successfully');
        }
    }

    public function destroy($id)
    {
        $key = $id;



        $del_data = $this->database->getReference($this->tablename . '/' . $key)->remove();
        if ($del_data) {


            notify()->success('Worker Data Deleted Successfully', 'Cloud Database');

            return redirect('worker');
        } else {
            notify()->warning('Worker Data Not Deleted Successfully', 'Cloud Database');
            return redirect('worker')->with('status', 'Worker Not Deleted Successfully');
        }
    }

    public function paginateUser($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }

    public function user()
    {

        $userIterator = Firebase::auth()->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);
        $all_user[] = [];


        $all_user = iterator_to_array($userIterator, true);
        $count = sizeof($all_user);
        $all_users = $this->paginate($all_user);
        $all_users->withPath('paginateUser');




        return view('AppUser.User', compact('all_users', 'count'));
    }
}
