@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">SEO
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <div class="mb-3">
                                    <label for="">Select Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" id="" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>


                            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="mata_title" class="form-control"
                                        value="{{ $product->mata_title }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="">Original Price</label>
                                        <input type="text" name="original_price" class="form-control"
                                            value="{{ $product->original_price }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control"
                                            value="{{ $product->selling_price }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Quantity</label>
                                        <input type="text" name="quantity" class="form-control"
                                            value="{{ $product->quantity }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" style="width:50px;height:50px;"
                                            {{ $product->trending == '1' ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" style="width:50px;height:50px;"
                                            {{ $product->status == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">

                                <div class="mb-3">
                                    <label for="">Upload Product Image</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>

                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $images)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($images->image) }}" width="80px" height="80px"
                                                        class="me-4 border" alt="Img" />
                                                    <a href="{{ url('admin/product-image/' . $images->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>

                            </div>

                            <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <h4>Add Product Color</h4>
                                    <label for="">Select Color</label>
                                    <hr>
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]"
                                                        value="{{ $coloritem->id }}" style="width: 15px;height: 15px;">
                                                    {{ $coloritem->name }}
                                                    <br>
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $coloritem->id }}]"
                                                        style="width: 70px; border: 1px solid;">

                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No Colors Found</h1>
                                            </div>
                                        @endforelse


                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Color Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $productColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($productColor->color)
                                                            {{ $productColor->color->name }}
                                                        @else
                                                            No Colors Found
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text" value="{{ $productColor->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $productColor->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $productColor->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>




                        </div>
                        <div class="py-2 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                alert(product_id);

                if (qty <= 0) {
                    alert('Quantity is Required');
                    return false;
                }

                var data = {
                    'product_id': product_id,

                    'qty': qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,

                    success: function(response) {
                        alert(response.message)
                    }
                });

            });

            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/"+ prod_color_id+"/delete",
                  
                    success: function (response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)
                    }
                });
            });
        });
    </script>
@endsection
