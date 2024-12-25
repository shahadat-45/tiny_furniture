@extends('backend.layout.master')

@push('meta-title')
    Dashboard | Testimonial Section
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Testimonial Table</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Testimonial</button>
            </div>


            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="scheduleTable">
                        <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Image</th>
                            <th>Quate</th>
                            <th>Author</th>
                            <th>Designation</th>
                            <th>Status</th>
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


    {{-- Create Service --}}
    <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Create New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="createForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3">
                                <label for="author" class="form-label">author</label>
                                <input type="text" name="author" class="form-control" placeholder="author name">
                            </div> 
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="author designation">
                            </div>                            

                            <div class="mb-3">
                                <label for="image" class="form-label">Author Image</label>
                                <input type="file"  name="image" class="form-control" placeholder="author image">
                            </div>

                            <div class="mb-3">
                                <label for="quate" class="form-label">Quate</label>
                                <textarea name="quate" id="quate"  class="form-control" cols="30" rows="5"></textarea>
                            </div>                            

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Update Category --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Update Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="updateForm" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <input type="text" id="up_id" name="id" hidden>

                        <div class="row">

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text"  name="author" id="authorEdit" class="form-control" placeholder="Author Name">
                            </div>
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text"  name="designation" id="designationEdit" class="form-control" placeholder="Author Designation">
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label">Author Image</label>
                                <input type="file" id="imageEdit"  name="image" class="form-control" placeholder="Author Image">
                                <div class="mt-2" id="scheduleIcon"></div>
                            </div>

                            <div class="mb-3">
                                <label for="quate" class="form-label">Quate</label>
                                <textarea name="quate" id="quateEdit"  class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('custom-script')

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>
    

    <script>

        $(document).ready(function(){
            let jReq;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#scheduleDesc'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            let data;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#scheduleDesc2'))
                .then(newEditor => {
                    data = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });
            
            

            // show all data
            let scheduleTable = $('#scheduleTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get-schedule') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'image'
                    }, 
                    {
                        data: 'quate',
                        width: '300px'
                    }, 
                    {
                        data: 'author'
                    }, 
                    {
                        data: 'designation'
                    },

                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    }
                ]
            });


            //  Status updates
            $(document).on('click', '#status', function () {
                var id = $(this).data('id');
                var status = $(this).data('status');

                // console.log(id, status);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.schedule.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        scheduleTable.ajax.reload();

                        if (res.status == 1) {
                            swal.fire(
                                {
                                    title: 'Status Changed to Active',
                                    icon: 'success'
                                })
                        } else {
                            swal.fire(
                                {
                                    title: 'Status Changed to Inactive',
                                    icon: 'success'
                                })
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }

                })
            })

            // Create Service
            $('#createForm').submit(function (e) {
                e.preventDefault();
                // const scheduleDesc = jReq.getData();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.schedule.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        // console.log(res);
                        if (res.message == 'success') {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            scheduleTable.ajax.reload();

                            swal.fire({
                                title: "Success",
                                text: `${res.message}`,
                                icon: "success"
                            })
                        }
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });
            })

            // Edit Banner
            $(document).on("click", '#editButton', function (e) {
                let id = $(this).attr('data-id');


                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/schedule') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        // let data = res.success;
                        // console.log(data)


                        // $('#editModal').modal('show');
                        $('#up_id').val(res.data.id);
                        $('#authorEdit').val(res.data.author);
                        $('#designationEdit').val(res.data.designation);
                        $('#quateEdit').val(res.data.quate);
                        // data.setData(res.data.quate);
                       $('#scheduleIcon').html('');
                        $('#scheduleIcon').append(`
                            <img src={{ asset("`+ res.data.image +`") }} alt="" style="width: 60px;">
                        `);
                        
                       


                    },
                    error: function (error) {
                        console.log('error');
                    }

                });
            })


            // Update Banner
            $("#updateForm").submit(function (e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);
                

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/schedule') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Schedule Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#updateForm')[0].reset();
                        scheduleTable.ajax.reload();
                    },
                    error: function (err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });


            // Delete Banner
            $(document).on("click", "#deleteBtn", function () {
                let id = $(this).data('id')

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
                                type: 'DELETE',

                                url: "{{ url('admin/schedule') }}/" + id,
                                data: {
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
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
                                    console.log('error')
                                }
                            })

                        } else {
                            swal.fire('Your Data is Safe');
                        }

                    })
            })

        });

    </script>

@endpush
