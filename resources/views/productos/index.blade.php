@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orden de productos</h2>
            </div>
            <div class="d-flex flex-row-reverse flex-column">
                <div class="d-flex">

                    <form action="{{ route('importarProductos') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex">
                        @csrf
                        <input type="file" name="file" style="height: 30px;" required>

                        <button class="btn btn-info">
                            <i class="fas fa-cloud-upload-alt"></i> Subir</button>
                    </form>

                </div>

            </div>
            <td>
                <a href="{{ route('exportarProductos') }}" class="btn btn-primary"
                    style="margin-left: 10px; padding: 10px;">Exportar productos <i class="fas fa-file-excel"></i></a>

            </td>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-dark" style="margin-left: 10px; padding: 10px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 16.66%"> Category</th>
                    <th scope="col" style="width: 16.66%">Product ID</th>
                    <th scope="col" style="width: 16.66%">Product Order</th>
                    <th scope="col" style="width: 16.66%">Cost</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @if ($producto->CATEGORY != null)
                        <tr>
                            <td>{{ $producto->CATEGORY }}</td>
                            <td>{{ $producto->PRODUCT_ID }}</td>
                            <td>{{ $producto->PRODUCT_ORDER }}</td>
                            <td>{{ $producto->COST }}</td>
                        </tr>
                    @else

                    @endif

                @endforeach
            </tbody>
        </table>


        <!-- small modal -->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- medium modal -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mediumBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // display a modal (small modal)
            $(document).on('click', '#smallButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#smallModal').modal("show");
                        $('#smallBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });
            // display a modal (medium modal)
            $(document).on('click', '#mediumButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#mediumModal').modal("show");
                        $('#mediumBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });

        </script>

    @endsection
