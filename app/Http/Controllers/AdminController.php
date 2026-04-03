<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Settings;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $array[] = ['Name', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }
        return view('backend.index')->with('users', json_encode($array));
    }

    public function profile()
    {
        $profile = Auth()->user();
        return view('backend.users.profile')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Successfully updated your profile');
        } else {
            request()->session()->flash('error', 'Please try again!');
        }
        return redirect()->back();
    }

    public function settings()
    {
        $data = Settings::first();
        return view('backend.setting')->with('data', $data);
    }

    // public function settingsUpdate(Request $request)
    // {
    //     $this->validate($request, [
    //         'short_des' => 'required|string',
    //         'description' => 'required|string',
    //         'photo' => 'required',
    //         'logo' => 'required',
    //         'address' => 'required|string',
    //         'email' => 'required|email',
    //         'phone' => 'required|string',
    //     ]);
    //     $data = $request->all();
    //     $settings = Settings::first();
    //     $status = $settings->fill($data)->save();
    //     if ($status) {
    //         request()->session()->flash('success', 'Setting successfully updated');
    //     } else {
    //         request()->session()->flash('error', 'Please try again');
    //     }
    //     return redirect()->route('admin');
    // }


    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_des' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'logo' => 'nullable|image',
            'photo' => 'nullable|image',
        ]);

        $settings = Settings::first();

        // Text Data
        $settings->title   = $request->title;
        $settings->short_des   = $request->short_des;
        $settings->description = $request->description;
        $settings->address     = $request->address;
        $settings->email       = $request->email;
        $settings->phone       = $request->phone;

        // Logo Upload
        if ($request->hasFile('logo')) {

            if ($settings->logo && file_exists(public_path($settings->logo))) {
                unlink(public_path($settings->logo));
            }

            $settings->logo = FileHelper::upload($request->file('logo'), 'uploads/settings');
        }

        // Favicon Upload
        if ($request->hasFile('photo')) {

            if ($settings->photo && file_exists(public_path($settings->photo))) {
                unlink(public_path($settings->photo));
            }

            $settings->photo = FileHelper::upload($request->file('photo'), 'uploads/settings');
        }

        $settings->save();

        return redirect()->route('admin')->with('success', 'Settings updated successfully');
    }



    public function changePassword()
    {
        return view('backend.layouts.changePassword');
    }

    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('admin')->with('success', 'Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request)
    {
        $data = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();
        $array[] = ['Name', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }
        return view('backend.index')->with('course', json_encode($array));
    }

    public function storageLink()
    {
        // check if the storage folder already linked;
        if (File::exists(public_path('storage'))) {
            // removed the existing symbolic link
            File::delete(public_path('storage'));
            //Regenerate the storage link folder
            try {
                Artisan::call('storage:link');
                request()->session()->flash('success', 'Successfully storage linked.');
                return redirect()->back();
            } catch (\Exception $exception) {
                request()->session()->flash('error', $exception->getMessage());
                return redirect()->back();
            }
        } else {
            try {
                Artisan::call('storage:link');
                request()->session()->flash('success', 'Successfully storage linked.');
                return redirect()->back();
            } catch (\Exception $exception) {
                request()->session()->flash('error', $exception->getMessage());
                return redirect()->back();
            }
        }
    }
}
