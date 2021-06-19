<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\divisionModel;
use App\Models\districtModel;
use App\Models\upazilaModel;

class dropdownController extends Controller
{
    function index()
    {
        $data = [];
        $data['division_list'] = divisionModel::all();
        $data['district_list'] = districtModel::all();
        $data['upazila_list'] = upazilaModel::all();
        return view('dynamic_dependent',$data);
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
    $dependent = $request->get('dependent');
     
     $data = districtModel::where('tbl_division_division_id', $value)
      ->get('en_district_name');
      
      $new_data = upazilaModel::where('tbl_division_division_id', $value)
      ->get('en_upazila_name'); 

     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->en_district_name.'">'.$row->en_district_name.'</option>';
     }
    //  echo $output;
     //$output = '<option value="">Select '.ucfirst($dependent).'</option>';
     //dd($new_data);
     foreach($new_data as $row)
     {
      $output .= '<option value="'.$row->en_upazila_name.'">'.$row->en_upazila_name.'</option>';
     }
     echo $output;
     
    }
    function fetch_upazila(Request $request)
    {
      $district_select = $request->get('district_select');
     $district_value = $request->get('district_value');
    //  $select = $request->get('select');
    //  $value = $request->get('value');
      $dependent = $request->get('dependent');
    //dd($district_value);
    //$id =  $district_value;
     $district_id = districtModel::where('en_district_name', $district_value)
                     ->get('district_id');
                    //  dd($district_id);
      // $id =  $district_value; 
      foreach($district_id as $row_id)
     { 
      $new_id = $row_id->district_id;
     }
    
      $data = upazilaModel::Where('tbl_district_district_id', $new_id)
                   ->get('en_upazila_name');
    $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->en_upazila_name.'">'.$row->en_upazila_name.'</option>';
     }
     echo $output;
    }
    
}
