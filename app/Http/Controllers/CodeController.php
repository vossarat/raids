<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CodeRequest;
use App\Code;

class CodeController extends Controller
{
	public function __construct(Code $code)
	{
		$this->code = $code;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewdata = $this->code->orderBy('weight')->get();
        return view('code.index')->with([
				'viewdata' => $viewdata,				
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CodeRequest $request)
    {
        Code::create( $request->modifyRequest( $this->code->maxId() ) );
		return redirect( route('code.index') )->with('message','Код добавлен');
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
        return view('code.edit')->with([
				'viewdata' => $this->code->find($id),
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
        $code=$this->code->find($id);	
		
		$code->update($request->all());
		$code->save();
		return redirect(route('code.index'))->with('message',"Информация по коду $code->code-$code->name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = $this->code->find($id);
		$code->delete();
		return back()->with('message',"Информация по коду $code->code-$code->name удалена");
    }
}
