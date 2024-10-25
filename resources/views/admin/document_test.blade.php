<!DOCTYPE html>
<html>
<head>
    <title>Upload Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Document</h2>
        
        <!-- Success and Error Alerts -->
        <div id="success-message" class="alert alert-success" style="display: none;"></div>
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        
        <!-- File Upload Form -->
        <form id="document-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="document_file" class="form-label">Select Document:</label>
                <input type="file" name="document_file" class="form-control" id="document_file" required>
            </div>
            <div class="mb-3">
                <label for="document_name" class="form-label">Document Name:</label>
                <input type="text" name="document_name" class="form-control" id="document_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#document-form').on('submit', function (e) {
                e.preventDefault();

                // Hide previous messages
                $('#success-message').hide();
                $('#error-message').hide();

                // Prepare form data
                var formData = new FormData(this);

                // AJAX request to upload the document
                $.ajax({
                    url: "{{ route('create_document') }}", // Adjust route name or URL if needed
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#success-message').text(response.message).show();
                    },
                    error: function (xhr) {
                        var errorMessage = xhr.responseJSON?.message || 'An error occurred during the upload.';
                        $('#error-message').text(errorMessage).show();
                    }
                });
            });
        });
    </script>
</body>
</html>
