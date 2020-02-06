<?php

namespace ThunderByte\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ThunderByte\Http\Controllers\Controller;
use ThunderByte\Ticket;
use \ThunderByte\Http\Requests\Admin\Ticket as TicketRequest;
use Picqer;
use Barryvdh\DomPDF\Facade as PDF;

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
            $numero = 100 . rand(10000, 20000);
            $ticket->number = $numero;
            $ticket->type = 'antecipated';
            $ticket->price = 40.00;
            $ticket->save();

            $title = "INGRESSO ANTECIPADO";

            $pdf = PDF::loadView('admin.tickets.print',[
                'numero' => $numero,
                'title' => $title
            ]);
            return $pdf->setPaper('a7')->stream('Ingresso_Antecipado.pdf');

        } elseif ($ticket->number == 2) {
            $numero = 200 . rand(20001, 30000);
            $ticket->number = $numero;
            $ticket->type = 'saturday';
            $ticket->price = 30.00;
            $ticket->save();

            $title = "INGRESSO - SÁBADO";

            $pdf = PDF::loadView('admin.tickets.print',[
                'numero' => $numero,
                'title' => $title
            ]);
            return $pdf->setPaper('a7')->stream('Ingresso_Sábado.pdf');

        } elseif ($ticket->number == 3) {
            $numero = 300 . rand(30001, 40000);
            $ticket->number = $numero;
            $ticket->type = 'sunday';
            $ticket->price = 30.00;
            $ticket->save();

            $title = "INGRESSO - DOMINGO";

            $pdf = PDF::loadView('admin.tickets.print',[
                'numero' => $numero,
                'title' => $title
            ]);
            return $pdf->setPaper('a7')->stream('Ingresso_Domingo.pdf');
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
