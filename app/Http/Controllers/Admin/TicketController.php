<?php

namespace ThunderByte\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer;
use ThunderByte\Http\Controllers\Controller;
use ThunderByte\Http\Requests\Admin\Ticket as TicketRequest;
use ThunderByte\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        $antecipated = Ticket::where('type', 'Antecipado')->count();
        $saturday = Ticket::where('type', 'Sábado')->count();
        $sunday = Ticket::where('type', 'Domingo')->count();

        $ticketsTotal = Ticket::all()->count();

        $presents = Ticket::where('control', 'present')->count();

        return view('admin.tickets.index', [
            'tickets' => $tickets,
            'antecipated' => $antecipated,
            'saturday' => $saturday,
            'sunday' => $sunday,
            'total' => $ticketsTotal,
            'presents' => $presents
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        switch ($request['action']) {
            case 'Antecipado':
                $ticket = new Ticket();
                $numero = 100 . rand(10000, 20000);
                $ticket->number = $numero;
                $ticket->type = 'Antecipado';
                $ticket->price = 40.00;
                $ticket->save();

                $title = "INGRESSO ANTECIPADO";

                $pdf = PDF::loadView('admin.tickets.print', [
                    'numero' => $numero,
                    'title' => $title
                ]);
                return $pdf->setPaper('a7', 'landscape')->stream('Ingresso_Antecipado.pdf');
                break;

            case 'Sábado':
                $ticket = new Ticket();
                $numero = 200 . rand(20001, 30000);
                $ticket->number = $numero;
                $ticket->type = 'Sábado';
                $ticket->price = 30.00;
                $ticket->save();

                $title = "INGRESSO - SÁBADO";

                $pdf = PDF::loadView('admin.tickets.print', [
                    'numero' => $numero,
                    'title' => $title
                ]);
                return $pdf->setPaper('a7')->stream('Ingresso_Sábado.pdf');
                break;

            case 'Domingo':
                $ticket = new Ticket();
                $numero = 300 . rand(30001, 40000);
                $ticket->number = $numero;
                $ticket->type = 'Domingo';
                $ticket->price = 30.00;
                $ticket->save();

                $title = "INGRESSO - DOMINGO";

                $pdf = PDF::loadView('admin.tickets.print', [
                    'numero' => $numero,
                    'title' => $title
                ]);
                return $pdf->setPaper('a7')->stream('Ingresso_Domingo.pdf');
                break;

            default:
                $ticket = new Ticket();
                $ticket->number = $request->number;

                DB::table('tickets')->where('number', $ticket->number)->update(array('control' => 'Presente'));

                return redirect()->route('admin.tickets.control');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        $ticket = Ticket::where('number', $number);
        return view('admin.tickets.control', [
            'ticket' => $ticket
        ]);
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function control()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.control', [
            'tickets' => $tickets
        ]);
    }
}
