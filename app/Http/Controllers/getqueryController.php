<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class getqueryController extends Controller
{
   public function join_query_function(){
       
        $students = DB::table('students')
            ->join('contacts', 'students.id', '=', 'contacts.student_id')
            ->join('course_choice', 'students.id', '=', 'course_choice.student_id')
            ->join('courses', 'students.id', '=', 'course_choice.student_id')
            ->select('students.id','students.name','courses.course_name','contacts.mobile','contacts.email')
            ->get();
 
            echo "<pre>";
            print_r($students);
            echo "</pre>";
    }
    
    public function leftjoin_query_function(){
        $students = DB::table('students')
            ->leftJoin('contacts', 'students.id', '=', 'contacts.student_id')
            ->select('students.id','students.name','contacts.mobile','contacts.email')
            ->get();
 
            echo "<pre>";
            print_r($students);
            echo "</pre>";
    }
    
     public function crossjoin_query_function(){
        $students = DB::table('students')
            ->crossJoin('courses')
            ->get();
 
            echo "<pre>";
            print_r($students);
            echo "</pre>";
    }
    
     public function advancejoin_query_function(){
        $students=DB::table('students')
        ->join('contacts', function ($join) {
            $join->on('students.id', '=', 'contacts.student_id')
                 ->where('contacts.student_id', '>', 3);
        })
        ->get();
 
            echo "<pre>";
            print_r($students);
            echo "</pre>";
    }
    
    public function unions_query_function(){
         
        $first = DB::table('contacts')
            ->whereNull('mobile');
 
        $students = DB::table('contacts')
            ->whereNull('email')
            ->union($first)
            ->get();
 
            echo "<pre>";
            print_r($students);
            echo "</pre>";
    }
}
