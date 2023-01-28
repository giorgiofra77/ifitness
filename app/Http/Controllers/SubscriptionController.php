<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionsRequest;
use App\Http\Requests\UpdateSubscriptionsRequest;
use App\Models\subscriptions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $subscriptions = Subscriptions::where('account_id', Auth::user()->account_id)->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Subscriptions::create($validated);

        return to_route('subscriptions.index')
            ->with('status', 'Tipologia di abbonamento aggiunta')
            ->with('alert_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function show(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriptions $subscription): View
    {
        return view('subscriptions.edit', ['subscription' => $subscription]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subscriptions  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionsRequest $request, Subscriptions $subscription): RedirectResponse
    {
        $validated = $request->validated();
        $subscription->update($validated);

        return to_route('subscriptions.index')
            ->with('status', 'Tipologia di abbonamento modificata')
            ->with('alert_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscriptions $subscriptions)
    {
        //
    }
}
