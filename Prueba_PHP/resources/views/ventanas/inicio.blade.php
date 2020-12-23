@extends('layouts.plantilla')

@section('cuerpo')
{{-- <div class="container">
  <div class="row">
    <div class="col-sm-4">

      <h1>Ingreso de usuario</h1>
        <img src="{{ asset('usuario.png') }}" class="rounded" alt="Imagen usuario"/>

        <div>
        <form action="/ventanas" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="user" placeholder="Ingrese su usuario" name="usuario" pattern="[A-Za-z]{1,}" required="required"/>
            </div>
            {{ csrf_field() }}
            <div>
                {{-- <button type="submit" name="b1" class="btn btn-primary">Ingresar</button> --}}
                {{-- <button type="submit" name="login" class="btn btn-primary">Iniciar Sesion</button>
                <button type="submit" name="register" class="btn btn-primary">Registrar</button>
                
            </div>
        </form>
        </div>
    </div>
  </div>
</div> --}} 
<style>
  @import "compass/css3";
  @import url(https://fonts.googleapis.com/css?family=Vibur);
*{
  box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-box-sizing:border-box;
  font-family:arial;
}
body{background:#fffefd;}
h1{
  color:#ccc;
  text-align:center;
  font-family: 'Vibur', cursive;
  font-size: 50px;
}

.login-form{
  width:350px;
  padding:40px 30px;
  background:#eee;

  margin:auto;
  position: absolute;
  left: 0;
  right: 0;
  top:50%;
}
.form-group{
  position: relative;
  margin-bottom:15px;
}
.form-control{
  width:100%;
  height:50px;
  border:none;
  padding:5px 7px 5px 15px;
  background:#fff;
  color:#666;
  border:2px solid #ddd;

    &:focus, &:focus + .fa{
      border-color:#10CE88;
      color:#10CE88;
    }
}
.form-group .fa{
  position: absolute;
  right:15px;
  top:17px;
  color:#999;
}

.log-status.wrong-entry .form-control, .wrong-entry .form-control + .fa {
  border-color: #ed1c24;
  color: #ed1c24;
}
.log-btn{
  background:#0AC986;
  dispaly:inline-block;
  width:100%;
  font-size:16px;
  height:50px;
  color:#fff;
  text-decoration:none;
  border:none;

}

.link{
  text-decoration:none;
  color:#C6C6C6;
  float:right;
  font-size:12px;
  margin-bottom:15px;
  &:hover{
    text-decoration: underline;
    color:#8C918F;
  }
}
.alert{
  display:none;
  font-size:12px;
  color:#f00;
  float:left;
}



</style>
<div class="container">
  <div class="row">
          <div class="login-form">
        <h1>Ingrese su usuario</h1>
        <form action="/ventanas" method="POST">
          {{ csrf_field() }}
        <div class="form-group ">
          <input type="text" class="form-control" id="user" placeholder="Ingrese su usuario" name="usuario" pattern="[A-Za-z]{1,}" required="required"">
          <i class="fa fa-user"></i>
        </div>
          <div>
          <button type="submit" name="login" class="btn btn-primary log-btn">Iniciar sesión</button>
          <button type="submit" name="register" class="btn btn-secundary log-btn">Registrar</button>
          </div>
        </form>                
      </div>
    </div>
</div>


@endsection