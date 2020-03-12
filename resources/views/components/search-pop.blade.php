<div class="home__filters" style="margin-top: -50px;">
    <form action="{{ route('stocklist_search') }}" class="filter-options">
        <div class="searchbar__main"></div>
        <div>
            <a class="filter-options__btn" >
                SEARCH
            </a>
        </div>

        <div class="popup float-container" id="search_popup" style="z-index: 107;">
            <div class="popup_bg">
                <div class="popup_shadow">
                </div>
            </div>

            <div class="popup_head">
                <strong>Modify Filters</strong>
                <span class="close-btn">
                    <i class="material-icons">
                        close
                    </i>
                </span>
            </div>

            <div class="popup_content">
                <div class="filter-inner">
                    <div class="filter-item">
                        <div class="filter-item__label">
                            <label for="make_id">Maker</label>
                        </div>
                        <div class="filter-item__content">
                            <div class="dropdown-select">
                                <select name="maker_id" id="maker_id" class="dropdown-select_select">
                                    <option value="">Make (all)</option>
                                    @foreach(\App\Company::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="filter-item__label">
                            <label for="make_id">Model</label>
                        </div>
                        <div class="filter-item__content">
                            <div class="dropdown-select">
                                <select name="model_no" id="model_no" class="dropdown-select_select">
                                    <option value="">Make (all)</option>
                                    @foreach(\App\VehicleModel::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->model }}</option>
                                    @endforeach  
                                </select>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                        </div>
                    </div>

                    <div class="filter-item">
                        <div class="filter-item__label">
                            <label for="body_type">Type</label>
                        </div>

                        <div class="filter-item__content">
                            <div class="dropdown-select">
                                <select name="veh_type" class="dropdown-select_select">
                                    <option value="">Body type(all)</option>
                                    @foreach(\App\VehicleType::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->type }}</option>
                                    @endforeach
                                </select>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                        </div>
                    </div>

                    <div class="filter-item">
                        <div class="filter-item__label">
                            <label for="year">Year</label>
                        </div>
                        <div class="filter-item__content">
                            <div class="dropdown-select Medium">
                                <select name="year_from" class="dropdown-select_select Empty">
                                    <option value="1950">Min year</option>
                                    @for($i=now()->format('Y'); $i>=1950 ;$i--)
                                    <option value= "{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <b>~</b>
                            <div class="dropdown-select Medium">
                                <select name="year_to" class="dropdown-select_select Empty">
                                    <option value="{{ now()->format('Y') }}">Max year</option>
                                    @for($i=now()->format('Y'); $i>=1950 ;$i--)
                                    <option value= "{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                </select>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                        </div>
                    </div>

                    <div class="filter-item">

                        <div class="filter-item">
                            <div class="filter-item__label">
                                <label for="price">Price<span>USD</span>
                                </label>
                            </div>
                            <div class="filter-item__content">
                                <div class="dropdown-select Medium">
                                    <select name="price_from" class="dropdown-select_select Empty">
                                       <option value="0">Min Price</option>
                                       @for($i=1; $i <= 20 ;$i++)
                                       <option value= "{{ $i*500 }}"> {{ $i*500 }}</option>
                                       @endfor

                                   </select>
                                   <i class="material-icons">arrow_drop_down</i>
                               </div> <b>~</b>
                               <div class="dropdown-select Medium">
                                <select name="price_to" class="dropdown-select_select Empty">
                                   <option value="9999999999999">Max Price</option>
                                   @for($i=1; $i <= 20 ;$i++)
                                   <option value= "{{ $i*500 }}"> {{ $i*500 }}</option>
                                   @endfor

                               </select>
                               <i class="material-icons">arrow_drop_down</i>
                           </div>
                       </div>
                   </div>

                   <div class="filter-item">
                    <div class="filter-item__label">
                        <label for="steering">Steering</label>
                    </div>
                    <div class="filter-item__content">
                        <div class="radio-group len-3">
                            <label>
                                <input type="radio" name="steering" value="">
                                <span>Any</span>
                            </label><label>
                                <input type="radio" name="steering" value="Left">
                                <span>Left</span>
                            </label>
                            <label>
                                <input type="radio" name="steering" value="Right"> 
                                <span>Right</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="filter-item">
                    <div class="filter-item__label">
                        <label for="fuel">Fuel</label>
                    </div>

                    <div class="filter-item__content">
                        <div class="radio-group len-6">
                           <label>
                            <input type="radio" name="fuel_type" value="CNG"> 
                            <span>CNG</span>
                        </label>
                        <label>
                            <input type="radio" name="fuel_type" value="Diesel"> 
                            <span>Diesel</span>
                        </label>
                        <label>
                            <input type="radio" name="fuel_type" value="Electric"> 
                            <span>Electric</span>
                        </label>
                        <label>
                            <input type="radio" name="fuel_type" value="Hybrid"> 
                            <span>Hybrid</span>
                        </label>
                        <label>
                            <input type="radio" name="fuel_type" value="LPG"> 
                            <span>LPG</span>
                        </label>
                        <label>
                            <input type="radio" name="fuel_type" value="Petrol"> 
                            <span>Petrol</span>
                        </label>
                    </div>
                </div>
            </div>


            <div class="filter-item">
                <div class="filter-item__label">
                    <label for="engine">Engine<span>cc</span></label>
                </div>
                <div class="filter-item__content">
                    <div class="dropdown-select Medium">
                        <select name="engine_capacity_from" class="dropdown-select_select Empty">
                            <option value="0">Min Eng.cc</option>
                            @for($i=0; $i <= 20 ;$i++)
                            <option value= "{{ ($i*100)+700 }}"> {{ ($i*100)+700 }}</option>
                            @endfor
                        </select>

                        <i class="material-icons">arrow_drop_down</i>
                    </div>

                    <b>~</b>

                    <div class="dropdown-select Medium">
                        <select name="engine_capacity_to" class="dropdown-select_select Empty">
                            <option value="99999999999">Max Eng.cc</option>
                            @for($i=0; $i <= 20 ;$i++)
                            <option value= "{{ ($i*100)+700 }}"> {{ ($i*100)+700 }}</option>
                            @endfor
                        </select>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                </div>
            </div>

            <div class="filter-item">


                <div class="popup-btns float-container">
                    <button class="popup-btns__reset">
                        Reset
                    </button>
                    <button class="popup-btns__search">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</div></div>
</form>
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
        $('#model_no').html(data);
    }
});
  }

});
</script>