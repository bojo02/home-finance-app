<x-layout>
    <div class="container mt-5">
        <h1>Вход</h1>
        <form action="{{route('login.make')}}" method="POST">
          @CSRF
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Имейл</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Парола</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              @error('password')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
          </form>
    </div>
</x-layout>