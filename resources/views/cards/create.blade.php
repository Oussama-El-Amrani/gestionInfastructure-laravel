<x-app-layout >
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-10 mx-auto">
        <div class="card shadow">
          <div class="card-header">
              <h4>Ajouter une carte</h4>
          </div>
          <div class="card-body p-4">
            <form action="{{route('cards.store')}}" method="POST">
              @csrf
              <div id="show-item">
                <div class="row">
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="pin" id="pin" class="form-control  @error('pin') is-invalid @enderror" placeholder="Pin" value="{{old('pin')}}" required >
                      <label for="pin">Pin</label>
                      <div class="invalid-feedback">
                        @error('pin')
                            <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="date" name="certificate_expiration_date" id="certificate_expiration_date" class="form-control  @error('certificate_expiration_date') is-invalid @enderror" placeholder="Expiration du certificat" value="{{ old('certificate_expiration_date') }}" required >
                      <label for="certificate_expiration_date">Expiration Certificat</label>
                      <div class="invalid-feedback">
                        @error('certificate_expiration_date')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="machine_name" id="machine_name" class="form-control  @error('machine_name') is-invalid @enderror" placeholder="Nom du machine" value="{{ old('machine_name')}}" required >
                      <label for="machine_name">Nom  du Machine</label>
                      <div class="invalid-feedback">
                        @error('machine_name')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Mot de passe" value="{{ old('password') }}" required >
                      <label for="password">Mot de passe</label>
                      <div class="invalid-feedback">
                        @error('password')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                    <div class="mb-3 form-floating">
                      <input type="date" name="update_date" id="update_date" class="form-control  @error('update_date') is-invalid @enderror" placeholder="Date de MAJ" value="{{ old('update_date') }}" required >
                      <label for="update_date">Date de MAJ</label>
                      <div class="invalid-feedback">
                         @error('update_date')
                          <p class="bg-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3">
                      <div class="mb-3 form-floating">
                          <input type="date" name="last_access_date" id="last_access_date" class="form-control  @error('last_access_date') is-invalid @enderror" placeholder=" date dernier accès" value="{{ old('last_access_date') }}" required >
                          <label for="last_access_date">date dernier accès</label>
                          <div class="invalid-feedback">
                             @error('last_access_date')
                              <p class="bg-danger">{{ $message }}</p>
                            @enderror
                          </div>
                      </div>
                  </div> 
                  <div class="col-md-6 col-lg-3 mb-3">
                      <div class="mb-3 form-floating">
                          <label for=""></label>
                          <select name="user_id" class="form-select">
                              <option>Affecter à</option>
                                @foreach($users as $user)
                                  <option value="{{ $user->id }}">
                                      {{ $user->name }} | {{ $user->state ? 'interne': 'Stagiaire' }}
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
                </div>
              </div>
              <div class="col-md-3 mb-3 d-grid">
                <button class="btn btn-white bg-info text-white" type="submit">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>