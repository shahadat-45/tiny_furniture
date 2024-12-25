@extends('backend.layout.master')

@push('meta-title')
    Dashboard | Choose Us
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Interior Design </h5>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateHeadding">Update Header</button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createService">Create Design Tips</button>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="doctorTables">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Text</th>
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
    <div class="modal fade" id="updateHeadding" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Update Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="headdingForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col mb-3">
                            <label for="title" class="form-label">Header</label>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Title....." value="{{ $headding->title ?? ''  }}">
                        </div>
                        <div class="col mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Description....." cols="20"
                                rows="5">{{ $headding->description ?? '' }}</textarea>
                        </div>
                        
                        <div class="col mb-3">
                            <label for="description" class="form-label">Image</label>
                            <input type="file" id="image" name="images[]" class="form-control mb-2" multiple>
                            @php
                                $images = json_decode(App\Models\Headding::find(3)->image, true);
                            @endphp
                            <div id="imageShow">
                                @foreach ($images as $i => $image)
                                    <img src="{{ asset($image) }}" style="width: 75px;">
                                @endforeach
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
                    <h5 class="modal-title" id="exampleModalLabel3">Update Interior Design Contant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="updateForm">
                        @csrf
                        @method('PUT')

                        <input type="text" id="up_id" name="id" hidden>

                        <div class="col mb-3">
                            <label for="title" class="form-label">Text</label>
                            <input type="text" id="up_title" name="text" class="form-control"
                                placeholder="Title.....">
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

    {{-- Create Service--}}
    <div class="modal fade" id="createService" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add Interior Design Tips</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="createForm">
                        @csrf
                        @method('POST')

                        <div class="col mb-3">
                            <label for="title" class="form-label">Text</label>
                            <input type="text" id="createTitle" name="text" class="form-control"
                                placeholder="Title....">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Create</button>
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
        $(document).ready(function() {

            // show all data
            let doctorTables = $('#doctorTables').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get-design') }}",
                // pageLength: 30,

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'text'
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
                    url: "{{ route('admin.department.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        if (res) {
                            $('#createService').modal('hide');
                            $('#createForm')[0].reset();
                            doctorTables.ajax.reload();

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
            $(document).on("click", '#editButton', function(e) {
                let id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    type: 'GET',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    url: "{{ url('admin/department') }}/" + id + "/edit",
                    processData: false, 
                    contentType: false, 
                    success: function(res) {
                        let data = res.success;
                        $('#up_id').val(data.id);
                        $('#up_title').val(data.text);                     
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            })

            // Update Project
            $("#updateForm").submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/department') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {

                        swal.fire({
                            title: "Success",
                            text: "Doctor Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#updateForm')[0].reset();
                        doctorTables.ajax.reload();
                    },
                    error: function(err) {
                        console.error('Error:', err);
                        swal.fire({
                            title: "Failed",
                            text: "Something Went Wrong !",
                            icon: "error"
                        })
                    }
                });

            });

            $("#headdingForm").submit(function(e) {
                e.preventDefault();

                let id = 3;
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/interior/headding') }}/" + id,
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting contentType
                    success: function(res) {

                        swal.fire({
                            title: "Success",
                            text: "Doctor Edited",
                            icon: "success"
                        })

                        $('#updateHeadding').modal('hide');
                        doctorTables.ajax.reload();
                    },
                    error: function(err) {
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
            $(document).on("click", "#deleteBtn", function() {
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
                                type: 'GET',

                                url: "{{ url('admin/design/delete') }}/" + id,
                                data: {
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    }
                                },
                                success: function(res) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: `${res.message}`,
                                        icon: "success"
                                    });

                                    doctorTables.ajax.reload();
                                },
                                error: function(err) {
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
