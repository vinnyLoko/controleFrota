@extends('layouts.app')

@section('content')
   <div class="header py-7 py-lg-8">
       <div class="container">
           <div class="header-body text-center mb-7">
               <div class="row justify-content-center">
                   <div class="container-fluid">
                          <div class="card">

                            <div class="card-header">
                                <div class="header-body text-center mb-7">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-5 col-md-6">
                                            <h1 class="text-white">{{ __('Manutenções') }}</h1>
                                            <p class="category">Preencha as informações Dos Veículos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>

                                @endforeach
                            </ul>

                            @endif


              {!! Form::open(['route'=>'veiculoManutencao.store']) !!}

                               <!--inicio do card-->
                               <div class="card-body">
                                     @csrf
                                     @method('post')

                                     @include('alerts.success')



                                 <div class="row">

                                  <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('veiculo') ? ' has-danger' : '' }}">


                                    <h1> Veiculo: {{ str_replace('"','',str_replace('[','',str_replace(']','',$modelo)))}}</h1>
                                      {{--!! Form::label('veiculo', "$modelo") !!}
                                      {!! Form::label('modelo',\App\Veiculo::where('id','=',$veiculo_id)->pluck('modelo')) !!}


                                      {!! Form::select('veiculo_id',\App\Veiculo::orderby('id')->pluck('modelo','id')->toArray(),$veiculo_id,
                                      ['class'=>'btn btn-default btn-md text-light col-md row-sm','title'=>'Selecione o Veiculo'])!!--}}                                     @include('alerts.feedback', ['field' => 'veiculo'])

                                     </div>


                                    <div class="form-group{{ $errors->has('manutencao') ? ' has-danger' : '' }}">

                                      {!! Form::label('manutencao', 'Manutenção') !!}
                                      {!! Form::select('manutencao_id',\App\Manutencao::orderby('id')->pluck('descricao','id')->toArray(),null,
                                      ['class'=>'btn btn-default btn-md text-light col-md row-sm','title'=>'Tipo de Manutencao','data-toggle'=>'dropdown'])!!}
                                     @include('alerts.feedback', ['field' => 'manutencao'])

                                     </div>

                                   </div>

                                   <div class="col-md-4">

                                    <div class="form-group{{ $errors->has('km_inicioManutencao') ? ' has-danger' : '' }}">
                                     {!! Form::label('kmInicioManutencao', 'KM Inicial Manutencao') !!}
                                       {!! Form::number('kmInicioManutencao', null, ['class'=>'form-control', 'placeholder'=>'km saida para manutenção']) !!}
                                        @include('alerts.feedback', ['field' => 'km_inicioManutencao'])
                                    </div>

                                  </div>

                                  <!-- {{--<div class="col-sm-">
                                     <div class="form-group{{ $errors->has('km_retorno') ? ' has-danger' : '' }}">
                                      {!! Form::label('kmRetornoManutencao', 'KM Retrono Manutenção') !!}
                                      {!! Form::number('kmRetornoManutencao', null, ['class'=>'form-control', 'placeholder'=>'km ao retornar']) !!}
                                         @include('alerts.feedback', ['field' => 'km_retorno'])
                                     </div>
                                   </div> --}}-->

                                   <div class="col-md-4">

                                      <div class="form-group{{ $errors->has('dataInicioManutencao') ? ' has-danger' : '' }}">
                                        {!! Form::label('dataInicioManutencao', 'Data saida para manutencao')!!}
                                          {!! Form::Date('dataInicioManutencao', null, ['class'=>'form-control', 'placeholder'=>'Date de hoje']) !!}
                                          @include('alerts.feedback', ['field' => 'dataInicioManutencao'])
                                      </div>
                                  </div>

                                  <!-- {{--<div class="col-md-4" id='dataRetorno' >
                                      <div class="form-group{{ $errors->has('dataRetornoManutencao') ? ' has-danger' : '' }}">
                                        {!! Form::label('dataRetornoManutencao', 'Data de Retrono') !!}
                                          {!! Form::Date('dataRetronoManutencao', null, ['class'=>'form-control', 'placeholder'=>'Data de Retrono da manuytencão', 'id'=>'dataRetorno']) !!}
                                          @include('alerts.feedback', ['field' => 'dataRetornoManutencao'])
                                      </div> --}}-->





                                    <div class="col-md-8">
                                      <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                        {!! Form::label('descricao', 'Descricao do que sera feito no veiculo') !!}
                                          {!! Form::textarea('descricao', null, ['class'=>'form-control', 'placeholder'=>'Descreca o que sera feito no veiculo', 'rows'=>'10']) !!}
                                          @include('alerts.feedback', ['field' => 'descricao'])
                                       </div>


                                 <!--div class="col-md-4">




                                    <div class="col-sm">

                                      <div class="form-group{{ $errors->has('veiculo') ? ' has-danger' : '' }}">

                                        {{--!! Form::label('status', 'Status') !!}



                                        {!! Form::select('status',array ('M'=>'Em manutenção','P'=>'Disponivel'),null,
                                      ['class'=>'btn btn-default btn-md text-light col-md row-sm','title'=>'Tipo de Manutencao','data-toggle'=>'dropdown'])!!--}}
                                        {!! Form::text('status', 'M', ['class'=>'form-control', 'hidden']) !!}

                                       @include('alerts.feedback', ['field' => 'status'])

                                       </div>



                                  </div>
                                 </div-->
                                    </div>
                                </div>

                                    <div class="row">
                                    <div class="text-center">
                                      {!! Form::submit('Salvar', ['type'=>'submit', 'class'=>'btn btn-info btn-fill float-center']) !!}
                                      <!--<base-button round type="submit" class="btn btn-info btn-fill float-center" @click.prevent="updateProfile">
                                        Salvar
                                      </base-button>-->
                                      <a href="{{ route('veiculoManutencao.index') }}">
                                        <i class="btn btn-danger btn-fill float-center "><p >{{ __('Cancelar') }}</p></i>

                                     </a>

                                      <!--<button type="danger" class="btn btn-fill btn-danger float-center" @click.prevent="updateProfile">
                                        Cancelar
                                      </button>-->
                                    </div>
                               </div>
                               <div class="clearfix"></div>
                              </div>
                             {!! Form::close() !!}

                          <!--select id= 'teste'>
                            <option id = 'option1'>option1</option>
                            <option id = 'option2'>option2 </option>
                          </select >

                     --> </div><!--fim do card-->
                  </div>
              </div>

   </div>
  </div>
@endsection

<script>



 /* $("#status").click(function(){
	alert("Estou habilitado!");
});

/*$(document).ready(function(){
    $('#status').change(function() {
      //$status =

        if ($('#status').select(getSelection) == 'P') {
              $('dataRetorno').show();
        }else if($('#status').select(getSelection) == 'M'){
              $('dataRetorno').hide();
          }
      });
});
console.log(getSelection);
*/
//var select = document.getElementById('teste');
	//var value = select.options[select.selectedIndex].value;
  $('#modelo').replace(/['"]+/g,''); // pt

	console.log(this.val); // pt



</script>
