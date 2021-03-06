<?php
namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Services\ListeCarteService;

class ListeCarteController extends Controller
{

    protected $listeCarteService;

    public function __construct(ListeCarteService $listeCarteService)
    {
        $this->listeCarteService = $listeCarteService;
    }

    public function seriesPokemon()
    {
        $blocks = $this->listeCarteService->getAllBlocks();
        return view('pokemon/liste-cartes-series', [
            'blocks' => $blocks
        ]);
    }

    public function setsPokemon($id)
    {
        $sets = $this->listeCarteService->getSetsByBlock($id);
        return view('pokemon/liste-cartes-sets', [
            'sets' => $sets,
            'serie' => $id
        ]);
    }

    public function cardsPokemon($serieId, $setCode)
    {
        $cards = $this->listeCarteService->getCardsBySet($setCode);

        return view('pokemon/liste-cartes', [
            'cards' => $cards,
            'serie' => $serieId,
            'setCode' => $setCode
        ]);
    }
    
    public function cardPokemon($serieId, $setCode, $number)
    {
        $card = $this->listeCarteService->getCardByNumber($setCode, $number);
        
        return view('pokemon/carte', [
            'card' => $card,
            'serie' => $serieId,
            'setCode' => $setCode
        ]);
    }
    
    
}