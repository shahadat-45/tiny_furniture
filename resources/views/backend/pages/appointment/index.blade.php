@extends('backend.layout.master')

@push('meta-title')
    Dashboard | Appointment Section
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

    <div class="row">
        <div class="card">
          


            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="scheduleTable">
                        <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
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
    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>


    <script>

        $(document).ready(function() {


            // show all data
            let scheduleTable = $('#scheduleTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get-appointment') }}",
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
                        data: 'date'
                    },
                    {
                        data: 'action'
                    }

                ]
            });


            //  Status updates
            // $(document).on('click', '#status', function () {
            //     var id = $(this).data('id');
            //     var status = $(this).data('status');

            //     // console.log(id, status);

            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('admin.appointment.status') }}",
            //         data: {
            //             // '_token': token,
            //             id: id,
            //             status: status
            //         },
            //         success: function (res) {
            //             scheduleTable.ajax.reload();

            //             if (res.status == 1) {
            //                 swal.fire(
            //                     {
            //                         title: 'Status Changed to Active',
            //                         icon: 'success'
            //                     })
            //             } else {
            //                 swal.fire(
            //                     {
            //                         title: 'Status Changed to Inactive',
            //                         icon: 'success'
            //                     })
            //             }
            //         },
            //         error: function (err) {
            //             console.log(err);
            //         }

            //     })
            // })

            //Appointment Delete
            $(document).on('click', '#deleteAppointmentBtn', function () {

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
                                url:  "{{ url('admin/appointment') }}/" + id,
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
                                    
                                    scheduleTable.ajax.reload();

                                    
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
