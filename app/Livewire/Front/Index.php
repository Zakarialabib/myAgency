<?php

declare(strict_types=1);

namespace App\Livewire\Front;

use App\Models\Project;
use App\Models\Service;
use App\Models\Section;
use App\Models\Partner;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Enums\PageType;
use Livewire\Attributes\Computed;

class Index extends Component
{
    #[Computed]
    public function homeSection()
    {
        return Section::where('type', PageType::HOME)->active()->first();
    }

    #[Computed]
    public function learningServices(): Collection
    {
        return Service::where('type', 'learning')->active()->get();
    }

    #[Computed]
    public function digitalServices(): Collection
    {
        return Service::where('type', 'digital')->active()->get();
    }

    #[Computed]
    public function partners(): Collection
    {
        return Partner::active()->get();
    }

    #[Computed]
    public function projects(): Collection
    {
        return Project::active()->limit(4)->get();
    }

    #[Computed]
    public function aboutSection()
    {
        return Section::where('type', PageType::ABOUT)->active()->first();
    }

    #[Computed]
    public function contactSection()
    {
        return Section::where('type', PageType::CONTACT)->active()->first();
    }

    public function render()
    {
        return view('livewire.front.index')->extends('layouts.guest');
    }
}
