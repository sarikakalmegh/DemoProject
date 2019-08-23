<?php
  
namespace App\Imports;
  
use App\User;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;


  
class UsersImport implements ToCollection,WithStartRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
      // dd($rows);
    //   Validator::make($rows->toArray(), [
    //          '*.0' => 'required',
    //      ])->validate();

     $users = User::get()->pluck('email')->toArray();
     $temp=array();
        foreach ($rows as $key=>$row) {
            $key = $key+2;
            $email = strtolower($row[1]);
            if(!in_array($email, array_map('strtolower',$users)))
            {
                User::create([
                    'name' => $row[0],
                    'email' => $row[1],
                    'password' => \Hash::make('123456'),
                    'created_at'=>$row[2]
                ]);
                $users = User::get()->pluck('email')->toArray();
            }
            else{
                $temp[$key] = $email;
            }
            
        }
        $count = count($temp);
        if($count>0)
        {
            return Redirect::back()->withErrors($temp);
        }
   
    }


    
    // public function model(array $row)
    // {
    //     return new User([
    //         'name'     => $row[0],
    //         'email'    => $row[1], 
    //         'password' => \Hash::make('123456'),
    //     ]);
    // }

    public function startRow(): int
    {
        return 2;
    }
    
    /**
     * @param Failure ...$failures
     */
    public function onFailure(Failure ...$failures)
    {
        Log::stack(['import-failure-logs'])->info(json_encode($failures));
    }

}