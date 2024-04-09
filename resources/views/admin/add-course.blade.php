@include('admin.navbar')

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Add Course</h1>
           <a href="{{route('view-course')}}"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-course')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="level">Level:</label><br>
                    <input type="text" id="level" name="level" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label><br>
                    <input type="file" id="image" name="image" class="form-control-file" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
     </div>
</div>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get the success message element
        var successMessage = document.getElementById('successMessage');

        // Check if the success message element exists
        if (successMessage) {
            // Hide the success message after 4 seconds
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 4000); // 4000 milliseconds = 4 seconds
        }
    });
</script>

@include('admin.footer')
