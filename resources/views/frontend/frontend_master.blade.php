<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ADIDAS" />
    <meta charset utf="8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    @include('frontend.frontend_layout.body.style')

</head>

<body>
    @include('frontend.frontend_layout.body.header')

    @if (request()->routeIs('home'))
    @else
        @include('frontend.frontend_layout.body.breadcrumb')
    @endif

    @yield('frontend_content')

    <!--  FOOTER  -->
    @include('frontend.frontend_layout.body.footer')

    @include('frontend.frontend_layout.body.script')


    <!-- Add to Cart Product Modal -->
    {{-- <div class="modal fade" id="productViewModal" tabindex="-1" aria-labelledby="productViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; height:300px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="productViewModalLabel"><span id="pname"></span></h5>
                    <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="" id="pimage" alt=""
                                    style="width: 180px" height="180px">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong class="text-danger">BDT
                                        <span id="price"></span>
                                    </strong>
                                    <del id="oldprice"></del>
                                </li>
                                <li class="list-group-item">Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="category"></strong></li>
                                <li class="list-group-item">Brand: <strong id="brand"></strong></li>
                                <li class="list-group-item">Stock:
                                    <span id="Instock" class="bdage bdage-pill badge-success"
                                        style="background: green; color: white"></span>
                                    <span id="Outofstock" class="bdage bdage-pill badge-danger"
                                        style="background: red; color: white"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="colorArea">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">
                                    <option>--Select Color--</option>
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>--Select Size--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_qty">Qty</label>
                                <input type="number" name="quantity" id="product_qty" value="1" min="1">
                            </div>
                            <input type="hidden" id="product_id">
                            <button class="btn btn-primary mb-2" type="submit" onclick="addToCart()">Add to
                                Cart</button>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Add to Cart Product Modal END-->

    <script>
        // function AlertSubcribe() {
        //     Swal.fire({
        //         position: 'top-end',
        //         icon: 'success',
        //         title: '!!',
        //         showConfirmButton: false,
        //         timer: 1500
        //     })
        // }
    </script>
</body>

</html>
