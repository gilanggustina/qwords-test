@extends('template.template')
@section('content')

  <div class="w-full grid grid-cols-1 gap-2 border border-white shadow-lg rounded-lg min-w-[60vw]">
    <div class="bg-[#ff7b23] text-white w-full flex p-2 rounded-lg">{{Session::get('domain_name') ? 'Checkout' : 'Register'}}</div>
    <div>
      <form id="form-register" method="post" action="{!! route('register.store') !!}">
        @csrf
        <div class="w-full grid grid-cols-1 gap-2 p-2 relative bg-[#fff8f3]">
          @if (Session::get('domain_name'))
            <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
              <x-forms.label for="">{{Session::get('domain_name')}}</x-forms.label>
              <x-forms.select class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="domain_contract" required>
                <option value="1">1 Tahun</option>
                <option value="2">2 Tahun</option>
                <option value="3">3 Tahun</option>
              </x-forms.select>
            </x-forms.field>
          @endif
          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Name</x-forms.label>
            <x-forms.input type="text" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="name" placeholder="Name" required></x-forms.input>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </x-forms.field>
          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Email</x-forms.label>
            <x-forms.input type="text" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="email" placeholder="Email" required></x-forms.input>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </x-forms.field>
          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Password</x-forms.label>
            <x-forms.input type="password" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="password" placeholder="Password" required></x-forms.input>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </x-forms.field>

          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Password Confirmation</x-forms.label>
            <x-forms.input type="password" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="password_confirmation" placeholder="Password Conformation" required></x-forms.input>
          </x-forms.field>

          <div class="w-full flex justify-between">
            <div class="flex">
              Sudah punya akun ? <a href="{!! route('login.index') !!}">Login</a>
            </div>
            <div>
              <x-button type="submit" buttonType="grey">{{Session::get('domain_name') ? 'Checkout' : 'Register'}}</x-button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    
  </script>
@endsection