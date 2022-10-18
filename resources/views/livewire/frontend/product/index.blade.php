<div>
    <div class="row">
        <div class="col-md-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $item)
                            <label for="" class="d-block">
                                <input type="checkbox" wire:model="brandsInputs"
                                    value="{{ $item->name }}">{{ $item->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    
                        <label for="" class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">High to Low
                        </label>

                        <label for="" class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">Low to High
                        </label>
                   
                   
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">

                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif

                                @if ($product->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collecton/' . $product->category->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}" style="height: 260px;"
                                            alt="{{ $product->name }}">
                                    </a>
                                @endif


                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $product->selling_price }}</span>
                                    <span class="original-price">{{ $product->original_price }}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-4">
                        <div class="p-2">
                            <h4> No Products Available for {{ $category->name }}</h4>

                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
