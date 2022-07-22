<?php

namespace App\Http\Controllers;

use App\Rules\WordsCount;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
//        dd($request->all());
        return 'welcome ' . $request->name;
//        dd($request->name);
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
//        dd($request->except('_token'));
//        dd($request->only(['name', 'email']));

//        $name = $request->input('name');
//        $name = $request->post('name');
        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $country = $request->country;

        return view('forms.form2_data', compact('name', 'email', 'gender', 'country'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:30',
            'body' => ['required', new WordsCount()]
        ]);
        dd($request->all());
    }

}
