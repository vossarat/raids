<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegionRequest;
use App\Region;
use App\City;

class RegionController extends Controller
{
	public function __construct(Region $region, City $city)
	{
		$this->region = $region;
		$this->city = $city;
	}
		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//$mo=$this->region->find(107);
    	//dd($mo->city->name);
        $viewdata = $this->region->all();
        return view('region.index')->with([
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
        return view('region.create')->with([
				'referenceRegion' => $this->region->all(),
				'referenceCity' => $this->city->all(),
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        Region::create( $request->modifyRequest( $this->region->maxId() ) );
		return redirect( route('region.index') )->with('message','МО добавлена');
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
        return view('region.edit')->with([
				'referenceRegion' => $this->region->all(),
				'referenceCity' => $this->city->all(),
				'viewdata' => $this->region->find($id),
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
		$mo=$this->region->find($id);	
		
		$mo->update($request->all());
		$mo->save();
		return redirect(route('region.index'))->with('message',"Информация по МО $mo->name изменена");
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mo = $this->region->find($id);
		$mo->delete();
		return back()->with('message',"Информация по МО $mo->name удалена");
    }
}
