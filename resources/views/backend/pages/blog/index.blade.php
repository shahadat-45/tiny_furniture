@extends('backend.layout.master')

@push('meta-title')
    Dashboard | Blog Section
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Blog Table</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Blog</button>
            </div>


            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="blogTable">
                        <thead>
                        <tr>
                            <th>#SL.</th>
                            <th>Blog Image</th>
                            <th>Blog Title</th>
                            <th>Blog Author</th>
                            <th>Blog Date</th>
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


    {{-- Create Blog --}}
    <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Create New Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="createForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Author</label>
                                <input type="text" value="{{Auth::user()->name}}" name="blog_author" class="form-control" placeholder="Blog Author">
                            </div>
            
                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Title</label>
                                <input type="text"  name="blog_title" class="form-control" placeholder="Blog Title">
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Image</label>
                                <input type="file"  name="blog_image" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Short Description</label>
                                <textarea name="blog_short_desc" id=""  class="form-control" cols="30" rows="2"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Long Description</label>
                                <textarea name="blog_long_desc" id="blogDesc"  class="form-control" cols="30" rows="10"></textarea>
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
                                <label for="service_title" class="form-label">Blog Author</label>
                                <input type="text" value="{{Auth::user()->name}}" name="blog_author" id="blog_author" class="form-control" placeholder="Blog Author">
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Title</label>
                                <input type="text"  name="blog_title" class="form-control" id="blog_title" placeholder="Blog Title">
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Image</label>
                                <input type="file"  name="blog_image" id="blog_image" class="form-control">
                                
                                <img src="" id="blogImg" alt="" width="120" >
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Short Description</label>
                                <textarea name="blog_short_desc" id="blog_short_desc"  class="form-control" cols="30" rows="2"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="service_title" class="form-label">Blog Long Description</label>
                                <textarea name="blog_long_desc" id="blogDesc2"  class="form-control" cols="30" rows="10"></textarea>
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
                .create(document.querySelector('#blogDesc'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            let data;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#blogDesc2'))
                .then(newEditor => {
                    data = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });



            // show all data
            let blogTable = $('#blogTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get-blog') }}",
                // pageLength: 30,

                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'blogImage'
                    },
                    {
                        data: 'blog_title'
                    },
                    {
                        data: 'blog_author'
                    },
                    {
                        data: 'blog_date'
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
                    url: "{{ route('admin.blog.status') }}",
                    data: {
                        // '_token': token,
                        id: id,
                        status: status
                    },
                    success: function (res) {
                        blogTable.ajax.reload();

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

            // Create Blog
            $('#createForm').submit(function (e) {
                e.preventDefault();
                const blog_long_desc = jReq.getData();
                let formData = new FormData(this);
                formData.append('blog_long_desc', blog_long_desc);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.blog.store') }}",
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        // console.log(res);
                        if (res.message == 'success') {
                            $('#create_Modal').modal('hide');
                            $('#createForm')[0].reset();
                            blogTable.ajax.reload();

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
                    url: "{{ url('admin/blog') }}/" + id + "/edit",
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {
                        // let data = res.success;
                        // console.log(data)


                        // $('#editModal').modal('show');
                        $('#up_id').val(res.data.id);
                        
                        $('#blog_title').val(res.data.blog_title);
                        $('#blog_short_desc').val(res.data.blog_short_desc);
                        $('#blog_author').val(res.data.blog_author);
                       
                       
                        data.setData(res.data.blog_long_desc);
                        $('#blogImg').attr('src','{{asset('')}}' + res.data.blog_image);




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
                let blog_long_desc=data.getData();
                let formData = new FormData(this);
                formData.append('blog_long_desc', blog_long_desc);


                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/blog') }}/" + id,
                    data: formData,
                    processData: false,  // Prevent jQuery from processing the data
                    contentType: false,  // Prevent jQuery from setting contentType
                    success: function (res) {

                        swal.fire({
                            title: "Success",
                            text: "Blog Edited",
                            icon: "success"
                        })

                        $('#editModal').modal('hide');
                        $('#updateForm')[0].reset();
                        blogTable.ajax.reload();
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


            // Delete Blog
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

                                url: "{{ url('admin/blog') }}/" + id,
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

                                    blogTable.ajax.reload();
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
