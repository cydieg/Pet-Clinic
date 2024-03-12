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
        <div class="row justify-content-between mb-3">
            <div class="col-md-4">
                <!-- Button to open modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clinicModal">
                    <i class="fas fa-hospital"></i> Select Clinic
                </button>
            </div>
            <div class="col-md-4 text-right">
                <!-- Button to add product -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                    <i class="fas fa-plus"></i> Add Product
                </button>
            </div>
        </div>

        <!-- Inventory table -->
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
                    <th>Clinic</th> <!-- New column for clinic name -->
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
                    <td class="clinic-name"></td> <!-- Display clinic name here -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Clinic Selection Modal -->
    <div class="modal fade" id="clinicModal" tabindex="-1" aria-labelledby="clinicModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clinicModalLabel">Select Clinic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        @foreach($clinics as $clinic)
                        <li class="list-group-item clinic-option" data-clinic-id="{{ $clinic->id }}">{{ $clinic->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <!-- Form fields for adding a product -->
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
        // Custom JavaScript
        $(document).ready(function() {
            // Handle clinic selection
            $('.clinic-option').click(function() {
                var clinicName = $(this).text();
                $('.clinic-name').text(clinicName);
                $('#clinicModal').modal('hide');
            });
        });
    </script>
</body>

</html>
