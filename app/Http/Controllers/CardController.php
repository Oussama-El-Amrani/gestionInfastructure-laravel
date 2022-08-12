<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cards.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('cards.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $cardRequest)
    {
        Card::create($cardRequest->all());

        return redirect()->route('cards.index')->with('info', 'La nouvelle cartes a bien été ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $user_name = $card->user->name;
        $user_profile = $card->user->state;
        return view('Cards.show', compact('card', 'user_name','user_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $users = User::all();

        return view('cards.edit', compact('card', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $cardRequest, Card $card)
    {
        $card->update($cardRequest->all());

        return redirect()->route('cards.index')->with('info','Votre card a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();
        
        return back()->with('info', 'Votre Card a bien été mis dans la corbeille');
    }

    public function forceDestroy($id)
    {
        Card::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

        return back()->with('info', 'Device a bien été supprimer');
    }

    public function restore($id)
    {
        Card::withTrashed()->whereId($id)->firstOrFail()->restore($id);

        return back()->with('info', 'Cette device a bien été restauré');
    }
}
