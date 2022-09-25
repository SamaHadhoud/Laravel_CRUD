<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comabanies') }}
        </h2>
    </x-slot>
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($company as $companyh)
        <div class = 'bg-gray-50 border border-gray-200 rounded p-6'>
            <div class="flex">
                <img class="hidden w-50 h-50 mr-6  md:block" src="{{$companyh->logo ? asset('logo/' . $companyh->logo) : asset('/Images/no_logo.png')}}"/>
                <div>
                    <h3 class="text-2xl">
                        <a href="/{{$companyh->id}}">{{ $companyh->name}}</a>
                    </h3>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-earth-americas"></i> <a href="{{$companyh->website}}" target="_blank">{{ $companyh->website}}</a>
                    </div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-at"></i> <a href="mailto:{{$companyh->email}}" >{{ $companyh->email}}</a>
                    </div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $companyh->location}}
                    </div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-pen-to-square"></i> {{ $companyh->description}}
                    </div>
                 </div>
            </div>
        </div>
        @endforeach
    </div>
    @extends('search')
</x-app-layout>

