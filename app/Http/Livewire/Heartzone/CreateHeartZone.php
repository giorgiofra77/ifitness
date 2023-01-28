<?php

namespace App\Http\Livewire\Heartzone;

use App\Models\HeartZone;
use Livewire\Component;

class CreateHeartZone extends Component
{
    public $heart_zone_1_min;

    public $heart_zone_1_max;

    public $heart_zone_2_min;

    public $heart_zone_2_max;

    public $heart_zone_3_min;

    public $heart_zone_3_max;

    public $heart_zone_4_min;

    public $heart_zone_4_max;

    public $heart_zone_5_min;

    public $heart_zone_5_max;

    public $heart_zone_6_min;

    public $heart_zone_6_max;

    public $heart_zone_7_min;

    public $heart_zone_7_max;

    public $heart_max;

    public $customer_id;

    public $confirm = 'primary';

    public $btn_message = 'Aggiorna';

    public $btn_icon = 'bi bi-pencil-square';

    protected $rules = [
        'customer_id' => 'required|exists:customers,id',
        'heart_max' => 'required|numeric|min:0|max:999',
        'heart_zone_1_min' => 'required|numeric|min:0|max:999',
        'heart_zone_1_max' => 'required_with:heart_zone_1_min|numeric|max:999|gte:heart_zone_1_min',
        'heart_zone_2_min' => 'required|numeric|max:999|gte:heart_zone_1_max',
        'heart_zone_2_max' => 'required_with:heart_zone_2_min|numeric|max:999|gte:heart_zone_2_min',
        'heart_zone_3_min' => 'required|numeric|max:999|gte:heart_zone_2_max',
        'heart_zone_3_max' => 'required_with:heart_zone_3_min|numeric|max:999|gte:heart_zone_3_min',
        'heart_zone_4_min' => 'required|numeric|max:999|gte:heart_zone_3_max',
        'heart_zone_4_max' => 'required_with:heart_zone_4_min|numeric|max:999|gte:heart_zone_4_min',
        'heart_zone_5_min' => 'required|numeric|max:999|gte:heart_zone_4_max',
        'heart_zone_5_max' => 'required_with:heart_zone_5_min|numeric|max:999|gte:heart_zone_5_min',
        'heart_zone_6_min' => 'required|numeric|max:999|gte:heart_zone_5_max',
        'heart_zone_6_max' => 'required_with:heart_zone_6_min|numeric|max:999|gte:heart_zone_6_min',
        'heart_zone_7_min' => 'required|string:10|',
        'heart_zone_7_max' => 'required|string:10|',
    ];

    public function render()
    {
        return view('livewire.heartzone.create-heart-zone');
    }

    public function mount($customer_id)
    {
        $heartzone = HeartZone::firstWhere('customer_id', $customer_id);
        if ($heartzone) {
            $this->heart_zone_1_min = $heartzone->heart_zone_1_min;
            $this->heart_zone_1_max = $heartzone->heart_zone_1_max;
            $this->heart_zone_2_min = $heartzone->heart_zone_2_min;
            $this->heart_zone_2_max = $heartzone->heart_zone_2_max;
            $this->heart_zone_3_min = $heartzone->heart_zone_3_min;
            $this->heart_zone_3_max = $heartzone->heart_zone_3_max;
            $this->heart_zone_4_min = $heartzone->heart_zone_4_min;
            $this->heart_zone_4_max = $heartzone->heart_zone_4_max;
            $this->heart_zone_5_min = $heartzone->heart_zone_5_min;
            $this->heart_zone_5_max = $heartzone->heart_zone_5_max;
            $this->heart_zone_6_min = $heartzone->heart_zone_6_min;
            $this->heart_zone_6_max = $heartzone->heart_zone_6_max;
            $this->heart_zone_7_min = $heartzone->heart_zone_7_max;
            $this->heart_zone_7_max = $heartzone->heart_zone_7_max;
            $this->heart_max = $heartzone->heart_max;
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
        HeartZone::updateOrCreate(['customer_id' => $this->customer_id], $validate);
        usleep(300000);
        $this->messageUpdate();
    }

    private function messageUpdate()
    {
        $this->confirm = 'success';
        $this->btn_message = 'Salvato';
        $this->btn_icon = 'bi bi-check-lg';
    }
}
