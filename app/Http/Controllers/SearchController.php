<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class SearchController extends Controller
{

    public function search(Request $request){

            $data = Company::where( __('name') , 'LIKE','%'. $request->search .'%')->paginate(3);
            $data2 = User::where( __('name') , 'LIKE','%'. $request->search .'%')->paginate(3);


            $output = '';

            if (count($data)>0) {

                $output = '<ul class="list-group " style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row){

                    $part1 = "onclick=\"location.href='/redirect/$row->id'\"";
                    $part2 ="style=\"cursor: pointer;\"";
                    $output .= '<li class="list-group-item"'. $part1 . $part2 .">". "Company: " . $row[__('name')] .'</li>';

                }
                foreach ($data2 as $row){

                    $part1 = "onclick=\"location.href='/employee/redirect/$row->id'\"";
                    $part2 ="style=\"cursor: pointer;\"";
                    $output .= '<li class="list-group-item"'. $part1 . $part2 .">". "Employee: ". $row[__('name')] .'</li>';

                }

                $output .= '</ul>';
            }
            else {

                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }

            return $output;

    }


}
