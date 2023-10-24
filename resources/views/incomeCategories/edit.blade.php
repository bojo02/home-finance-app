<x-layout>
    <div class="container mt-5">
        <h1></h1>
        <div class="clear">
            <form  style="float:right;" action="{{route('income-category.delete', ['incomeCategory' => $category->id])}}" method="POST">
                @CSRF
                @method('delete')
                <button type="submit" class="btn btn-danger">Изтрий</button>
            </form>
            <h1 style="float:left;" >Редактиране на категория: {{$category->name}}</h1>
        </div>
        <form action="{{route('income-category.update', ['incomeCategory' => $category->id])}}" method="POST">
            @CSRF
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Име на категорията</label>
                <input value="{{old('category', $category->name)}}" name="category" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заплата, сайтове, допълнителни...">
                @error('category')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>
              <button class="btn btn-primary" type="submit">Обнови</button>
        </form>
    </div>
</x-layout>