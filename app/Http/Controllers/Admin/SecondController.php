<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SecondController extends Controller
{
    // public function __construct(){
    //     $this -> middleware(middleware:'auth') -> except(methods:'showString4');        
    // }

    public function showString0(){
        return 'simple string0';
    }
    public function showString1(){
        return 'simple string1';
    }
    public function showString2(){
        return 'simple string2';
    }
    public function showString3(){
        return 'simple string3';
    }
    public function showString4(){
        return 'simple string4';
    }
    public function getIndex(){
        // $data=['age'=> 28, 'name'=>'majd'];
        $obj = new \stdClass();
        $obj -> name = 'majd';
        $obj -> age = 28;
        return view('welcome',compact('obj'));
    }
}
