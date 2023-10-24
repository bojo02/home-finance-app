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
              <tr>
                <th scope="row">Кола</th>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
                <td>100лв</td>
              </tr>
              <tr>
                <th scope="row">Спестени</th>
                <td >200лв</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    
          <div class="alert alert-success" role="alert">
            Общо заделени: 200лв
          </div>
          <div class="alert alert-danger" role="alert">
            Общо изхарчени: 400лв
          </div>
          {{date("M, Y", strtotime("+1 month"))}}
          

          <script>
          $(function() {
                $( "#datepicker" ).datepicker({dateFormat: 'yy'});
            });​

          </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </div>
</x-layout>