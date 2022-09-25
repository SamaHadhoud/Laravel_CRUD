<x-app-layout>
    <div class = 'bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24'>
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Employee Information</h2>
        <p class="mb-4">Edit: {{$user->name}}</p>
      </header>

      <form method="POST" action="/admin/employee/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Employee Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{$user->name}}" />

          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
            <label for="company_id" class="inline-block text-lg mb-2">Company</label>
                <select class="form-control" name="company_id" id="company_id">
                    @foreach($company as $company)
                    @if($company->id == $user->company_id)
                    <option value={{$company->id}} selected>{{$company->name}}</option>
                    @else
                     <option value={{$company->id}}>{{$company->name}}</option>
                    @endif
                    @endforeach
                </select>
              @error('company_id')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          </div>

        <div class="mb-6">
          <label for="title" class="inline-block text-lg mb-2"> Title</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$user->title}}" />

          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$user->email}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <label for="photo" class="inline-block text-lg mb-2">
            Employee photo
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />

          <img class="w-48 mr-6 mb-6"
            src="{{$user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) :asset('/storage/2.jpg')}}" />

          @error('photo')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Update Emplyee
          </button>

          <a href="/employees/redirect" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </div>
</x-app-layout>
