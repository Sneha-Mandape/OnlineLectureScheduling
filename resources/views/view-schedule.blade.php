@include('navbar')



         <div class="main">
            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Schedule List</h1>
               </div>
               <div class="report-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Instructor Name</th>
                            <th>Course Name</th>
                            <th>Batch</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->instructor->name }}</td>
                            <td>{{ $schedule->course->name }}</td>
                            <td>{{ $schedule->batch->batch_name }}</td>
                            <td>{{ $schedule->date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
         </div>
@include('admin.footer')
