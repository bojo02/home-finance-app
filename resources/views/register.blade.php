<x-layout>
    <div class="container mt-5">
        <h1>Регистрация</h1>
        <form action="{{route('register.store')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Име</label>
                <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputName">
                @error('name')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Имейл</label>
              <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail1">
              @error('email')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword" class="form-label">Парола</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword">
              @error('password')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Потвърди Парола</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
              </div>
            <button type="submit" class="btn btn-success">Регистрация</button>
          </form>
    </div>
</x-layout>