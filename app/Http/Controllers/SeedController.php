<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeedController extends Controller
{
    public function index()
    {
        Artisan::call('db:wipe');
        Artisan::call('migrate');
        Artisan::call("db:seed", ['--class' => 'DatabaseSeeder']);

        return "Generation was successful";
    }
}
