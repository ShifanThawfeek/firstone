<?php

namespace App\Http\Controllers;

use App\Models\Customization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CustomizationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('user')) {
            return Customization::where('user_id', $request->user)->first();
        }
        return view('customization.index');
    }

    public function update(Request $request)
    {
        $customization = Customization::where('user_id', auth()->id());
        $request['iconColor'] = $request['iconColor'] ?? '';
        // $request['pageBackground'] = $request['pageBackground'] ?? '';//shifan added
        $customization->update($request->only([
            'fontSize', 
            'fontWeight', 
            'fontColor', 
            'fontColorHover', 
            'buttonBackground', 
            'buttonBackgroundHover', 
            'buttonBorderSize', 
            'buttonBorderSizeHover', 
            'buttonBorder', 
            'buttonBorderHover',
            'borderRadius',
            'pageBackground', 
            'iconColor',
            'usernameFontColor',
            'theme_no'
        ]));
        return $customization->first();
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('backgroundImage')) {
            // Get the file
            $file = $request->backgroundImage;
            // Name the file
            $name = Str::random(20) . uniqid('', true) . Str::random(20) . '.' . $file->extension();
            // Upload the file
            $path = Storage::putFileAs('public/backgrounds', $file, $name);
            // Update the records
            $customization = Customization::where('user_id', auth()->id())->first();
            $customization->fill([
                'pageBackground' => url(Storage::url('backgrounds/' . $name)) //in db pageBackground
            ])->save();

            // console.log("I am from uplaod image function @ Cust.Contr");
        }
        return response(url(Storage::url('backgrounds/' . $name)));
        return Customization::where('user_id', auth()->id())->first();
    }

    public function changeTheme(Request $request) 
    {
        Customization::where('user_id', auth()->id())->update($request->all());
    }
}
