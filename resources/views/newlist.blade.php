<form action="{{ url('api/list') }}" method="POST">
        @csrf
        @method('POST')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="bordid" value="{{$id}}"class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Naam:</strong>
                    <input type="text" name="naam" class="form-control" placeholder="Naam"><br><br>
                </div>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>beschrijving</strong><br>
                    <textarea class="form-control" style="height:150px" name="beschrijving" placeholder="beschrijving"></textarea><br><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>geplande eindtijd</strong><br>
                    <input type='date' name='eindtijd'></input><br><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>niet begonnen:</strong>
                    <input type="checkbox" name="status" class="form-control" placeholder="status" value='0'><br>
                    <strong>in de maak:</strong>
                    <input type="checkbox" name="status" class="form-control" placeholder="status" value='1'><br>
                    <strong>afgerond:</strong>
                    <input type="checkbox" name="status" class="form-control" placeholder="status" value='2'><br><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>