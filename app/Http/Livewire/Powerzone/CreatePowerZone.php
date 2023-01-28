<?php

namespace App\Http\Livewire\Powerzone;

use App\Models\PowerZone;
use Livewire\Component;

class CreatePowerZone extends Component
{
    public $power_zone_1_min, $power_zone_1_max, $power_zone_2_min, $power_zone_2_max, $power_zone_3_min, $power_zone_3_max;

    public $power_zone_4_min, $power_zone_4_max,$power_zone_5_min,$power_zone_5_max,$power_zone_6_min,$power_zone_6_max,$power_zone_7_min;

    public $power_zone_7_max, $power_max;

    public $customer_id;

    public $confirm = 'primary';

    public $btn_message = 'Aggiorna';

    public $btn_icon = 'bi bi-pencil-square';

    protected $rules = [
        'customer_id' => 'required|exists:customers,id',
        'power_max' => 'required|numeric|min:0|max:999',
        'power_zone_1_min' => 'required|numeric|min:0|max:999',
        'power_zone_1_max' => 'required_with:power_zone_1_min|numeric|max:999|gte:power_zone_1_min',
        'power_zone_2_min' => 'required|numeric|max:999|gte:power_zone_1_max',
        'power_zone_2_max' => 'required_with:power_zone_2_min|numeric|max:999|gte:power_zone_2_min',
        'power_zone_3_min' => 'required|numeric|max:999|gte:power_zone_2_max',
        'power_zone_3_max' => 'required_with:power_zone_3_min|numeric|max:999|gte:power_zone_3_min',
        'power_zone_4_min' => 'required|numeric|max:999|gte:power_zone_3_max',
        'power_zone_4_max' => 'required_with:power_zone_4_min|numeric|max:999|gte:power_zone_4_min',
        'power_zone_5_min' => 'required|numeric|max:999|gte:power_zone_4_max',
        'power_zone_5_max' => 'required_with:power_zone_5_min|numeric|max:999|gte:power_zone_5_min',
        'power_zone_6_min' => 'required|numeric|max:999|gte:power_zone_5_max',
        'power_zone_6_max' => 'required_with:power_zone_6_min|numeric|max:999|gte:power_zone_6_min',
        'power_zone_7_min' => 'required|string:10|',
        'power_zone_7_max' => 'required|string:10|',
    ];

    public function render()
    {
        return view('livewire.powerzone.create-power-zone');
    }

    public function mount($customer_id)
    {
        $powerzone = PowerZone::firstWhere('customer_id', $customer_id);
        if ($powerzone) {
            $this->power_zone_1_min = $powerzone->power_zone_1_min;
            $this->power_zone_1_max = $powerzone->power_zone_1_max;
            $this->power_zone_2_min = $powerzone->power_zone_2_min;
            $this->power_zone_2_max = $powerzone->power_zone_2_max;
            $this->power_zone_3_min = $powerzone->power_zone_3_min;
            $this->power_zone_3_max = $powerzone->power_zone_3_max;
            $this->power_zone_4_min = $powerzone->power_zone_4_min;
            $this->power_zone_4_max = $powerzone->power_zone_4_max;
            $this->power_zone_5_min = $powerzone->power_zone_5_min;
            $this->power_zone_5_max = $powerzone->power_zone_5_max;
            $this->power_zone_6_min = $powerzone->power_zone_6_min;
            $this->power_zone_6_max = $powerzone->power_zone_6_max;
            $this->power_zone_7_min = $powerzone->power_zone_7_max;
            $this->power_zone_7_max = $powerzone->power_zone_7_max;
            $this->power_max = $powerzone->power_max;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetButton();
    }

    public function resetButton()
    {
        $this->confirm = 'primary';
        $this->btn_message = 'Aggiorna';
        $this->btn_icon = 'bi bi-pencil-square';
    }

    public function submit()
    {
        $validate = $this->validate();
        PowerZone::updateOrCreate(['customer_id' => $this->customer_id], $validate);
        usleep(300000);
        $this->messageUpdate();

        //return Storage::put('power_zone.json',collect($validate)->toJson());
    }

    private function messageUpdate()
    {
        $this->confirm = 'success';
        $this->btn_message = 'Salvato';
        $this->btn_icon = 'bi bi-check-lg';
    }
}
