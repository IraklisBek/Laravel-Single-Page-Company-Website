<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Container\DataContainer;
use App\Acme\Services\ServiceService;
use App\Acme\Services\ValidationService;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = DataContainer::getOnePageWebsiteData();
        return view('admin.pages.services.index')
            ->with('services', $data);
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
        $service = new Service();
        $validator = ValidationService::validateCreation($request, $service);
        if($validator->fails())
            return redirect()->route('services.index')->withErrors($validator)->withInput();
        ServiceService::createOrUpdateService($service, $request);
        return redirect()->route('services.index');
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
        $service = Service::find($id);
        return view('admin.pages.services.edit')
            ->with('service', $service);
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
        $service = Service::find($id);
        $validator = ValidationService::validateCreation($request, $service);
        if($validator->fails())
            return redirect()->route('slider.index')->withErrors($validator)->withInput();
        ServiceService::createOrUpdateService($service, $request);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
    }
}
