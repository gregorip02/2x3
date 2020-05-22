<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        $payments = $client->payments()->get();

        return PaymentResource::collection($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PaymentRequest $request)
    {
        return Payment::create($request->validated());
    }
}
