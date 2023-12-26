<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class VoteController extends Controller
{
    public function __invoke(Request $request, Resource $resource)
    {
        // Buscar o crear al votante
        $voter = Voter::gerOrCreateVoter($request);
    
    //toggle del voto
        $resource->votes()->toggle($voter->id);

    // Devolverle el resource actualizado con su recuento de voto
        return $resource->load('votes', 'category');
}
}