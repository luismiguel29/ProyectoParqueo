@extends('welcome')
@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/Cliente/form.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>TIS</title>
</head>
<body>
  
  <div class="container-fluid py-3">
    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="container pb-3">
                <i class="fa-solid fa-envelope fa-2xl"; style="color: 222222;
                margin-right: 10px;"></i>
                <span class="h3 ">Registrar Mensaje</span>
            </div>
            <div class="card card-outline  border-top-pk   shadow" >
                <div class="card-header">
                    <h5>Formulario</h5>
                </div>
                <form method="POST" action="{{isset($sms)? route( 'Mensaje.editardato', ['id'=>$sms->id]) : route('MensajesGlobales.registrarMen')}}" style="padding: 50px 55px" >
                  @csrf
                  @if(isset($sms))
                  @method('put')
                  @endif
                    <div class="row mb-3">
                      <label for="inputNombre3" class="col-sm-4 col-form-label text-end">Asunto</label>
                      <div class="col-sm-7">
                        <input name="asunto" class="form-control {{$errors->has('asunto')?'is-invalid':''}}" id="inputNombre3" value="{{isset($sms)? $sms->asunto: old('asunto') }}">
                            @error('asunto')
                                  <div class="invalid-feedback">
                                         {{ $message }}
                                  </div>
                            @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputApellidos3" class="col-sm-4 col-form-label text-end" >Descripcion</label>
                        <div class="col-sm-7">
                          <textarea name="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" id="inputApellidos3">{{isset($sms)? $sms->descripcion: old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <div class="row row-gap-3 pt-4 ">
                        <div class="col-md-6">
                            <button type="submit" href="" class="btn btn-primary-pk btn-block w-100" >Registrar</button>
                        </div>
                        <div class="col-md-6">
                            <a type="reset" class="btn btn-danger-dg btn-block w-100"   href="{{route('Mensaje.listamensaje')}}">Cancelar</a>
                        </div>
                      </div>
                  </form>
                       
            </div>
        </div>
    </div>
  </div>
</body>
</html>
@endsection

