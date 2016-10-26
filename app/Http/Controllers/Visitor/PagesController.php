<?php

namespace App\Http\Controllers\Visitor;

use App\Acme\Container\DataContainer;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getWebsite(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.index')
            ->with('data', $data);
    }








    public function getServices(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.pages.services')->with('data', $data);
    }

    public function getPortfolio(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.pages.portfolio')->with('data', $data);
    }
    public function getTeam(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.pages.team')->with('data', $data);
    }

    public function getContact(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.pages.contact')->with('data', $data);
    }
    public function getSkills(){
        $data = DataContainer::getOnePageWebsiteData();
        return view('visitor.pages.skills')->with('data', $data);
    }
}
