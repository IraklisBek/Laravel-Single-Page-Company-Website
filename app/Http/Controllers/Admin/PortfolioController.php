<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Services\PortfolioService;
use App\Acme\Services\ValidationService;
use App\Portfolio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('admin.pages.portfolio.index')
            ->with('portfolio', $portfolio);
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
        $portfolio = new Portfolio;
        $validator = ValidationService::validateCreation($request, $portfolio);
        if($validator->fails())
            return redirect()->route('portfolio.index')->withErrors($validator)->withInput();
        PortfolioService::createOrUpdatePortfolio($portfolio, $request);
        return redirect()->route('portfolio.index');
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
        $portfolio = Portfolio::find($id);
        return view('admin.pages.portfolio.edit')
            ->with('portfolio', $portfolio);
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
        $portfolio = Portfolio::find($id);
        $validator = ValidationService::validateUpdate($request, $portfolio);
        if($validator->fails())
            return redirect()->route('portfolio.index')->withErrors($validator)->withInput();
        PortfolioService::createOrUpdatePortfolio($portfolio, $request);
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
    }
}
