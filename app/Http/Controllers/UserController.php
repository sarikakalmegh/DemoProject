<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Export\UserExport;
use App\Imports\UsersImport;
use App\User;
use Redirect,Response;
class UserController extends Controller
{
public function index()
{
    if(request()->ajax()) {
        return datatables()->of(User::select('*'))
        ->addColumn('action', 'action_button')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    return view('list');
}

public function store(Request $request)
{  
    $userId = $request->user_id;
    if($userId)
    {
    $validatedData = $request->validate([
        'email' => 'required|max:255|unique:users,email,' . $userId,
    ]);
    }
    else{
        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
        ]);
    }
     
    $user   =   User::updateOrCreate(['id' => $userId],
                ['name' => $request->name, 'email' => $request->email,'password'=>$request->password]);        
    return Response::json($user);
}

public function edit($id)
{   
    $where = array('id' => $id);
    $user  = User::where($where)->first();
 
    return Response::json($user);
}

public function destroy($id)
{
   
    $user = User::where('id',$id)->delete();
 
    return Response::json($user);
}
//AJAX to validate duplicate for email
// public function checkEmail(Request $request){
//     $email = $request->input('email');
//     $isExists = \App\User::where('email',$email)->first();
//     if($isExists){
//         return response()->json(array("exists" => true));
//     }else{
//         return response()->json(array("exists" => false));
//     }
// }

public function checkEmail(Request $request){
    $userId = $request->user_id;
    if($userId)
    {
    $validatedData = $request->validate([
        'email' => 'required|max:255|unique:users,email,' . $userId,
    ]);
    }
    else{
        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
        ]);
    }
    return Response::json('true');
}

public function active($id)
{
   $user =  DB::table('users')
            ->where('id', $id)
            ->update(['status' => '1']);
   // $affectedRows = User::where('id',$id)->update(array('status' => 1));
 
    return Response::json($user);
}
public function deactive($id)
{
   $affectedRows = User::where('id',$id)->update(array('status' =>'0'));
 
    return Response::json($affectedRows);
}


public function exportExcel()
{
  return Excel::download(new UserExport, 'list.xlsx');
}

public function exportCSV()
{
  return Excel::download(new UserExport, 'list.csv');
}

public function view()
{
    return view('importExport');
}


public function import() 
    {
        try{
            $data = Excel::import(new UsersImport,request()->file('file'));
            
        }catch ( ValidationException $e ){

            return back()->with(['success'=>'errorList','message'=> $e->errors()]);
        }
           
        return back();
    }

    protected function recuperaValidos(RowCollection $collection)
    {
        $validos = array();
        foreach ($collection->toArray() as $k => $r) {
            $validation = $this->valdarFila($r);
            if ($validation->passes() === true) {
                $validos[] = $r;
            }
        }
        return array_unique_recursive($validos);
    }
}
