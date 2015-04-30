<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Category;
abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct() {
		$this->beforeFilter(function(){
			\View::share('catnav', Category::all());
		});
	}

}
