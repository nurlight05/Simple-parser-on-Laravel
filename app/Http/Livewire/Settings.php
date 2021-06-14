<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings as Setting;
use Lorisleiva\CronTranslator\CronTranslator;
use Lorisleiva\CronTranslator\CronParsingException;
use Illuminate\Support\Facades\Artisan;

class Settings extends Component
{
    public $minute;
    public $hour;
    public $day;
    public $month;
    public $weekday;
    public $result;

    public function mount()
    {
        $setting = Setting::get();
        $this->minute = $setting->minute;
        $this->hour = $setting->hour;
        $this->day = $setting->day;
        $this->month = $setting->month;
        $this->weekday = $setting->weekday;
    }

    public function render()
    {
        $this->translate();
        return view('livewire.settings');
    }

    public function translate()
    {
        $pattern = "{$this->minute} {$this->hour} {$this->day} {$this->month} {$this->weekday}";
        try {
            $this->result = CronTranslator::translate($pattern);
        } catch (CronParsingException $th) {
            $this->result = 'error';
        }
    }

    public function saveSettings()
    {
        $setting = Setting::get();
        if ($setting) {
            $setting->minute = $this->minute;
            $setting->hour = $this->hour;
            $setting->day = $this->day;
            $setting->month = $this->month;
            $setting->weekday = $this->weekday;
            $setting->save();
            session()->flash('message', 'Schedule settings successfully updated.');
        }
    }

    public function parse()
    {
        Artisan::call('schedule:run');
    }
}
