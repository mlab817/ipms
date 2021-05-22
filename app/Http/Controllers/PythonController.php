<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function run()
    {
    		$output = exec('python C:/Users/DA/Desktop/hello.py');

    		return $output;
    }
}
