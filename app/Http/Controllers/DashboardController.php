<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'John Doe',
                'age' => 25,
            ],
            [
                'name' => 'Jane Doe',
                'age' => 26,
            ],
            [
                'name' => 'Johnny Doe',
                'age' => 17,
            ]
        ];

        return view(
            'dashboard',
            [
                'ideas' => Idea::orderBy('created_at', 'DESC')->get(),
            ]
        );
    }
}
