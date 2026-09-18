<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class AdminDashboard extends Component
{
    public function render()
    {
        $user = User::find(Auth::id());
        if ($user->role != 'admin') {
            $this->redirectRoute('/');
        }

        return view('livewire.admin.admin-dashboard');
    }
}
