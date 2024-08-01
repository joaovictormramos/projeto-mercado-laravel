<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    function getSections()
    {
        $sections = Section::orderBy('section_name')->get();
        return view("/admin/sections", compact('sections'));
    }

    function formRegisterSection()
    {
        $section = new Section();
        $section->id = 0;
        return view("/admin/register_section", compact('section'));
    }

    function registerSection(Request $request)
    {
        if ($request->input('id') == 0) {
            $section = new Section();
        } else {
            $section = Section::find($request->input('id'));
        }
        $section->section_name = $request->input('name');
        $section->save();
        return redirect('/secoes');
    }

    function formUpdateSection($id)
    {
        $section = Section::find($id);
        return view('/admin/update_section', compact('section'));
    }

    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect('/secoes');
    }
}
