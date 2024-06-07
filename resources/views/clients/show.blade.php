<x-master>
  <x-slot name="title">
      @lang('client : '.$Client->name)
  </x-slot>
<style>
  input {
      border: 2px solid #e1e9ef;
      border-radius: 5px;
      padding: 10px;
      font-size: 16px;
      transition: border-color 0.3s ease;
  }

  input:focus {
      border-color: #0e507b;
      outline: none;
  }
</style>
<section class="w-100 px-4 py-5">
  <div class="row d-flex justify-content-center">
    <div class="col col-md-9 ">
      <div class="card" style="border-radius: 15px; width: 100%;">
        <div class="card-body p-4">
                <p class="text-secondary"> Client</p>
                  <!-- Client Information -->
                  <div id="ClientInfo">
                      <div class="d-flex">
                          <div class="flex-shrink-0">
                              {{-- <img src="https://static.vecteezy.com/system/resources/previews/020/377/086/original/Client-engineer-worker-color-icon-illustration-vector.jpg"
                                   alt="Client image" class="img-fluid" style="width: 180px; border-radius: 10px;"> --}}
                                   <img src="https://cdn-icons-png.flaticon.com/512/2818/2818766.png"
                                   alt="Client image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                            </div>
                          <div class="flex-grow-1 ms-3">
                              <h5 class="mb-3">{{ $Client->name }} </h5>
                              <p class="mb-3 pb-2">{{ $Client->bio }}</p>
                              <div class="d-flex justify-content-start rounded-3 p-3 mb-3 bg-body-tertiary">
                                  <div class="me-3">
                                      <p class="small text-muted mb-1">@lang('email')</p>
                                      <p class="mb-0">{{ $Client->email }}</p>
                                  </div>
                                  <div class="me-3">
                                      <p class="small text-muted mb-1">@lang('phone')</p>
                                      <p class="mb-0">{{ $Client->phone }}</p>
                                  </div>
                              </div>
                              <div class="me-3">
                                  <p class="small text-muted mb-1">@lang('adress')</p>
                                  <p class="mb-0">{{ $Client->adress }}</p>
                              </div>
                              <div class="d-flex pt-1">
                                  <button type="button" class="btn btn-outline-primary me-1 flex-grow-1" onclick="toggleEdit(true)">@lang('edit')</button>
                                  <form action="{{ route('clients.destroy', $Client->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">@lang('delete')</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Edit Form -->
                  <div id="editForm" style="display: none;">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form action="{{ route('clients.update', $Client->id) }}" method="POST" id="ClientForm">
                          @csrf
                          @method('PUT')
                          <div class="d-flex">
                              <div class="flex-shrink-0">
                                
                                <img src="https://static.vecteezy.com/system/resources/previews/020/377/086/original/Client-engineer-worker-color-icon-illustration-vector.jpg"
                                       alt="Client image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                              </div>
                              <div class="flex-grow-1 ms-3">
                                  <input type="text" name="name" value="{{ $Client->name }}" id="name">
                                  <div class="d-flex justify-content-start rounded-3 p-3 mb-3 bg-body-tertiary">
                                      <div class="me-3">
                                          <p class="small text-muted mb-1">@lang('email')</p>
                                          <input type="text" name="email" id="email" value="{{ $Client->email }}">
                                      </div>
                                      <div class="me-3">
                                          <p class="small text-muted mb-1">@lang('phone')</p>
                                          <input type="text" name="phone" id="phone" value="{{ $Client->phone }}">
                                      </div>
                                  </div>
                                  <div class="me-3">
                                      <p class="small text-muted mb-1">@lang('adress')</p>
                                      <input type="text" name="adress" id="adress" value="{{ old('adress') ?? $Client->adress }}">

                                      <div id="passwordFields">
                                          <div class="me-3 mt-3">
                                              <p class="small text-muted mb-1">@lang('password')</p>
                                              <input type="password" name="password" id="password">
                                          </div>
                                          <div class="me-3">
                                              <p class="small text-muted mb-1">@lang('confirm_password')</p>
                                              <input type="password" name="password_confirmation" id="password_confirmation">
                                          </div>
                                      </div>
                                      <div class="d-flex pt-1">
                                          <button type="submit" class="btn btn-outline-primary me-1 flex-grow-1">@lang('update')</button>
                                          <button type="button" class="btn btn-outline-secondary me-1 flex-grow-1" onclick="toggleEdit(false)">@lang('cancel')</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<script>
  function toggleEdit(showEdit) {
      document.getElementById('ClientInfo').style.display = showEdit ? 'none' : 'block';
      document.getElementById('editForm').style.display = showEdit ? 'block' : 'none';
      document.getElementById('name').focus();
  }

</script>

</x-master>
