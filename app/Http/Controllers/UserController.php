<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	function init()
	{
		return view('users.edit');
	}

	function update(Request $request)
	{
		$data = $request->input();
		return 'sss';
	}
    
}
