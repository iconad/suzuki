<?php

namespace App\Http\Livewire;

use Harimayco\Menu\Facades\Menu;
use Livewire\Component;

class MainNavbar extends Component
{
    public function render()
    {
        $menu = Menu::getByName('Menu Top');

        return view('livewire.main-navbar', [
            'menu' => $menu
        ]);
    }
}
