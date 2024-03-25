<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class CatalogueController extends Controller
{
    public function index()
    {





        return Inertia::render('Catalogue', [

        ]);
    }
}
