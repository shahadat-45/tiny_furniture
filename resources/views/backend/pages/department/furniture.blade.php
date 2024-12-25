@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Gallery Section
@endpush

@push('add-css')
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Furniture Table</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Furniture</button>
        </div>

        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="projectTables">
              <thead>
                <tr>
                  <th>#SL.</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
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


    {{-- Create Project --}}
    <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Add New Furniture</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="createForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col mb-3">
                           <label for="title" class="form-label">Title</label>
                           <input type="text" id="title" name="title" class="form-control" placeholder="title....." required>
                        </div>                        
                        <div class="col mb-3">
                           <label for="link" class="form-label">Link</label>
                           <input type="text" id="link" name="link" class="form-control" placeholder="link....." required>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col mb-3">
                           <label for="description" class="form-label">Description</label>
                           <textarea id="description" name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="image" class="form-label">Gallery Image</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>


    {{-- Update Category --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Update Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="updateForm" enctype="multipart/form-data" method="POST">
                    @csrf

                    <input type="text" id="up_id" name="id" hidden>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="up_title" name="title" class="form-control" placeholder="title....." required>
                        </div>
                        <div class="col mb-3">
                            <label for="linkEdit" class="form-label">Link</label>
                            <input type="text" id="linkEdit" name="link" class="form-control" placeholder="link....." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="descriptionEdit" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="descriptionEdit" rows="5"></textarea>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="image" class="form-label">Gallery Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                            <div id="image_preview" class="mt-2"></div>
                        </div>                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
        let projectTables = $('#projectTables').DataTable({
            order: [
                [0, 'asc']
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.get-furniture') }}", 
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
                    data: 'title'
                },
                {
                    data: 'description'
                },
                {
                    data: 'action'
                }
            ]
        });

        // Create Project
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.furniture.store') }}",
                data: formData,
                processData: false, 
                contentType: false,
                success: function (res) {
                    if (res.status === true) {
                        $('#create_Modal').modal('hide');
                        $('#createForm')[0].reset();
                        projectTables.ajax.reload();

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


        // Edit Project 
        $(document).on("click", '#editButton', function (e) {
            let id = $(this).attr('data-id');
            // alert(id);

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/furniture/edit') }}/" + id,
                processData: false,
                contentType: false,
                success: function (res) {
                    let data = res.success;
                    // console.log(data)

                    $('#up_id').val(data.id);
                    $('#up_title').val(data.title);
                    $('#image_preview').html('');
                    $('#image_preview').append(`
                        <img src={{ asset("`+ data.image +`") }} alt="" style="width: 75px;">
                    `);
                    $('#descriptionEdit').val(data.description);
                    $('#linkEdit').val(data.link);                

                },
                error: function (error) {
                    console.log('error');
                }

            });
        })


        // Update Project
        $("#updateForm").submit(function (e) {
            e.preventDefault();

            let id = $('#up_id').val();
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/furniture/update') }}/" + id,
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {

                    swal.fire({
                        title: "Success",
                        text: "Project Edited",
                        icon: "success"
                    })

                    $('#editModal').modal('hide');
                    $('#updateForm')[0].reset();
                    projectTables.ajax.reload();
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


        // Delete Project 
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

                        url: "{{ url('admin/furniture/delete') }}/" + id,
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

                            projectTables.ajax.reload();
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
