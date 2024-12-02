@php

    $category_name = 'bank';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

@endphp
@extends('layouts.app')
@section('content')


<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Banks</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Currencies Exchange Manuel Value</a></li>
    </ol>
</nav>
 
<hr>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
            
    <form action="{{ route('update_currencies') }}" method="POST" >
        @csrf
        @method('PUT')
        
        <div class="row">
                         
            <div class="form-group col-sm-auto">
                <label for="amount1">1 Euro To USD : </label>
                <div class="input-group mb-4">
                    <input maxlength="20" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount1" value="{{ $currency->EurToUsd }}" name="EurToUsd">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">USD</span>
                    </div>
                  </div>
                @error('EurToUsd') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            

            
                         
            <div class="form-group col-sm-auto">
                <label for="amount1">1 Euro To MAD : </span></label>
                <div class="input-group mb-4">
                    <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount1" value="{{ $currency->EurToMad }}" name="EurToMad">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">MAD</span>
                    </div>
                  </div>
                @error('EurToMad') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            
            
                         
            <div class="form-group col-sm-auto">
                <label for="amount1">1 Dollar To MAD : </label>
                <div class="input-group mb-4">
                    <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount1" value="{{ $currency->UsdToMad }}" name="UsdToMad">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">MAD</span>
                    </div>
                  </div>
                @error('UsdToMad') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            

             
           
        </div>
        {{-- end row --}}
        <hr>
    

    

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-outline-success mb-2">Update</button>
            <a style="margin-left: 10px" href="{{ route('banks.index') }}" class="btn btn-outline-dark mb-2">Cancel</a>
          </div>
 
      </form>
      <hr>

      
@endsection

  