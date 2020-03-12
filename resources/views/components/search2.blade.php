<div class="searchbar searchbar--hide-on-mobile">
  <div class="searchbar__bg"></div>
  <div class="searchbar-inner clearfix">

    <form action="{{ route('stocklist_search') }}" method="get">
      <div class="searchbar__main">
      </div>

      <div class="searchbar__selects-container">

        <div class="searchbar__select-container searchbar__select-container--large">
          <i class="material-icons">arrow_drop_down</i>
          <select name="maker_id" id="maker_id" class="searchbar__select" title="Make (all)">
            <option selected="" value="">Make (all)</option>
            @foreach (\App\Company::all() as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="searchbar__select-container searchbar__select-container--large">
          <i class="material-icons">arrow_drop_down</i>
          <select name="model_no" id="model_id" class="searchbar__select" title="Models (all)">
            <option selected="" value="">Models (all)</option>
            @foreach (\App\VehicleModel::all() as $item)
            <option value="{{ $item->id }}">{{ $item->model }}</option>
            @endforeach            
          </select>
        </div>

        <div class="searchbar__select-container searchbar__select-container--large">
          <i class="material-icons">arrow_drop_down</i>
          <select name="fuel_type" id="fuel" class="searchbar__select" title="Fuel(any)">
            <option selected value>Fuel(any)</option>
            <option value="CNG">CNG</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <option value="LPG">LPG</option>
            <option value="Petrol">Petrol</option>
          </select>
        </div>

        <div class="searchbar__select-container searchbar__select-container--large">
          <i class="material-icons">arrow_drop_down</i>
          <select name="drive_type" id="drivetrain" class="searchbar__select" title="Drivetrain(any)">
            <option value="">Drivetrain(any)</option>
            <option value="2WD">2WD</option>
            <option value="4WD">4WD</option>
          </select>
        </div>

        <div class="searchbar__select-container searchbar__select-container--medium">
          <i class="material-icons">arrow_drop_down</i>
          <select name="price_from" id="price_from" class="searchbar__select" title="Min Price">
            <option selected value="0">Min Price</option>

            @for ($i = 1; $i < 20; $i++)
            <option value="{{ 500*$i }}">${{ 500*$i }}</option>
            @endfor
          </select>
        </div>

        <div class="searchbar__select-container searchbar__select-container--medium">
          <i class="material-icons">arrow_drop_down</i>
          <select name="price_to" id="price_to" class="searchbar__select" title="Max Price">
           <option selected value="9999999999999">Max Price</option>
           @for ($i = 1; $i < 20; $i++)
           <option value="{{ 500*$i }}">${{ 500*$i }}</option>
           @endfor
         </select>
       </div>

       <div class="searchbar__select-container searchbar__select-container--large">
        <i class="material-icons">arrow_drop_down</i>
        <select name="veh_type" id="body_type" class="searchbar__select" title="Body type(all)">
          <option selected value>Body type(all)</option>
          @foreach (\App\VehicleType::all() as $item)
          <option value="{{ $item->id }}">{{ $item->type }}</option>
          @endforeach
        </select>
      </div>

      <div class="searchbar__select-container searchbar__select-container--large">
        <i class="material-icons">arrow_drop_down</i>
        <select name="steering" id="steering" class="searchbar__select" title="Steering(any)">
          <option selected="" value="">Steering(any)</option>
          <option value="1">Left</option>
          <option value="2">Right</option>
        </select>
      </div>

      <div class="searchbar__select-container searchbar__select-container--large">
        <i class="material-icons">arrow_drop_down</i>
        <select name="transmission" id="transmission" class="searchbar__select" title="Transmission(any)">
          <option value="">Transmission (any)</option>
          <option>Automatic</option>
          <option>CVT</option>
          <option>DCT</option>
          <option>Manual</option>
          <option>Semi Automatic</option>
          <option>Sport AT</option>
          <option>Unspecified</option>
        </select>
      </div>


      <div class="searchbar__select-container searchbar__select-container--medium">
        <i class="material-icons">arrow_drop_down</i>
        <select name="engine_capacity_from" id="engine_capacity_from" class="searchbar__select" title="Min Eng.cc">
         <option selected value="0">Min Eng.cc</option>
         <option value="700">700 cc</option>
         <option value="1000">1,000 cc</option>
         <option value="1500">1,500 cc</option>
         <option value="1800">1,800 cc</option>
         <option value="2000">2,000 cc</option>
         <option value="2500">2,500 cc</option>
         <option value="3000">3,000 cc</option>
         <option value="4000">4,000 cc</option>



       </select>
     </div>

     <div class="searchbar__select-container searchbar__select-container--medium">
      <i class="material-icons">arrow_drop_down</i>
      <select name="engine_capacity_to" id="engine_capacity_to" class="searchbar__select" title="Max Eng.cc">
        <option selected value="10000000000">Max Eng.cc</option>
        <option value="700">700 cc</option>
        <option value="1000">1,000 cc</option>
        <option value="1500">1,500 cc</option>
        <option value="1800">1,800 cc</option>
        <option value="2000">2,000 cc</option>
        <option value="2500">2,500 cc</option>
        <option value="3000">3,000 cc</option>
        <option value="4000">4,000 cc</option>
      </select>
    </div>

    <div class="searchbar__select-container searchbar__select-container--medium">
      <i class="material-icons">arrow_drop_down</i>
      <select name="year_from" id="year_from" class="searchbar__select" title="Min year">
        <option selected value="1950">Min year</option>

        @for($i=now()->format('Y') ; $i>=1950 ;$i--)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor



      </select>
    </div>

    <div class="searchbar__select-container searchbar__select-container--medium">
      <i class="material-icons">arrow_drop_down</i>
      <select name="year_to" id="year_to" class="searchbar__select" title="Max year">
        <option selected value="{{ now()->format('Y') }}">Max year</option>
        @for($i=now()->format('Y') ; $i>=1950 ;$i--)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor

      </select>
    </div>

  </div>
  <div class="searchbar__btn-container">
    <button class="searchbar__btn">SEARCH</button>
    <span class="searchbar__text">OR</span>
    <a class="searchbar__link" id="reset_btn">RESET</a>
  </div>

</form>
</div>
</div>

<script>
  $(document).ready(function(){

    $('#maker_id').on('change',function(){
      get_models($(this).val());
      console.log('done..');
    });

    function get_models(maker_id){
      $.ajax({
        url: '/ajax/'+maker_id+'/fetchmodels',
        method: 'post',
        data: {
          maker_id: $('#maker_id').val(),
        },
        headers:
        {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        success: function (response) {
          var data = '<option value="">Models (all)</option>';
          for (var i = 0; i < response.length; i++) {
            data += '<option value="' + response[i]['id'] + '">' + response[i]['model'] + '</option>';
          }
          $('#model_id').html(data);
        }
      });
    }

  });
</script>