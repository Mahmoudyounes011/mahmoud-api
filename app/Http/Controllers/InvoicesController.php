<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Http\Requests\StoreInvoicesRequest;
use App\Http\Requests\UpdateInvoicesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoicesRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoicesRequest $request, Invoices $invoices): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices): RedirectResponse
    {
        //
    }
}
