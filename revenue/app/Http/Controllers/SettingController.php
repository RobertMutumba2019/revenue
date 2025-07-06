<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function showSettingsForm()
    {
        $settings = DB::table('vehicles')->where('settings_id', 1)->first();
        return view('settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'settings_fuel_request_validity' => 'required|numeric',
            'settings_fuel_consumption' => 'required|numeric',
            'settings_vehicle_request_validity' => 'required|numeric',
            'settings_dialy_distance_territory' => 'required|numeric',
            'settings_expiry_reminder' => 'required|numeric',
            'settings_radius_out_of_kampala' => 'required|numeric',
        ]);

        $data = [
            'settings_fuel_request_validity' => $request->settings_fuel_request_validity,
            'settings_fuel_consumption' => $request->settings_fuel_consumption,
            'settings_vehicle_request_validity' => $request->settings_vehicle_request_validity,
            'settings_dialy_distance_territory' => $request->settings_dialy_distance_territory,
            'settings_expiry_reminder' => $request->settings_expiry_reminder,
            'settings_radius_out_of_kampala' => $request->settings_radius_out_of_kampala,
            'settings_date_added' => now(),
            'settings_added_by' => Auth::id(),
        ];

        $exists = DB::table('vehicles')->where('settings_id', 1)->exists();

        if ($exists) {
            DB::table('vehicles')->where('settings_id', 1)->update($data);
        } else {
            $data['settings_id'] = 1;
            DB::table('vehicles')->insert($data);
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
