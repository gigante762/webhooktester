<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ViviApp extends Component
{
    public App $app;

    #[Computed]
    public function locations()
    {
        return $this->app->locations()->get();
    }

    #[On('echo:webhook,ViviWebhookReceived')]
    public function render()
    {
        return view('livewire.vivi-app');
    }
}
