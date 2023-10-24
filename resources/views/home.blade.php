<x-layout>

    <style>
        .ui-datepicker-calendar {
        display: none;
    }
    </style>
    <div class="container mt-5">
        
        <div class="mb-3 mt-3">
            <input type="number" min="2015" max="2099" step="1" value="{{date("Y")}}" />
        </div>

        <table class="table">
            <thead>
              <tr>
                <th class="table-dark" scope="col">{{date("Y")}}</th>
                <th class="table-dark" scope="col">Януари</th>
                <th class="table-dark" scope="col">Февруари</th>
                <th class="table-dark" scope="col">Март</th>
                <th class="table-dark" scope="col">Април</th>
                <th class="table-dark" scope="col">Май</th>
                <th class="table-dark" scope="col">Юни</th>
                <th class="table-dark" scope="col">Юли</th>
                <th class="table-dark" scope="col">Август</th>
                <th class="table-dark" scope="col">Септември</th>
                <th class="table-dark" scope="col">Октомври</th>
                <th class="table-dark" scope="col">Ноември</th>
                <th class="table-dark" scope="col">Декември</th>
              </tr>
            </thead>
            <tbody>

              @foreach($costCategories as $category)
              <tr class="table-danger">
                <th scope="row">{{$category->name}}</th>
                  @foreach ($months as $month)
                    @php 
                    $tempValue = 0;
                    @endphp
                   @foreach($category->costs(date($month), $year) as $income)
                      @php $tempValue = $tempValue + $income->amount; @endphp
                    @endforeach
                    <td>{{$tempValue}}</td>
                  @endforeach
              </tr>
            @endforeach

              @foreach($incomeCategories as $category)
                <tr class="table-success">
                  <th scope="row">{{$category->name}}</th>
                    @foreach ($months as $month)
                      @php 
                      $tempValue = 0;
                      @endphp
                     @foreach($category->incomes(date($month), $year) as $income)
                        @php $tempValue = $tempValue + $income->amount; @endphp
                      @endforeach
                      <td>{{$tempValue}}</td>
                    @endforeach
                </tr>
            @endforeach
              
            </tbody>
          </table>
    
         
          {{date("M, Y", strtotime("+1 month"))}}

          <script>
          $(function() {
                $( "#datepicker" ).datepicker({dateFormat: 'yy'});
            });​

          </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </div>
</x-layout>