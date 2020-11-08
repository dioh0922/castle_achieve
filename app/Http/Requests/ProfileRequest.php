<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return[
      "photo" =>
      "file|image|mimes:jpeg,png,jpg,gif|max:2048"
			/*
			"famus" =>
      "required|file|image|mimes:jpeg,png,jpg,gif|max:2048"
			*/
    ];
  }
}

?>
