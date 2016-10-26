<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Services\MessageService;
use App\Acme\Services\SlideService;
use App\Acme\Services\ValidationService;
use App\Slide;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.pages.slider.index')
            ->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slide = new Slide;
        $validator = ValidationService::validateCreation($request, $slide);
        if($validator->fails())
            return redirect()->route('slider.index')->withErrors($validator)->withInput();
        SlideService::createOrUpdateSlide($slide, $request);
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.pages.slider.edit')
            ->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::find($id);
        $validator = ValidationService::validateUpdate($request, $slide);
        if($validator->fails())
            return redirect()->route('slider.index')->withErrors($validator)->withInput();
        SlideService::createOrUpdateSlide($slide, $request);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
    }
}
