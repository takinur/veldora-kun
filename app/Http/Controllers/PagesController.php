<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $title = "Wellcome to Courier in Moscow  -Fast Relaiable Service";
        return view('index')->with('title', $title);
    }
    public function about()
    {
        $title = "About Courier in Moscow";
        return view('about')->with('title', $title);
    }
    public function contact()
    {
        $title = "Contact us -Courier in Moscow";
        return view('contact')->with('title', $title);
    }
    public function service()
    {
        $title = "Services we Provide -Courier in Moscow";
        return view('service')->with('title', $title);
    }

    public function approval()
    {

        return view('approval');
    }

    //Dashboard Views
    public function dashboard()
    {
        if(Auth::user()->hasROle('admin')){
            return view('admin.index');
        }
        elseif (Auth::user()->hasRole('customer')) {

            return view('customer.index');
        }
        elseif (Auth::user()->hasRole('driver')) {

            return view('driver.index');
        }
        else{
            return redirect('/');
        }

    }
}
