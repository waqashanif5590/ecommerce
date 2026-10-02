<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use RuntimeException;
use Throwable;

#[Layout('layouts.app')]
class CreateCategory extends Component
{
    use WithFileUploads;

    public string $title = '';

    public string $description = '';

    public ?TemporaryUploadedFile $image = null;

    public function mount(): void
    {
        $this->authorizeAdmin();
    }

    public function save(): void
    {
        $this->authorizeAdmin();

        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $imagePath = $validated['image']->storePublicly('images', 'public');

        if ($imagePath === false) {
            throw new RuntimeException('The category image could not be saved.');
        }

        try {
            DB::transaction(function () use ($validated, $imagePath): void {
                Category::query()->create([
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'slug' => $this->uniqueSlug($validated['title']),
                    'image' => basename($imagePath),
                ]);
            });
        } catch (Throwable $exception) {
            Storage::disk('public')->delete($imagePath);

            throw $exception;
        }

        session()->flash('alert', [
            'message' => 'Category created successfully.',
            'type' => 'success',
        ]);

        $this->redirectRoute('categories', navigate: true);
    }

    public function render(): View
    {
        $this->authorizeAdmin();

        return view('livewire.admin.create-category');
    }

    private function authorizeAdmin(): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
    }

    private function uniqueSlug(string $title): string
    {
        $baseSlug = Str::slug($title) ?: 'category';
        $slug = $baseSlug;
        $suffix = 2;

        while (Category::query()->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
