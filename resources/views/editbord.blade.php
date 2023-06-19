<form action="{{ url('/api/updatebord/'.$bord['id']) }}" method="post">
        @csrf
        @method('put')
    {{ $bord }}
    {{ $bords }}
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="naam" class="form-control" placeholder="Naam" value="{{$bord['naam']}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>beschrijving</strong>
                    <input class="form-control" style="height:150px" name="beschrijving" placeholder="beschrijving" value="{{$bord['beschrijving']}}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>