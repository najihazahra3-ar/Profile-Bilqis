<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'portfolioCount' => Portfolio::count(),
            'experienceCount' => Experience::count(),
            'skillCount' => Skill::count(),
            'contactCount' => Contact::count(),
            'latestPortfolios' => Portfolio::latest()->take(5)->get(),
        ]);
    }
}
