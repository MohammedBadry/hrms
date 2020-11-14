<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

 class EmpRequest extends Request
{
     public function authorize()
     {
         return true;
     }

     public function rules()
     {
         return [
             'emp_code' => 'required',
             'emp_name_en' => 'required',
             'emp_name_ar' => 'required',
             'role' => 'required',
             'doj' => 'required',
             'email' => 'email',
             'mob_number' => 'required'
         ];
     }
}