<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Modification d'un appareil
    </h2>
  </x-slot>

  <div class="container">
    <div class="row my-5">
      <div class="col-lg-10 mx-auto">
        <div class="card shadow">
          <div class="card-header">
              <h4>Ajouter un Appareil</h4>
          </div>
          <div class="card-body p-4">
            <form action="{{route('devices.update',$device->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div id="show-item">
                <div class="row">
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="name" id="name" class="form-control  @error('title') is-invalid @enderror" placeholder="Réf.Appareil" value="{{ old('name', $device->name) }}" required >
                      <label for="name">Réf.Appareil</label>
                      <div class="invalid-feedback">
                         @error('title')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="location" id="location" class="form-control  @error('location') is-invalid @enderror" placeholder="localisation" value="{{ old('location', $device->location) }}" required >
                      <label for="location">localisation</label>
                      <div class="invalid-feedback">
                          @error('location')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="date" name="date_taken" id="date_taken" class="form-control  @error('date_taken') is-invalid @enderror" placeholder="Date de prise" value="{{ old('date_taken', $device->date_taken) }}" required >
                      <label for="name">Date de prise</label>
                      <div class="invalid-feedback">
                         @error('date_taken')
                            <p class="bg-danger">{{ $message }}</p>
                        @enderror 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="date" name="date_delivery" id="date_delivery" class="form-control  @error('date_delivery') is-invalid @enderror" placeholder="Date de remise" value="{{old('date_delivery', $device->date_delivery)}}" required >
                      <label for="name">Date de remise</label>
                      <div class="invalid-feedback">
                        @error('date_taken')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <textarea name="comment" id="comment" class="form-control  @error('comment') is-invalid @enderror" placeholder="@lang('Comment')" cols="30">{{old('comment', $device->comment)}}</textarea>
                      <label for="comment">commentaire</label>
                      <div class="invalid-feedback">
                        @error('comment')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                      <div class="mb-3 form-floating">
                          <select name="user_id" class="form-control">
                              <option>Affecter à</option>
                              @foreach($users as $user)
                                <option value="{{ $user->id }}" {{$user->id == $device->user_id ? 'selected' : ''}} >
                                    {{ $user->name }}
                                </option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            @error('user_id')
                              <p class="bg-danger">{{ $message }}</p>
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <label >State</label>
                        <div class="form-check">
                            <input type="radio" id="ok" name="state" value="1" class="form-check-input @error('state') is-invalid @enderror" {{$device->state ? 'checked' : ''}} >
                            <label for="ok" class="form-check-label">Ok</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="not_ok" name="state" value="0" class="form-check-input @error('state') is-invalid @enderror" {{$device->state ? '' : 'checked'}}>
                            <label for="not_ok" class="form-check-label">Not ok</label>
                        </div>
                        <div class="invalid-feedback">
                           @error('state')
                            <p class="bg-danger">{{ $message }}</p>
                          @enderror
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-3 mb-3 d-grid">
                <button class="btn btn-white bg-info text-white" type="submit">Mettre à jour</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>