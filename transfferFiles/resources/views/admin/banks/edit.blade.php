@php

    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

@endphp

@extends('layouts.app')
   
@section('content')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Bank List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Edit Bank: {{ $banks->Nom_du_compte }}</a></li>
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

        
    <form action="{{ route('banks.update',$banks->id) }}" method="POST" >
        @csrf
        @method('PUT')
        
        <div class="row">

        <div class="form-group col-sm-auto">
            <label>Nom du compte</label>
            <input type="text" class="form-control"  placeholder="Nom du compte" name="Nom_du_compte" value="{{ $banks->Nom_du_compte }}">
            @error('Nom_du_compte') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        
            <div class="form-group col-sm-auto">
                <label>Code du compte</label>
                <input type="text" class="form-control"  name="Code_du_compte" value="{{ $banks->Code_du_compte }}" placeholder="Code du compte">
                @error('Code_du_compte') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
    
        <div class="form-group col-sm-auto">
            <label>Numero de compte</label>
            <input type="text" class="form-control"  name="Numero_de_compte" value="{{ $banks->Numero_de_compte }}" placeholder="Numero de compte">
            @error('Numero_de_compte') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-sm-auto">
            <label>Nom de la banque</label>
            <input type="text" class="form-control"  name="Nom_de_la_banque" value="{{ $banks->Nom_de_la_banque }}" placeholder="Nom de la banque">
            @error('Nom_de_la_banque') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

    </div>
    {{-- end row --}}
    <hr>


    <div class="row">
        <div class="form-group col-sm-auto">
            <label>SWIFT</label>
            <input type="text" class="form-control"  name="SWIFT" value="{{ $banks->SWIFT }}" placeholder="SWIFT">
            @error('SWIFT') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label>Devise :</label>
            <select class="form-control" id="Devise" value="{{ $banks->Devise }}" name="Devise">
            <option value="">Select Devise</option>
            <option value="EUR">EUR</option>
            <option value="MAD">MAD</option>
            <option value="USD">USD</option>
            </select>
            @error('Devise') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
             
    
        <div class="form-group col-sm-auto">
            <label>Balance</label>
            <input type="number" class="form-control"  name="Balance" value="{{ $banks->Balance }}" placeholder="Balance">
            @error('Balance') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label>Description</label>
            <input type="text" class="form-control"  name="Description" value="{{ $banks->Description }}" placeholder="Description">
            @error('Description') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    {{-- end row --}}
    <hr>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-outline-success mb-2">Update</button>
            <button style="margin-left: 10px" href="{{ route('banks.index') }}" class="btn btn-outline-dark mb-2">Cancel</button>
          </div>
 
      </form>
      <hr>

      <script type="text/javascript">
      
        document.getElementById("Devise").value = <?php echo json_encode($banks->Devise); ?>;    // set the value to this input 
      </script>

@endsection


{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}