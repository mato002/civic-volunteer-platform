<?php
namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('org.settings.index');
    }

    public function update(Request $request)
    {
        // Save settings logic
        return redirect()->route('org.settings.index')->with('success', 'Settings updated.');
    }
}
?>