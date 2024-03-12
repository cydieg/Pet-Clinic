<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Inventory</div>

                    <div class="card-body">
                        <div class="text-right mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                <i class="fas fa-plus"></i> Add Product
                            </button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    <th>Expiration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventoryItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td><img src="{{ asset('images/'.$item->image) }}" alt="Image"></td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <!-- Add action buttons here, such as edit, delete, etc. -->
                                    </td>
                                    <td>{{ $item->expiration }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product to Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('inventory.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created At</label>
                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
                        </div>
                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="date" class="form-control" id="expiration" name="expiration" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Add your custom JavaScript here
    </script>
</body>

</html>
