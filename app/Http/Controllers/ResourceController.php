<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ResourceController extends Controller
{
    public function index(request $request)
    {
        return Inertia ::render("Resources", [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resource::with('category')->get(),
        ]);
    }
    }