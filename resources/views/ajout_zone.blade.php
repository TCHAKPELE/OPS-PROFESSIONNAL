@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">@if($request->session()->has('msg'))
                     <div class="alert alert-success">
                     <h2 >Alert</h2>
                     {{$request->session()->get('msg')}}
                     </div>
                     @endif
 
</div>

                <div class="card-body">
                    <form method="POST" action="{{route('new_zone')}}">
                        @csrf
                       
                        <?php
                        $appels = Illuminate\Support\Facades\DB::table('appel_d_offres')->where('appel_d_offres.id','=',$id_appel)->get();
                        

                        ?>
                        
                         <input id="nom" type="number"  hidden class="form-control @error('nom') is-invalid @enderror" name="num_offre" value="{{ $id_appel}}" >

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom_zone') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom_zone" value="{{ old('nom') }}" >

                                @error('Nom_zone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nbr" class="col-md-4 col-form-label text-md-right">{{ __('Nombre d_OPS affecté') }}</label>

                            <div class="col-md-6">
                                <input id="nbr" type="number" class="form-control @error('nbr') is-invalid @enderror" name="nbr_ops" >

                                @error('Nombre d_OPS affecté')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Rénumération') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="number" class="form-control @error('nom') is-invalid @enderror" name="renumeration" value="{{ old('nom') }}" >

                                @error('Rénumération')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                   

                                  
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter une Zone') }}
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
