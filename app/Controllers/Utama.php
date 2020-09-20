<?php namespace App\Controllers;

class Utama extends BaseController {

	public function index() {
    $data = [
      'title' => 'Halaman Utama'
    ];
		return view('utama/index', $data);
	}

}
