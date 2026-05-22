<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'profile' => Profile::current(),
            'portfolios' => Portfolio::latest()->take(6)->get(),
            'experiences' => Experience::latest()->take(6)->get(),
            'skills' => Skill::orderByDesc('level')->get(),
            'contact' => Contact::latest()->first(),
        ]);
    }
}
