<?php

namespace App\Http\Livewire\Account;
use App\Models\Account;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{
    public Account $account;
    public $account_id, $ragsociale, $email, $address, $city, $state, $zip, $cell, $phone, $piva, $cfisc;
    public $isvalid = '';

    protected function rules()
    {
        return [
            'ragsociale' => ['required', 'min:3', 'max:255', 'string'],
            'address' => ['string', 'max:255', 'nullable'],
            'city' => ['string', 'max:50', 'nullable'],
            'zip' => ['string', 'max:15', 'nullable'],
            'email' => ['email', 'max:100', Rule::unique('accounts')->ignore($this->account_id), 'required'],
            'cell' => ['string', 'max:50', 'nullable'],
            'piva' => ['required','string', Rule::unique('accounts')->ignore($this->account_id), 'max:50'],
            'state' => ['string', 'max:50', 'nullable'],
            'cfisc' => ['required','string', Rule::unique('accounts')->ignore($this->account_id), 'max:50'],
            'phone' => ['string', 'max:50', 'nullable'],
        ];
    }

    public function mount()
    {

        $this->account_id = $this->account->id;
        $this->ragsociale = $this->account->ragsociale;
        $this->address = $this->account->address;
        $this->city = $this->account->city;
        $this->zip = $this->account->zip;
        $this->email = $this->account->email;
        $this->state = $this->account->state;
        $this->cell = $this->account->cell;
        $this->phone = $this->account->phone;
        $this->piva = $this->account->piva;
        $this->cfisc = $this->account->cfisc;

    }

    public function render()
    {
        return View::make('livewire.account.edit');
    }

    public function cancel()
    {
        return to_route('homepage.index');
    }

    public function update()
    {
        $validate = $this->validate();
        usleep(300000);
        Account::where('id', $this->account_id)->update($validate);
        $this->isvalid = 'is-valid';
    }
}
