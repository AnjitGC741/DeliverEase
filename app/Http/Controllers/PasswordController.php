<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function showResetForm()
{
    // Show the password reset form in this password controller page
}

public function reset(Request $request)
{
    // Handle the password reset request same as upper case here.
}

public function showChangeForm()
{
    // Show the password change form
}

public function change(Request $request)
{
    // Handle the password change request
}

}
