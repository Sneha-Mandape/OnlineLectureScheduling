@include('admin.navbar')

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Scedule Lecture</h1>
           <a href="{{route('view-schedule')}}"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-schedule')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="course">Select Course:</label><br>
                    <select id="course" name="course" class="form-control" required>
                        <option value="">Select a Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="batch">Select Batch:</label><br>
                    <select id="batch" name="batch" class="form-control" required>
                        <option value="">Select a Batch</option>
                        @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ old('batch') == $batch->id ? 'selected' : '' }}>{{ $batch->batch_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="instructor">Select Instructor:</label><br>
                    <select id="instructor" name="instructor" class="form-control" required>
                        <option value="">Select an Instructor</option>
                        @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ old('instructor') == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label><br>
                    <input type="date" id="date" name="date" class="form-control" required value="{{ old('date') }}">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
