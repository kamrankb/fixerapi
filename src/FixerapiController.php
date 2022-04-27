<?php
namespace KamranKB\FixerApi;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class FixerapiController extends Controller
{
    public function __construct()
    {
        if(!Cache::get('fixerResponse')) {
            $this->fetchRates();
        } 
    }

    public function index()
    {
        $exchangeRates = $this->fetchRates();
        
        $rates = collect(json_decode($exchangeRates));
        return $this->converter('100', 'EUR', $rates['rates']);
    }

    public function fetchRates() {
        $exchangeRates = Cache::remember('fixerResponse', 120, function() {
            $response = Http::get('http://data.fixer.io/api/latest?access_key=82cfbbfcaf955425256da3e6e3277ba3');
            return $response->body();
        });

        return $exchangeRates;
    }

    public function converter($amount, $currencySymbol, $exchangeRates) {
        $currencySymbol = strtoupper($currencySymbol);
        $currencyAmount = $amount/($exchangeRates->{$currencySymbol});
        $convertedAmount = ($exchangeRates->USD)*$currencyAmount;

        return (float) $convertedAmount;
    }

    public function convert($currency_from, $amount, $currency_to) {
        $exchangeRates = $this->fetchRates();
        $rates = collect(json_decode($exchangeRates));
        $exchangeRates = $rates['rates'];
        
        $currency_from = strtoupper($currency_from);
        $currency_to = strtoupper($currency_to);
        
        $currencyAmount = floatval($amount)/floatval($exchangeRates->{$currency_from});
        $convertedAmount = floatval($exchangeRates->{$currency_to}) * floatval($currencyAmount);
        
        return (float) $convertedAmount;
    }
}