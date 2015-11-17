<?php

namespace App\Http\Controllers;

use DB;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.Andrei111111
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', ['clients' => $clients, 'count' => Client::count()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create', [] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
		
        $this->validate($request, [
        'LicencePlate' => ['required','regex:/\b([A-Z]{3}\s?(\d{3}|\d{2}|d{1})\s?[A-Z])|([A-Z]\s?(\d{3}|\d{2}|\d{1})\s?[A-Z]{3})|(([A-HK-PRSVWY][A-HJ-PR-Y])\s?([0][2-9]|[1-9][0-9])\s?[A-HJ-PR-Z]{3})\b/'],
        'ClientId' => ['required','exists:Clients,Id'],
		]);
		
        Client::create( $input );

        return Redirect::route('clients.index')->with('message', 'Client created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //var_dump($client->cars()->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CLient $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client)
    {
        //
        $input = array_except(Input::all(), ['_method']);

        $client->update( $input );


        return Redirect::route('clients.index')->with('message', 'Client updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client->cars->count() == 0)
        {
            $client->delete();
            return Redirect::route('clients.index')->with('message', 'Client deleted');
        }

        return Redirect::route('clients.index')->with('message', 'Client NOT deleted; delete the associated cars first');

    }
}
