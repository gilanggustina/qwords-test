@extends('template.template')
@section('content')
<script setup>
  import { useForm } from 'laravel-precognition-vue';
  
  const form = useForm('post', '/users', {
      name: '',
      email: '',
  });
  
  const submit = () => form.submit();
</script>

  <div class="w-full grid grid-cols-1 gap-2 border border-white shadow-lg rounded-lg min-w-[60vw]">
    <div class="bg-[#ff7b23] text-white w-full flex p-2 rounded-lg">Cari Domain</div>
    <div>
      <form id="form-seacrh" method="post">
        <div class="w-full grid grid-cols-1 gap-2 p-2 relative bg-[#fff8f3]">
          <x-forms.field class="p-0 m-0 rounded-none" class-field-container="m-auto">
            <x-forms.label for="" :required="true">Masukan Nama Domain</x-forms.label>
            <x-forms.input type="text" class="w-full p-4 border-none shadow-lg rounded-2xl text-md h-[50px]" name="in_name_domain" placeholder="example.com" required></x-forms.input>
          </x-forms.field>
          <div class="w-full flex justify-end">
              <x-button type="submit" buttonType="grey">Cari Domain</x-button>
          </div>

          <div class="w-full justify-center" style="display: none" id="element-success">
            <div class="grid justify-center">
              <span id="status_check_domain">Selamat Domain Anda Tersedia</span>
              <div class="flex justify-center">
                <div class="flex" style="display: none" id="element-button">
                  <x-forms.anchor likeButton="primary" href="{{route('checkout-form')}}">
                    Pesan
                  </x-forms.anchor>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    document.getElementById('form-seacrh').addEventListener('submit', function(event) {
      event.preventDefault();
      var data = new FormData(this);
      const domainRegex = /^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/
      alert(domainRegex.test(data.get('in_name_domain')))
      if(domainRegex.test(data.get('in_name_domain'))){
        axios.post(`{!! route('search-domain') !!}`,data)
        .then(function(response){
          document.getElementById('element-success').style.display = 'block';
          let status = document.getElementById('status_check_domain');
          showButton = false
          if(response.data.status == 'available'){
            status.innerHTML = 'Selamat Domain Anda Tersedia';
            showButton = true
          }else if(response.data.status == 'unavailable'){
            status.innerHTML = 'Maaf Domain Anda Tidak Tersedia';
          }else{
            status.innerHTML = 'Masukan Domain Dengan Benar';
          }
          document.getElementById('element-button').style.display = (showButton ? 'block' : 'none');
        })
        .catch(function(error){
          console.log(error);
        })
      }else{
        showButton = false;
        document.getElementById('element-success').style.display = 'block';
        document.getElementById('element-button').style.display = 'none';
        document.getElementById('status_check_domain').innerHTML = 'Masukan Domain Dengan Benar';
        return false;
      }
    });
  </script>
@endsection