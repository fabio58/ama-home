@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.detailsmembers'))

@section('body')
<pre>
@php
    
    // print_r($applicants);
    // print_r($details);
@endphp
</pre>
{{-- {{$questions->extended_value}} --}}
    <div class="container-xl">
        <div class="card">
        
                    <div class="box-header">
                        <h3 class="box-title"> <i class="fa fa-archive"></i> Detalle de Postulantes</h3>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Postulantes</h3>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                      <th>Nombre</th>
                                    <td>{{$applicants[0]['names']}}</td>
                                    </tr>
                                    <tr>
                                      <th>Apellidos</th>
                                      <td>{{$applicants[0]['last_names']}}</td>
                              
                                    </tr>
                                    <tr>
                                      <th>Departamento</th>
                                      <td>{{$applicants[0]['state']['name']}}</td>
                                    </tr>
                                    <tr>
                                      <th>Ingreso</th>
                                      <td>{{ number_format($applicants[0]['monthly_income'], 0, '.', '.' ) }}</td> 
                                    </tr>
                                </tbody>
                            </table>
                                      @php
                                          $subTotal=$applicants[0]['monthly_income'];
                                          $total=$subTotal;
                                      @endphp
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                            <h3>Miembros</h3>
                            <table class="table">
                                <thead class="thead-light">
                                  <tr>
                       
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Relacion</th>
                                    <th scope="col">Ingreso</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($details as $item)
                                <tr>
                          
                                <td>{{$item['names']}}</td>
                                <td>{{$item['last_names']}}</td>
                                <td>{{$item['applicant_relationship']['name']}}</td>
                                <td>{{ number_format($item['monthly_income'], 0, '.', '.' ) }}</td>
                                    
                                </tr>
                                @php
                                    if ($item['applicant_relationship']['co-debtor']==1){
                                        $total=$subTotal+$item['monthly_income'];

                                    }else {
                                        $total=$subTotal;
                                    }
                                    
                                @endphp
                                
                                @endforeach
                                </tbody>
                              </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                             <h3>Ingreso Total: {{ number_format($total, 0, '.', '.' ) }} </h3>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>





@endsection
