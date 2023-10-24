<x-layout>
    <div class="container mt-5">
        <form  style="float:right;" action="{{route('income.delete', ['income' => $income->id])}}" method="POST">
            @CSRF
            @method('delete')
            <button type="submit" class="btn btn-danger">Изтрий</button>
        </form>
        <h1>Редактирай Приход</h1>
        <form action="{{route('income.update', ['income' => $income->id])}}" method="POST">
            @CSRF
            @method("PUT")
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Сума на прихода</label>
                <input name="amount" value="{{$income->amount}}" type="number" class="form-control" id="exampleFormControlInput1">
                @error('amount')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Бележка към сумата</label>
                <input name="note" type="text" value="{{$income->note}}" step=".01" class="form-control" placeholder="Тези пари са получени от..." id="exampleFormControlInput1">
                @error('note')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>

              <label for="exampleFormControlInput1" class="form-label">Категория Приход</label>
              <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                @foreach($categories as $category)
                @if($category->id == $income->category->id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                
                @endforeach
                
               
              </select>
              
              <button class="btn btn-primary" type="submit">Редактирай</button>
        </form>
    </div>
</x-layout>