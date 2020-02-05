<?php

namespace ThunderByte\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ThunderByte\Http\Controllers\Controller;
use ThunderByte\Ticket;
use \ThunderByte\Http\Requests\Admin\Ticket as TicketRequest;
use Picqer;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tickets.index');
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
    public function store(TicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->fill($request->all());

        //var_dump($ticket->getAttributes());
        if ($ticket->number == 1) {
            $numero = 100 . rand(1000, 10000);
            $ticket->number = $numero;
            $ticket->type = 'antecipated';
            $ticket->price = 40.00;
            $ticket->save();

            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($numero, $generator::TYPE_CODE_128);

        } elseif ($ticket->number == 2) {
            $numero = 200 . rand(10001, 20000);
            $ticket->number = $numero;
            $ticket->type = 'saturday';
            $ticket->price = 30.00;
            $ticket->save();

            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($numero, $generator::TYPE_CODE_128);
        } elseif ($ticket->number == 3) {
            $numero = 300 . rand(20001, 30000);
            $ticket->number = $numero;
            $ticket->type = 'sunday';
            $ticket->price = 30.00;
            $ticket->save();

            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($numero, $generator::TYPE_CODE_128);
        }
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
