@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('Enregistrer un appel d_offre') }}
                </br>
                @if($request->session()->has('msg'))
                     <div class="alert alert-danger">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif
                </div>  

                <div class="card-body">
                    <form method="POST" action="{{route('save')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom_entreprise" class="col-md-4 col-form-label text-md-right">{{ __('Nom Entreprise') }}</label>

                            <div class="col-md-6">
                                <input id="nom_entreprise" type="text" class="form-control @error('nom_entreprise') is-invalid @enderror" name="nom_entreprise" value="{{ old('nom_entreprise') }}" required autofocus name="nom_entreprise">

                                @error('nom_entreprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="Firstname" class="col-md-4 col-form-label text-md-right">{{ __('Numero_identification') }}</label>

                            <div class="col-md-6">
                                <input id="num_identification" type="text" class="form-control @error('num_identification') is-invalid @enderror" name="num_identification" value="{{ old('num_identification') }}" required autofocus name="num_identification" >

                                @error('num_identification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autofocus name="tel" >

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date_debut') }}</label>

                            <div class="col-md-6">
                                <input id="Date_debut" type="date" class="form-control @error('Date_debut') is-invalid @enderror" name="Date_debut" value="{{ old('Date_debut') }}" required autofocus name="Date_debut" >

                                @error('Date_debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date2" class="col-md-4 col-form-label text-md-right">{{ __('Date_fin') }}</label>

                            <div class="col-md-6">
                                <input id="Date_fin" type="date" class="form-control @error('Date_fin') is-invalid @enderror" name="Date_fin" required autofocus name="Date_fin">

                                @error('Date_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rénumeration" class="col-md-4 col-form-label text-md-right">{{ __('Rénumeration') }}</label>

                            <div class="col-md-6">
                                <input id="renumeration" type="number" class="form-control" name="renumeration" required autofocus name="renumeration">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
