<?php
namespace App\Http\Controllers;
class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}
}
