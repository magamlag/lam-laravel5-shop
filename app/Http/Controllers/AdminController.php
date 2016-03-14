<?php
namespace App\Http\Controllers;
use View;

class AdminController extends Controller {

	public function index()
	{
		return View::make('admin.index');
	}
}
