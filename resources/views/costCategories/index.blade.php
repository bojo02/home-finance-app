<x-layout>
    <div class="container mt-5">
        <div class="clear">
            <a style="float:right;" href="{{route('cost-category.create')}}" class="btn btn-success">Добави Категория</a>
            <h1 style="float:left;" >Категории Разходи</h1>
        </div>
        <hr>
        @foreach ($categories as $category)
        <a style="text-decoration:none;" href="{{route('cost-category.edit', ['costCategory' => $category])}}">
            <div class="card mt-3">
                <div class="card-body">
                  {{$category->name}}
                </div>
            </div>
        </a>
        @endforeach
        @if(count($categories) == 0)
            Все още няма категории за разходи...
        @else
        {{$categories->links()}}
        @endif
    </div>
</x-layout>