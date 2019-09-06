@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-left: -200px; margin-right:-200px ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('Etape 2 : Remplissez les champs concernant l_appel d_offre ') }} </div>
                </br>
                 @if($request->session()->has('msg'))
                     <div class="alert alert-danger">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif

                <div class="card-body">
                    <form method="POST" action="{{route('save2')}}">
                        @csrf

                        <input  type="text" hidden name="id" value="{{ $appel->id}}" >


                        <div class="form-group row">
                            <label for="nom_entreprise" class="col-md-4 col-form-label text-md-right">{{ __('Nom Entreprise') }}</label>

                            <div class="col-md-6">
                                <input id="nom_entreprise" type="text" readonly class="form-control @error('nom_entreprise') is-invalid @enderror" name="nom_entreprise" value="{{ $appel->nom_entreprise }}" >

                                @error('nom_entreprise')
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
