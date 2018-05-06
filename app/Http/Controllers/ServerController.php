<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Server;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Server $server)
    {

	    $positions = $server->getPositions();
	    $sizeOfServer = intval($request->input('size'));
	    $sizeOfRack = count ($positions)-1;
	    $gotSpace = 0;
	    $isCompatible = [];


		if($sizeOfServer >=1){
			for ($i = 0; $i <= $sizeOfRack; $i++) {

				if($positions[$i]['occupied'] === 0){
					$gotSpace++;


					if($i < $sizeOfRack){
						for ($o=$i+1; $o <= $sizeOfRack; $o++){

							if($positions[$o]['occupied'] === 0){
								$gotSpace++;
							} else {
								$o = $sizeOfRack+1;
							}

						}
					}


					if($gotSpace >= $sizeOfServer ){
						array_push($isCompatible, $positions[$i]['id']);
						$gotSpace = 0;

					} else{
						$gotSpace = 0;
					}
				} else {
					$gotSpace = 0;
				}
			}

		} else {
			array_push($isCompatible, 'notSent');
		}


	    return view('index',['positions' => $positions, 'isCompatible'=> $isCompatible, 'sizeOfServer' =>$sizeOfServer]);

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
