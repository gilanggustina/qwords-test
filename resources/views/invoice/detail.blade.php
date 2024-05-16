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
    <div class="bg-[#ff7b23] text-white w-full flex p-2 rounded-lg">Invoice</div>
    <div>
      @if ($invoice)
        <div class="w-full grid grid-cols-1 gap-2 p-2 relative bg-[#fff8f3]">
          <div class="w-full flex justify-between">
            <span>
              No.invoice #{{str_pad($invoice->id, 7, '0', STR_PAD_LEFT)}}
            </span>
            <span class="text-xl font-bold">
              UNPAID
            </span>
          </div>
          <div class="w-full flex">
            {{Auth::user()->name}}
          </div>
          <div class="w-full flex">
            {{Auth::user()->email}}
          </div>
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Deskripsi</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Pembelian Domain {{$invoice->domain_name}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                  Rp. {{number_format($invoice->total,2,",",".")}}
                </td>
              </tr>
            </tbody>
          </table>

          <div class="w-full justify-center">
            <div class="flex justify-center">
              <div class="justify-center">
                <x-forms.anchor likeButton="primary" href="{{route('invoice.export',['invoiceId'=>$invoice->id])}}">
                  Download
                </x-forms.anchor>
              </div>
            </div>
            <div class="grid justify-center text-center">
              <span id="status">Silakan bayar di no rekening berikut ini :</span>
              <span>273498273497</span>
            </div>
          </div>
        </div>
      @else
        <div class="flex justify-center">
            <span>Invoice Not Found</span>
        </div>
      @endif
    </div>
  </div>
@endsection