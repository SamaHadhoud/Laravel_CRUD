<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comabanies - employees') }}
        </h2>
    </x-slot>
    @include('partials._search')

    @foreach ($company as $companyh)
        <div class = 'bg-gray-50 border border-gray-200 rounded p-6'>
            <div class="flex">
                <img class="hidden w-50 mr-6 p-5 py-5 m-1 md:block img-fluid figure-img"
                    src="{{$companyh->logo ? asset('logo/' . $companyh->logo) : asset('/Images/no_logo.png')}}"/>
                <div>
                    <h3 class="text-2xl">
                        <a href="/{{$companyh->id}}">{{ $companyh->name}}</a>
                    </h3>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-earth-americas"></i> <a href="{{$companyh->website}}" target="_blank"> {{ $companyh->website}}</a>
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
                    <div class="text-lg mt-4 fs-4">
                        <i class="fa-solid fa-users-line"></i> Employees :
                    </div>
                    <div class="row text-lg mt-4">
                        @foreach($companyh->users as $user)
                            <div class="col-md-4"><i class="fa-solid fa-user"></i> <a href="/employee/{{$user->id}}">{{ $user->name}}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @extends("search")
</x-app-layout>
