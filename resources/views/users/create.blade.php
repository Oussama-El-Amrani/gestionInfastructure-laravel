<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer un utilisateur
        </h2>
    </x-slot>

    <div class="container">
    <div class="row my-5">
      <div class="col-lg-10 mx-auto">
        <div class="card shadow">
          <div class="card-header">
              <h4>Créer un utilisateur</h4>
          </div>
          <div class="card-body p-4">
            <form method="post" action="{{ route('users.store') }}">
              @csrf
              <div id="show-item">
                <div class="row">

                  <div class="mb-3">
                    <div class="mb-3 form-floating">
                      <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Nom & Prénom" value="{{ old('name') }}" required >
                      <label for="Nom & Prénom">Nom & Prénom</label>
                      <div class="invalid-feedback">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="mb-3">
                    <div class="mb-3 form-floating">
                      <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required >
                      <label for="email">Email</label>
                      <div class="invalid-feedback">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="mb-3 form-floating">
                      <input type="password" name="password" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Mot de passe" required >
                      <label for="password">Mot de passe</label>
                      <div class="invalid-feedback">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                      <div class="mb-3 form-floating">
                          <select name="roles[]" id="roles" class="form-select">
                            @foreach($roles as $id => $role)
                                <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }} >
                                    {{ $role }}
                                </option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            @error('roles')
                                <p>{{ $message }}</p>
                            @enderror
                          </div>
                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="mb-3 form-floating">
                          <select name="state" id="state" class="form-select">
                                <option value="0">
                                    Front
                                </option>
                                <option value="1">
                                    Back
                                </option>
                          </select>
                          <div class="invalid-feedback">
                            @error('state')
                                <p>{{ $message }}</p>
                            @enderror
                          </div>
                      </div>
                  </div>

                </div>
              </div>
              <div class="mb-3 d-grid">
                <button class="btn btn-white bg-info text-white" type="submit">Créer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>