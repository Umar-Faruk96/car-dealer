<x-app-layout pageTitle="Home">
    <!-- Home Slider -->
    <section class="hero-slider">
        <!-- Carousel wrapper -->
        <div class="hero-slides">
            <!-- Item 1 -->
            <div class="hero-slide">
                <div class="container">
                    <div class="slide-content">
                        <h1 class="hero-slider-title">
                            Buy <strong>The Best Cars</strong> <br />
                            in your region
                        </h1>
                        <div class="hero-slider-content">
                            <p>
                                Use powerful search tool to find your desired cars based on
                                multiple search criteria: Maker, Model, Year, Price Range, Car
                                Type, etc...
                            </p>

                            <button class="btn btn-hero-slider">Find the car</button>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hero-slide">
                <div class="flex container">
                    <div class="slide-content">
                        <h2 class="hero-slider-title">
                            Do you want to <br />
                            <strong>sell your car?</strong>
                        </h2>
                        <div class="hero-slider-content">
                            <p>
                                Submit your car in our user friendly interface, describe it,
                                upload photos and the perfect buyer will find it...
                            </p>

                            <button class="btn btn-hero-slider">Add Your Car</button>
                        </div>
                    </div>
                    <div class="slide-image">
                        <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
            <button type="button" class="hero-slide-prev">
                <svg
                        style="width: 18px"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                >
                    <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 1 1 5l4 4"
                    />
                </svg>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hero-slide-next">
                <svg
                        style="width: 18px"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                >
                    <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                    />
                </svg>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <!--/ Home Slider -->

    <main>
        <!-- Find a car form -->
        <section class="find-a-car">
            <div class="container">
                <form action="{{ route('car.search') }}" method="GET" class="find-a-car-form card flex p-medium">
                    <div class="find-a-car-inputs">
                        <div>
                            <select id="makerSelect" name="maker_id">
                                <option value="">Maker</option>
                                @foreach($makers as $maker)
                                    <x-maker value="{{$maker->id}}">{{$maker->name}}</x-maker>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select id="modelSelect" name="model_id">
                                <option value="">Model</option>
                                @foreach($models as $model)
                                    <x-model value="{{ $model->id }}"
                                             data-parent="{{ $model->maker_id }}">{{ $model->name }}</x-model>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select id="stateSelect" name="state_id">
                                <option value="">State/Region</option>
                                @foreach($states as $state)
                                    <x-state value="{{ $state->id }}">{{ $state->name }}</x-state>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select id="citySelect" name="city_id">
                                <option value="">City</option>
                                @foreach($cities as $city)
                                    <x-city value="{{ $city->id }}"
                                            data-parent="{{ $city->state_id }}">{{ $city->name }}</x-city>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="car_type_id">
                                <option value="">Type</option>
                                @foreach($carTypes as $carType)
                                    <x-car-type value="{{$carType->id}}">{{$carType->name}}</x-car-type>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="number" placeholder="Year From" name="year_from" />
                        </div>
                        <div>
                            <input type="number" placeholder="Year To" name="year_to" />
                        </div>
                        <div>
                            <input type="number" placeholder="Price From" name="price_from" />
                        </div>
                        <div>
                            <input type="number" placeholder="Price To" name="price_to" />
                        </div>
                        <div>
                            <select name="fuel_type_id">
                                <option value="">Fuel Type</option>
                                @foreach($fuelTypes as $fuelType)
                                    <x-fuel-type value="{{$fuelType->id}}">{{$fuelType->name}}</x-fuel-type>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-find-a-car-reset">
                            Reset
                        </button>
                        <button class="btn btn-primary btn-find-a-car-submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <!--/ Find a car form -->

        <!-- New Cars -->
        <section>
            <div class="container">
                <h2>Latest Added Cars</h2>
                <div class="car-items-listing">
                    @foreach($cars as $car)
                        <x-car-item :$car />
                    @endforeach
                </div>
                {{ $cars->onEachSide(1)->links() }}
            </div>
        </section>
        <!--/ New Cars -->
    </main>
</x-app-layout>