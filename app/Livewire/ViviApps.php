<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ViviApps extends Component
{
    #[Computed]
    public function apps()
    {
        return App::get();
    }

    public function render()
    {
        return view('livewire.vivi-apps');
    }
}
