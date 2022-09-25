
<x-app-layout>
    <a href="/redirect" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back </a>
    <div class="mx-4">
        <div class = 'bg-gray-50 border border-gray-200 rounded p-10'>
            <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" src="{{$user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('/storage/2.jpg')}}" />
            <h3 class="text-2xl mb-2">
            {{ $user->name}}
            </h3>

            <div class="text-lg my-4">
                 <i class="fa-solid fa-location-dot"></i> {{$user->company->name}} at {{$user->company->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                 <h3 class="text-3xl font-bold mb-4"> Title</h3>
                <div class="text-lg space-y-6">
                {{$user->title}}
                <a href="mailto:{{$user->email}}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                    class="fa-solid fa-envelope"></i>
                    Contact Employee</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
