<?php

namespace App\Http\Controllers\API;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function run()
    {
    		$process = new Process(['C:\Users\DA\AppData\Local\Programs\Python\Python38-32\python.exe', app_path().'\scripts\script.py']);
    		$process->run();

    		if (!$process->isSuccessful()) {
				    throw new ProcessFailedException($process);
				}

    		return $process->getOutput();
    }
}
