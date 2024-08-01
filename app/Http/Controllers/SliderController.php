<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Portofolio;
use App\Models\Dikerjakan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    // Menampilkan daftar slider
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider', compact('sliders'));
    } 

    // Menampilkan form untuk membuat slider baru
    public function create()
    {
        return view('admin.sliderCreate');
    }

    // Menampilkan slider di tampilan user
    public function show()
    {
        $sliders = Slider::all();
        $portofolio = Portofolio::count();
        $dikerjakan = Dikerjakan::count();
        return view('user.home',  [
            'portofolio' => $portofolio,
            'dikerjakanCount' => $dikerjakan,
            'sliders' => $sliders,
        ]);
    }

    // Menyimpan slider baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'button_text' => 'required_if:show_button,1',
            'button_link' => 'nullable|url',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->show_button = $request->has('show_button');

        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('slider_images', 'public');
        }

        $slider->save();

         // Logging aktivitas ditambah
         ActivityLog::create([
                 'user_id' => Auth::id(),
                 'activity' => 'Slider Telah Ditambah : ' . $slider->title,
         ]);

        return redirect()->route('slider.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit slider
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliderEdit', compact('slider'));
    }

    // Memperbarui slider yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'button_text' => 'required_if:show_button,1',
            'button_link' => 'nullable|url',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->show_button = $request->has('show_button');

        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('slider_images', 'public');
        }

        $slider->save();

        // Logging aktivitas diedit
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'Slider Telah Diedit : ' . $slider->title,
         ]);

        return redirect()->route('slider.index')->with('success', 'Slider berhasil diperbarui.');
    }

    // Menghapus slider
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        // Logging aktivitas dihapus
        ActivityLog::create([
             'user_id' => Auth::id(),
             'activity' => 'Slider Telah Dihapus : ' . $slider->title,
         ]);

        return redirect()->route('slider.index')->with('success', 'Slider berhasil dihapus.');
    }
}
