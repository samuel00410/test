<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account_info;

class MemberController extends Controller
{
    public function index()
    {
        $members = Account_info::all();

        return view('members.index',[
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'account' => [                                  //包含英文大小寫和數字
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_.-]*$/i',
            ],
            'name' => ['required'],
            'gender' => ['required'],
            'birth' => ['required'],
            'email' => ['required','regex:/^.+@.+$/i'],   
            'remark' => ['nullable'],
        ]);

       Account_info::create($validatedData);

        return redirect()->route('member.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Account_info::find($id);

        return view('members.edit',[
            'member' => $member,
        ]);
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
        $member = Account_info::where('id',$id)->first();

        $validatedData = $request->validate([
            'account' => [                                  //包含英文大小寫和數字
                'required',
                'string',
                'regex:/^[a-zA-Z0-9_.-]*$/i',
            ],
            'name' => ['required'],
            'gender' => ['required'],
            'birth' => ['required'],
            'email' => ['required','regex:/^.+@.+$/i'],   
            'remark' => ['nullable'],
        ]);

        $member->update($validatedData);

        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Account_info::where('id',$id)->first();

        $member->delete();

        return redirect()->route('member.index');
    }
}
