<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3 overflow-auto">

    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('admin.dashboard') }}" :isActive="request()->routeIs('admin.dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <x-sidebar.link title="{{ __('About') }}" href="{{ route('admin.about.index') }}" :isActive="request()->routeIs('admin.about.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <x-sidebar.link title="{{ __('Section titles') }}" href="{{ route('admin.sections.index') }}" :isActive="request()->routeIs('admin.sections.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <x-sidebar.link title="{{ __('Team') }}" href="{{ route('admin.teams.index') }}" :isActive="request()->routeIs('admin.teams.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="{{ __('Blogs') }}" href="{{ route('admin.blogs.index') }}" :isActive="request()->routeIs('admin.blogs.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="{{ __('Blog Categories') }}" href="{{ route('admin.bcategories.index') }}" :isActive="request()->routeIs('admin.bcategories.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="{{ __('Services') }}" href="{{ route('admin.services.index') }}" :isActive="request()->routeIs('admin.services.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="{{ __('Portfolio') }}" href="{{ route('admin.portfolios.index') }}" :isActive="request()->routeIs('admin.portfolios.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
   
    {{-- <x-sidebar.link title="{{ __('Menu') }}" href="{{ route('admin.menu.index') }}" :isActive="request()->routeIs('admin.menu.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link> --}}

    <x-sidebar.link title="{{ __('Users') }}" href="{{ route('admin.users.index') }}" :isActive="request()->routeIs('admin.users.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
   
    <x-sidebar.link title="{{ __('Contact') }}" href="{{ route('admin.contact') }}" :isActive="request()->routeIs('admin.contact')">
        <x-slot name="icon">
            <x-heroicon-o-mail class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <x-sidebar.dropdown title="{{ __('Settings') }}" :active="Str::startsWith(request()->route()->uri(), 'Settings')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="{{ __('Permission') }}" href="{{ route('admin.permissions.index') }}"
            :active="request()->routeIs('admin.permissions.index')" />
        <x-sidebar.sublink title="{{ __('Roles') }}" href="{{ route('admin.roles.index') }}"
            :active="request()->routeIs('admin.roles.index')" />
        
         <x-sidebar.sublink title="{{ __('General Settings') }}" href="{{ route('admin.settings.index') }}"
        :active="request()->routeIs('admin.settings.index')" /> 

        <x-sidebar.sublink title="{{ __('Languages') }}" href="{{ route('admin.language.index') }}"
        :active="request()->routeIs('admin.language.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="{{ __('Logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logoutform').submit();" href="#">
        <x-slot name="icon">
            <x-heroicon-o-logout class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
       
</x-perfect-scrollbar>