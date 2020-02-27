@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-status.actions.find'))

@section('body')


    <div class="container-xl">
        <div class="card">
{{-- {{$data}} --}}
@if(Session::has('flash_message'))
{{Session::get('flash_message')}}
@endif
<div class="card-body">
<div class="card-header">
    Seguimiento de Expedientes
</div>
        <form action="" method="get" onsubmit="return showLoad()">

            <div class="panel-body">
                <div class="col col-lg-7 col-xl-5 form-group">
                
                    
                    <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Buscar por CI" required="required">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-success">buscar</button>
                    </span>
                </div>
                </div>
            </div>
        

        </form>
    </div>
</div>

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

 
@if (!empty($data))
    
                @foreach ($data as $item)
    

                
                <table class="table table-hover table-success" style="width: 50%" >
                
                  <tr>
                    <th>Nombre:</th>
                    <td>{{$item->names}}</td>
                  </tr>
                  <tr>
                    <th>Apellido:</th>
                    <td>{{$item->last_names}}</td>
                  </tr>
                  <tr>
                    <th>Departamento:</th>
                    <td>{{$item->states}}</td>
                  </tr>
                  <tr>
                    <th>Ciudad:</th>
                    <td>{{$item->city}}</td>
                  </tr>
                  <tr>
                    <th>Documento de Identidad:</th>
                    <td>{{$item->government_id}}</td>
                  </tr>
                  <tr>
                    <th>Entidad Financiador:</th>
                    <td>{{$item->financial_entity_id}}</td>
                  </tr>
                  <tr>
                    <th>Estado:</th>
                    <td>
                      @if ($item->status=='PENDIENTE')
                      <span style="color:red;font-weight: bold">{{$item->status}}</span>
                        @else
                        <span style="color:green;font-weight: bold">{{$item->status}}</span>
                    @endif
                  </td>
                  </tr>
                </table>
                
              

                @endforeach
                   
  
        @else 

 

        @endif
    </div>
     

    
@endsection