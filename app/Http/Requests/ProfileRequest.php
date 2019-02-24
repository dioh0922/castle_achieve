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
      "required|file|image|mimes:jpeg,png,jpg,gif|max:2048"
    ];
  }
}

?>