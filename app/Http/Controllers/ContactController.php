<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Validator;


class ContactController extends SiteController
{
    //

    public function __construct(MenuRepository $m_rep)
    {
        parent::__construct($m_rep);

        $this->template = env('THEME'). '.pages.contact';
        $this->bar = 'left';
        $this->title = 'Контакты';
        $this->contactBar = TRUE;

    }

    public function show() {

        $content = view(env('THEME'). '.contacts_content')->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function post(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        return response()->json(['success' => TRUE , 'data' => $data]);
    }


}
