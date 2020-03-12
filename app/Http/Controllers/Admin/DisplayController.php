<?php

namespace App\Http\Controllers\Admin;

use App\Display;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DisplayController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = $user->display;
        $active = 'display';

        return view('admin.display',
            compact('data', 'user', 'active'));
    }

    public function update(Request $request)
    {
        try {
            $data = [
                'bright_color' => $request->bright_color,
                'dark_color' => $request->dark_color,
                'info_1' => $request->info_1,
                'info_2' => $request->info_2,
                's_info_1' => $request->s_option_1 . '::' . $request->s_info_1,
                's_info_2' => $request->s_option_2 . '::' . $request->s_info_2,
                's_info_3' => $request->s_option_3 . '::' . $request->s_info_3,
                's_info_4' => $request->s_option_4 . '::' . $request->s_info_4,
                'icon_1' => $request->icon_option_1 . '::' . $request->icon_1,
                'icon_2' => $request->icon_option_2 . '::' . $request->icon_2,
                'icon_3' => $request->icon_option_3 . '::' . $request->icon_3,
            ];
            Display::where('user_id', auth()->user()->id)->update($data);

            Session::flash('message', 'Display setting has been updated..');
            Session::flash('result', true);
        } catch (\Exception $e) {
            Session::flash('message', 'Something went wrong plesae try again..');
        }
        return back();
    }

    public function update_image(Request $request)
    {
        try {
            if ($request->file) {
                $path = 'assets/images';
                $file_name = uniqid() . '.' . $request->file->getClientOriginalExtension();
                $file = $request->file->move($path, $file_name);
                if ($request->type == 'logo') {
                    Display::where('user_id', auth()->user()->id)->update(['logo' => $file]);
                } else {
                    Display::where('user_id', auth()->user()->id)->update(['banner' => $path.'/'.$file_name]);
                }
                Session::flash('message', 'Information has been successfully updated..');
                Session::flash('result', true);
            }
            else{
                Session::flash('message', 'Please select a file then try again...');
            }
        } catch (\Exception $e) {
            Session::flash('message', 'Something went wrong please try again');
        }
        return back();
    }

}
