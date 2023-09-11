<form action="{{ url('api/workspace') }}" method="POST">
        @csrf
        @method('POST')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="naam" class="form-control" placeholder="Naam">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pakket</strong>
                    <!-- <textarea class="form-control" style="height:150px" name="beschrijving" placeholder="beschrijving"></textarea> -->
                    <select name="beschrijving" id="beschrijving">
                        <option value="" disabled selected>Kies pakket</option>
                        @foreach ($pakket as $pakket)
                            <option value="{{ $pakket }}">{{ $pakket->pakket }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>