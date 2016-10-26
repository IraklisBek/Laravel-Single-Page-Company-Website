<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Container\DataContainer;
use App\Acme\Services\TeamService;
use App\Acme\Services\ValidationService;
use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = DataContainer::getOnePageWebsiteData();
        return view('admin.pages.team.index')
            ->with('members', $data['members'])
            ->with('skills', $data['skills'])
            ->with('arrSkills', $data['arrSkills'])
            ->with('arrSubSkills', $data['arrSubSkills']);
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
        $member = new Team;
        $validator = ValidationService::validateCreation($request, $member);
        if($validator->fails())
            return redirect()->route('slider.index')->withErrors($validator)->withInput();
        TeamService::createOrUpdateTeam($member, $request);
        $subSkills = $request->get('subSkills');
        if($subSkills!=null)
            $member->subSkills()->sync($subSkills, false);
        return redirect()->route('team.index');
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
        $member = Team::find($id);
        $data = DataContainer::getOnePageWebsiteData();
        return view('admin.pages.team.edit')
            ->with('member', $member)
            ->with('skills', $data['skills'])
            ->with('arrSkills', $data['arrSkills'])
            ->with('arrSubSkills', $data['arrSubSkills']);
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
        $member = Team::find($id);
        $validator = ValidationService::validateUpdate($request, $member);
        if($validator->fails())
            return redirect()->route('team.update', $id)->withErrors($validator)->withInput();
        TeamService::createOrUpdateTeam($member, $request);
        $subSkills = $request->get('subSkills');
        if($subSkills!=null)
            $member->subSkills()->sync($subSkills, true);
        return redirect()->route('team.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Team::find($id);
        $member->subSkills()->detach();
        $member->delete();
    }
}
