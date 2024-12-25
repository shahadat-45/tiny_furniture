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
            <h5>Project Table</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Team Member</button>
        </div>

        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="projectTables">
              <thead>
                <tr>
                  <th>#SL.</th>
                  <th>Image</th>
                  <th>Title</th>
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


    {{-- Create Project --}}
    <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Add New Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="createForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" id="name" name="name" class="form-control" placeholder="name....." required>
                        </div>
                        <div class="col mb-3">
                           <label for="designation" class="form-label">Designation</label>
                           <input type="text" id="designation" name="designation" class="form-control" placeholder="designation....." required>
                        </div>                        
                    </div>
                    
                    <div class="row">
                        <div class="col mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" id="link" class="form-control" placeholder="link.....">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                    </div>

                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option selected="" disabled value="">Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                        </select>
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
                <form id="updateForm" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="text" id="up_id" name="id" hidden>

                    <div class="row">
                        <div class="col mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" id="nameEdit" name="name" class="form-control" placeholder="name....." required>
                        </div>
                        <div class="col mb-3">
                           <label for="designation" class="form-label">Designation</label>
                           <input type="text" id="designationEdit" name="designation" class="form-control" placeholder="designation....." required>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" id="linkEdit" class="form-control" placeholder="link.....">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="descriptionEdit" cols="30" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                            <div id="image_preview" class="mt-2"></div>
                        </div>
                        
                    </div>

                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="up_status" name="status">
                            <option selected="" disabled value="">Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
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
            ajax: "{{ route('admin.get-project') }}",
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
                url: "{{ route('admin.project.status') }}",
                data: {
                    // '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    projectTables.ajax.reload();

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


        // Create Project
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.project.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === true) {
                        $('#create_Modal').modal('hide');
                        $('#createForm')[0].reset();
                        $('#description').val('');
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
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                url: "{{ url('admin/project') }}/" + id + "/edit",
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {
                    let data = res.success;
                    // console.log(data)

                    $('#up_id').val(data.id);
                    $('#nameEdit').val(data.title);
                    $('#descriptionEdit').val(data.description);
                    $('#designationEdit').val(data.designation);
                    $('#linkEdit').val(data.facebook);
                    $('#image_preview').html('');
                    $('#image_preview').append(`
                        <img src={{ asset("`+ data.image +`") }} alt="" style="width: 75px;">
                    `);
                    $('#up_status').val(data.status);
                    

                    // Destroy any existing CKEditor instance before creating a new one
                    if (window.editor) {
                        window.editor.destroy()
                            .then(() => {
                                ClassicEditor.create(document.querySelector('#descriptionEdit'))
                                    .then(editor => {
                                        window.editor = editor;
                                        editor.setData(data.description);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            });
                    } else {
                        ClassicEditor.create(document.querySelector('#descriptionEdit'))
                            .then(editor => {
                                window.editor = editor;
                                editor.setData(data.description);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }

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
                url: "{{ url('admin/project') }}/" + id,
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

                        url: "{{ url('admin/project') }}/" + id,
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

    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(newEditor => {
                jReq = newEditor;
            })
            .catch(error => {
                console.error(error);
        });
    </script>

@endpush
