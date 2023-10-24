<x-layout>
    <div class="container mt-5">
        <h1>Добави нов Разход</h1>
        <form action="{{route('cost.store')}}" method="POST">
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Сума на разхода</label>
                <input name="amount" value="0" type="number" class="form-control" id="exampleFormControlInput1">
                @error('amount')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Бележка към сумата</label>
                <input name="note" type="text" step=".01" class="form-control" placeholder="Тези пари са изхарчени за..." id="exampleFormControlInput1">
                @error('note')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
              </div>

              <label for="exampleFormControlInput1" class="form-label">Категория Разход</label>
              <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                @foreach($categories as $index => $category)
                @if($index == 0)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                
                @endforeach
                
               
              </select>
              
              <button class="btn btn-success" type="submit">Добави</button>
        </form>
    </div>
</x-layout>