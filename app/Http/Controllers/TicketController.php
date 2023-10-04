<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function CrearTicket(Request $request){

        $ticket = new Ticket();

        $ticket -> Titulo = $request -> titulo;
        $ticket -> Contenido = $request -> contenido;
        $ticket -> Estado = $request -> estado;
        $ticket -> Autor = $request -> autor;

        $ticket -> save();
        return $ticket;

    }
    public function EliminarTicket($id){

        $ticket = Ticket::find($id);

        if(!$ticket){
            return response('El Ticket no existe');
        }

        if($ticket->deleted_at != null){
            return response('Ya fue eliminado previamente');
        }

        $ticket -> deleted_at = now();
        $ticket -> save();
        
        return "Se eliminó";
    }

    public function ModificarTicket($id, Request $request){

        $ticket = Ticket::find($id);

        if(!$ticket){
            return response('El ticket no existe');
        }
        
        $validator = Validator::make($request->all(), [

            'titulo' => 'string',
            'contenido' => 'string',
            'estado' => 'string',
            'autor' => 'string',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 406);
        }

    }
    public function ListarTicket(){

        $ticket = Ticket::all();

        return $ticket;

    }

    public function ListaDeTicket($id){

        $ticket = Ticket::find($id);

        if(!$ticket){
            return response('El Ticket no existe');
        }

        return $ticket;

    }
}