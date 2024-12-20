@props(['pageTitle' => 'Search Cars'])

<x-app-layout :$pageTitle>
    <main>
        <!-- Found Cars -->
        <section>
            <div class="container">
                <div class="sm:flex items-center justify-between mb-medium">
                    <div class="flex items-center">
                        <button class="show-filters-button flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" style="width: 20px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                            </svg>
                            Filters
                        </button>
                        <h2>Define your search criteria</h2>
                    </div>

                    <select class="sort-dropdown">
                        <option value="">Order By</option>
                        <option value="price">Price Asc</option>
                        <option value="-price">Price Desc</option>
                    </select>
                </div>
                <div class="search-car-results-wrapper">
                    <div class="search-cars-sidebar">
                        <div class="card card-found-cars">
                            <p class="m-0">Found <strong>{{ $cars->total() }}</strong> cars</p>

                            <button class="close-filters-button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     style="width: 24px">
                                    <path fill-rule="evenodd"
                                          d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Find a car form -->
                        <section class="find-a-car">
                            <form action="" method="GET" class="find-a-car-form card flex p-medium">
                                <div class="find-a-car-inputs">
                                    <div class="form-group">
                                        <label class="mb-medium">Maker</label>
                                        <select id="makerSelect" name="maker_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->maker as $maker)
                                                    <x-maker value="{{$maker->id}}">{{$maker->name}}</x-maker>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-maker
                                                        value="{{$cars->first()->maker->id}}">{{$cars->first()->maker->name}}</x-maker>
                                            @else
                                                <option value="">Maker</option>
                                                @foreach($makers as $maker)
                                                    <x-maker value="{{$maker->id}}">{{$maker->name}}</x-maker>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Model</label>
                                        <select id="modelSelect" name="model_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->model as $model)
                                                    <x-model value="{{ $model->id }}"
                                                             data-parent="{{ $model->maker_id }}">{{ $model->name }}</x-model>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-model value="{{ $cars->first()->model->id }}"
                                                         data-parent="{{ $cars->first()->model->maker_id }}">{{ $cars->first()->model->name }}</x-model>
                                            @else
                                                <option value="">Model</option>
                                                @foreach($models as $model)
                                                    <x-model value="{{ $model->id }}"
                                                             data-parent="{{ $model->maker_id }}">{{ $model->name }}</x-model>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Type</label>
                                        <select name="car_type_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->carType as $carType)
                                                    <x-car-type
                                                            value="{{ $carType->id }}">{{ $carType->name }}</x-car-type>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-car-type
                                                        value="{{ $cars->first()->carType->id }}">{{ $cars->first()->carType->name }}</x-car-type>
                                            @else
                                                <option value="">Type</option>
                                                @foreach($carTypes as $carType)
                                                    <x-car-type value="{{$carType->id}}">{{$carType->name}}</x-car-type>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Year</label>
                                        <div class="flex gap-1">
                                            <input type="number" value="{{ $yearForm }}" placeholder="Year From"
                                                   name="year_from" />
                                            <input type="number" value="{{ $yearTo }}" placeholder="Year To"
                                                   name="year_to" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Price</label>
                                        <div class="flex gap-1">
                                            <input type="number" value="{{ $priceForm }}"
                                                   placeholder="Price From" name="price_from" />
                                            <input type="number" value="{{ $priceTo }}" placeholder="Price To"
                                                   name="price_to" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Mileage</label>
                                        <div class="flex gap-1">
                                            <select name="mileage">
                                                <option value="">Any Mileage</option>
                                                <option value="10000">10,000 or less</option>
                                                <option value="20000">20,000 or less</option>
                                                <option value="30000">30,000 or less</option>
                                                <option value="40000">40,000 or less</option>
                                                <option value="50000">50,000 or less</option>
                                                <option value="60000">60,000 or less</option>
                                                <option value="70000">70,000 or less</option>
                                                <option value="80000">80,000 or less</option>
                                                <option value="90000">90,000 or less</option>
                                                <option value="100000">100,000 or less</option>
                                                <option value="150000">150,000 or less</option>
                                                <option value="200000">200,000 or less</option>
                                                <option value="250000">250,000 or less</option>
                                                <option value="300000">300,000 or less</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">State</label>
                                        <select id="stateSelect" name="state_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->city->state as $state)
                                                    <x-state value="{{$state->id}}">{{$state->name}}</x-state>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-state
                                                        value="{{$cars->first()->city->state->id}}">{{$cars->first()->city->state->name}}</x-state>
                                            @else
                                                <option value="">State/Region</option>
                                                @foreach($states as $state)
                                                    <x-state value="{{ $state->id }}">{{ $state->name }}</x-state>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">City</label>
                                        <select id="citySelect" name="city_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->city as $city)
                                                    <x-city value="{{ $city->id }}"
                                                            data-parent="{{ $city->state_id }}">{{ $city->name }}</x-city>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-city value="{{ $cars->first()->city->id }}"
                                                        data-parent="{{ $cars->first()->city->state_id }}">{{ $cars->first()->city->name }}</x-city>
                                            @else
                                                <option value="">City</option>
                                                @foreach($cities as $city)
                                                    <x-city value="{{ $city->id }}"
                                                            data-parent="{{ $city->state_id }}">{{ $city->name }}</x-city>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-medium">Fuel Type</label>
                                        <select name="fuel_type_id">
                                            @if($cars->count() > 1)
                                                @foreach($cars->fuelType as $fuelType)
                                                    <x-fuel-type
                                                            value="{{ $fuelType->id }}">{{ $fuelType->name }}</x-fuel-type>
                                                @endforeach
                                            @elseif($cars->count() == 1)
                                                <x-fuel-type
                                                        value="{{ $cars->first()->fuelType->id }}">{{ $cars->first()->fuelType->name }}</x-fuel-type>
                                            @else
                                                <option value="">Fuel Type</option>
                                                @foreach($fuelTypes as $fuelType)
                                                    <x-fuel-type
                                                            value="{{$fuelType->id}}">{{$fuelType->name}}</x-fuel-type>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button type="button" class="btn btn-find-a-car-reset">
                                        Reset
                                    </button>
                                    <button class="btn btn-primary btn-find-a-car-submit">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </section>
                        <!--/ Find a car form -->
                    </div>

                    <div class="search-cars-results">
                        <div class="car-items-listing">
                            @foreach($cars as $car)
                                <x-car-item :$car />
                            @endforeach
                        </div>

                        {{ $cars->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </section>
        <!--/ Found Cars -->
    </main>
</x-app-layout>