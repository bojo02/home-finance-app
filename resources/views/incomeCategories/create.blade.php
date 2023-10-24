<x-layout>
    <div class="container mt-5">
        <h1>Добави нова категория за Приход</h1>
        <form action="{{route('income-category.store')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Име на категорията</label>
                <input name="category" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заплата, сайтове, допълнителни...">
                @error('category')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>
              <button class="btn btn-success" type="submit">Добави</button>
        </form>
    </div>
</x-layout>