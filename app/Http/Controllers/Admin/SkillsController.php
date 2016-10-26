<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Services\MessageService;
use App\Acme\Services\SkillService;
use App\Acme\Services\ValidationService;
use App\Skill;
use App\SubSkill;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $skills = Skill::with('subSkills')->get();
        $subSkills = SubSkill::all();
        return view('admin.pages.skills.index')
            ->with('skills', $skills)
            ->with('subSkills', $subSkills);
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
        $skill = new Skill();
        $validator = Validator::make(Input::all(), Skill::createRules());
        if($validator->fails()){
            return json_encode([
                'errors' => $validator->errors()->getMessages(),
                'code' => 422
            ]);
        }
        $skill->name = Input::get('name');
        $skill->title = Input::get('title');
        $skill->secondary_title = Input::get('secondary_title');
        $skill->body = Input::get('body');
        SkillService::saveSkill($skill);
        echo "correct";
        $data = Input::get('subSkills');
        if($data!=null)
            $skill->subSkills()->sync($data, false);
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
        $skill = Skill::with('subSkills')->find($id);
        $skillSubSkills = $skill->subSkills;
        $subSkills = SubSkill::all();
        return view('admin.pages.skills.edit')
            ->with('skill', $skill)
            ->with('skillSubSkills', $skillSubSkills)
            ->with('subSkills', $subSkills);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        $validator = Validator::make(Input::all(), Skill::createRules());
        if($validator->fails()){
            return json_encode([
                'errors' => $validator->errors()->getMessages(),
                'code' => 422
            ]);
        }
        $skill->name = Input::get('name');
        $skill->title = Input::get('title');
        $skill->secondary_title = Input::get('secondary_title');
        $skill->body = Input::get('body');
        SkillService::saveSkill($skill);
        echo "correct";
        $data = Input::get('subSkills');
        if($data!=null)
            $skill->subSkills()->sync($data, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->subSkills()->detach();
        $skill->delete();
    }
}
