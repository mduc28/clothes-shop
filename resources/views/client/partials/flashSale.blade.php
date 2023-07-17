    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            {{-- @dd($flashSale) --}}
            @foreach ($aryFlashSale as $item)
                <div class="row flash-sale">
                    <div class="col-lg-3">
                        <div class="categories__text">
                            <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories__hot__deal">
                            <img src="{{ asset(config('handle.show_image_path') . $aryFlashSaleProdImage->name) }}">
                            <div class="hot__deal__sticker">
                                <span>Sale Off</span>
                                <h5>{{ $item->value }}{{ $item->type_discount == config('handle.type.discount.percent') ? '%' : '$' }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <div class="categories__deal__countdown">
                            <span>Flash Sale</span>
                            <h2>{{$item->name}}</h2>
                            <div class="categories__deal__countdown__timer" id="countdown">
                                <input type="hidden" class="end-date" data-end="{{ $item->end }}">
                                <div class="cd-item">
                                    <span>3</span>
                                    <p>Days</p>
                                </div>
                                <div class="cd-item">
                                    <span>1</span>
                                    <p>Hours</p>
                                </div>
                                <div class="cd-item">
                                    <span>50</span>
                                    <p>Minutes</p>
                                </div>
                                <div class="cd-item">
                                    <span>18</span>
                                    <p>Seconds</p>
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Categories Section End -->