@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Contact Section
@endpush

@push('add-css')
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Contact Table</h5>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="contactTables">
              <thead>
                <tr>
                  <th>#SL.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>                    
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>

            </table>
          </div>
        </div>
    </div>
 </div>

@endsection



@push('custom-script')

 <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

 <script>

     $(document).ready(function(){

        // show all data
        let contactTables = $('#contactTables').DataTable({
            order: [
                [0, 'asc']
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.get-contact') }}",
            // pageLength: 30,

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'mobile'
                },            
                {
                    data:'message'
                },

                {
                    data:'action'
                }
            ]
        });        


         //Contact Delete
         $(document).on('click', '#deleteContactBtn', function () {

             var id = $(this).data('id');


             swal.fire({
                 title: "Are you sure?",
                 text: "You won't be able to revert this !",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#d33",
                 cancelButtonColor: "#3085d6",
                 confirmButtonText: "Yes, delete it!"
             })
                 .then((result) => {
                     if (result.isConfirmed) {

                         $.ajax({
                             type: "DELETE",
                             url:  "{{ url('admin/contact') }}/" + id,
                             data: {
                                 // '_token': token,
                                 id: id,

                             },
                             success: function (res) {

                                 Swal.fire({
                                     title: "Deleted!",
                                     text: `${res.message}`,
                                     icon: "success"
                                 });

                                 contactTables.ajax.reload();


                             },
                             error: function (err) {
                                 console.log(err);
                             }
                         })
                     }

                     else
                     {
                         swal.fire('Your Data is Safe');
                     }

                 })
         })
            
    });
     
     

 </script>

@endpush
