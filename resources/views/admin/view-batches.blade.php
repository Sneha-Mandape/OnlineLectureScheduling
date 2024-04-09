@include('admin.navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Batches List</h1>
               </div>
               <div class="report-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Batch Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $batch)
                        <tr>
                            <td>{{ $batch->course->name }}</td>
                            <td>{{ $batch->batch_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
         </div>
@include('admin.footer')
