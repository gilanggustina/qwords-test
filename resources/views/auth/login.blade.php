@extends('template.template')
@section('content')

  <div class="w-full grid grid-cols-1 gap-2 border border-white shadow-lg rounded-lg min-w-[60vw]">
    <div class="bg-[#ff7b23] text-white w-full flex p-2 rounded-lg">Login</div>
    <div>
      <form id="form-login" method="post" action="{!! route('login.authenticate') !!}">
        @csrf
        <div class="w-full grid grid-cols-1 gap-2 p-2 relative bg-[#fff8f3]">
          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Email</x-forms.label>
            <x-forms.input type="text" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="email" placeholder="Masukan Email" required></x-forms.input>
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

          <div class="w-full flex justify-between">
            <div class="flex">
              Tidak punya akun ? <a href="{!!route('register.index')!!}">Register</a>
            </div>
            <div>
              <x-button type="submit" buttonType="grey">Login</x-button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    
  </script>
@endsection