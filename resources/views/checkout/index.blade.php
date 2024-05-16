@extends('template.template')
@section('content')
  <style>
    table, td, th {
      border: 1px solid;
      text-align: center
    }
    table {
      border-collapse: collapse;
    }
  </style>
  <div class="w-full grid grid-cols-1 gap-2 border border-white shadow-lg rounded-lg min-w-[60vw]">
    <div class="bg-[#ff7b23] text-white w-full flex p-2 rounded-lg">Checkout</div>
    <form action="{!! route('checkout.checkout') !!}" method="post">
      @csrf
    <div>
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
          <div class="w-full flex">
            Nama : {{Auth::user()->name}}
          </div>
          <div class="w-full flex">
            Email : {{Auth::user()->email}}
          </div>
  
          <div class="w-full flex justify-end">
            <div>
              <x-button type="submit" buttonType="grey">Checkout</x-button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection