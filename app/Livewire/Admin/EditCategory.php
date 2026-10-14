<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class EditCategory extends Component
{
    use WithFileUploads;

    public Category $category;

    public string $title = '';

    public string $description = '';

    public ?TemporaryUploadedFile $image = null;

    public function mount(Category $category): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $this->category = $category;
        $this->title = $category->title;
        $this->description = $category->description;
    }

    public function save(): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($this->image instanceof TemporaryUploadedFile) {
            $storagePath = $this->image->store('images/categories', 'public');
            $validated['image'] = basename($storagePath);
        } else {
            unset($validated['image']);
        }

        $this->category->update($validated);

        session()->flash('alert', [
            'message' => 'Category updated successfully.',
            'type' => 'success',
        ]);

        $this->redirectRoute('categories', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.admin.edit-category', [
            'category' => $this->category,
        ]);
    }
}
