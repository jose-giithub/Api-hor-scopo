<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use App\Http\Requests\StoreHoroscopeRequest;
use App\Http\Requests\UpdateHoroscopeRequest;
use App\Models\Lang;

class HoroscopeController extends Controller
{   
    /**
     * Función para importar los horóscopos en la base de datos.
     * https://www.astrology-zodiac-signs.com/api/call.php?time=today&sign=aries
     */
    public function importHoroscope()
    {
            $langs= Lang::all();
            $horoscopes = ['aquarius', 'pisces', 'aries', 'taurus',
                        'gemini', 'cancer', 'leo', 'virgo', 'libra', 
                        'scorpio', 'sagittarius', 'capricorn'];
            $times = ['today','yesterday','week','month'];
            
            foreach($times as $time){
                foreach($horoscopes as $horoscope){
                    $text = file_get_contents("https://www.astrology-zodiac-signs.com/api/call.php?time=$time&sign=$horoscope");
                    
                    // Obtener la fecha correspondiente al tiempo
                    $date = null;
                    if ($time === 'today') {
                        $date = date('d/m/Y');
                    } elseif ($time === 'yesterday') {
                        $date = date('d/m/Y', strtotime('-1 day'));
                    } elseif ($time === 'week') {
                        // Obtener el primer día de la semana (lunes) y convertirlo al formato deseado
                        $date = date('d/m/Y', strtotime('last monday'));
                    } elseif ($time === 'month') {
                        // Obtener el primer día del mes y convertirlo al formato deseado
                        $date = date('d/m/Y', strtotime('first day of this month'));
                    }
            
                    // Crear el registro del horóscopo con la fecha correspondiente
                    Horoscope::create([
                        'date' => $date,
                        'lang' => 'en',
                        'sign' => $horoscope,
                        'time' => $time,
                        'phrase' => $text,
                    ]);
                }
            }
        return response()->json(['message' => 'Horoscope imported successfully']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHoroscopeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horoscope $horoscope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horoscope $horoscope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHoroscopeRequest $request, Horoscope $horoscope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horoscope $horoscope)
    {
        //
    }
}
