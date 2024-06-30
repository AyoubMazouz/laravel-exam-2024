<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProfileRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CandidateCreateRequest;


class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('home', compact('candidates'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CandidateCreateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('cv')) {
            $data['cv_path'] = $request->file('cv')->store('cvs');
        }

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('photos');
        }

        // dd($request->all());

        Candidate::create($data);

        session()->flash('success', 'Candidate profile is created successfully.!');

        return redirect()->route('home');
    }
}
