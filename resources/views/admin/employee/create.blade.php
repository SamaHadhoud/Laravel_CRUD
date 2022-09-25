<x-app-layout>
    <div class = 'bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24'>
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Add employee </h2>
      </header>
      <form method="POST" action="{{route('postemployee')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Employee Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
            value="{{old('name')}}" />
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mb-6">
            <label for="company_id" class="inline-block text-lg mb-2">Company</label>
                <select class="form-control" name="company_id" id="company_id">
                    @foreach($company as $company)
                     <option value={{$company->id}}>{{$company->name}}</option>
                    @endforeach
                </select>
              @error('company_id')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          </div>


        <div class="mb-6">
          <label for="title" class="inline-block text-lg mb-2"> Title</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('location')}}" />

          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="inline-block text-lg mb-2">
            Contact Email
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <label for="photo" class="inline-block text-lg mb-2">
            Employee photo
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />

          @error('photo')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>


        <div class="mb-6">
          <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Add Employee
          </button>

          <a href="/employees/redirect" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </div>
</x-app-layout>
