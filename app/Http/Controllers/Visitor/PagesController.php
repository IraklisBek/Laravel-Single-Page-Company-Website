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
}
