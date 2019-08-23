<?php
namespace App\Export;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromCollection, WithHeadings, ShouldAutoSize
{
  public function collection()
  {
   return  User::select('id','name','email','created_at')->get();

  }
  public function headings(): array
  {
      return [
          '#',
          'Name',
          'Email',
          'Created at',
      ];
  }

}