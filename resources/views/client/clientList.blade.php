<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-3">
        <button type="button" class="btn btn-primary" id="modelOpen" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student form</h4>
                        <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="studentForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Subject"
                                    name="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label><br>
                                <input type="radio" name="gender" value="Male">Male
                                <input type="radio" name="gender" value="Female">Female
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label class="error_gender error_hide"></label>
                            </div>
                            <div class="form-group">
                                <label for="hobbies">Hobbies:</label><br>
                                <input type="checkbox" name="hobby[]" value="Cricket"> Cricket
                                <input type="checkbox" name="hobby[]" value="Football"> Football
                                <input type="checkbox" name="hobby[]" value="Travelling"> Travelling
                                <input type="checkbox" name="hobby[]" value="Music"> Music

                                @error('hobby')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label class="error_hobby error_hide"></label>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>



                </div>
            </div>
        </div>


        <!-- The Update Modal -->


        <!-- The Modal -->
        <div class="modal" id="myUpdateModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student update form</h4>
                        <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="studentUpdateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control name" id="name" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control email" id="email"
                                    placeholder="Enter Subject" name="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label><br>
                                <input type="radio" class="male" name="gender" value="Male">Male
                                <input type="radio" class="female" name="gender" value="Female">Female
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label class="error_gender error_hide"></label>
                            </div>
                            <div class="form-group">
                                <label for="hobbies">Hobbies:</label><br>
                                <input type="checkbox" class="cricket" name="hobby[]" value="Cricket"> Cricket
                                <input type="checkbox" class="football" name="hobby[]" value="Football"> Football
                                <input type="checkbox" class="travelling" name="hobby[]" value="Travelling">
                                Travelling
                                <input type="checkbox" class="music" name="hobby[]" value="Music"> Music

                                @error('hobby')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label class="error_hobby error_hide"></label>
                            </div>

                            <div class="mb-3">
                                <label for="img">Image:</label>
                                <div id="show_image"></div>
                                <input type="file" class="form-control image" id="image" name="image">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="id" class="id">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>



                </div>
            </div>
        </div>





        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>email</td>
                    <td>gender</td>
                    <td>hobby</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(document).on("click", "#modelOpen", function() {
            $('#myModal').modal('show');
        });



        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('clientList') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'hobby',
                        name: 'hobby'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action',

                    },

                ]
            });

            // create Student

            $("#studentForm").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('clientStore') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        table.ajax.reload();
                        $('#myModal').modal('hide');

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }));

            //Edit Student

            $(document).on("click", ".edit_btn", function() {
                var id = $(this).attr("data-id")
                $.ajax({
                    url: "{{ route('clientEdit') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#myUpdateModal").modal("show");
                        $(".name").val(data.stud.name)
                        $(".email").val(data.stud.email)
                        $(".id").val(data.stud.id)

                        var urls = window.location.origin
                        $("#show_image").html('<img src="' + urls +
                            '/storage/images/' + data.stud.image +
                            '" width="50" class="img-fluid img-thumbnail">')
                        if (data.stud.gender == "Male") {
                            $(".male").prop("checked", true)
                        } else {
                            $(".female").prop("checked", true)
                        }

                        $(".cricket").prop("checked", false);
                        $(".football").prop("checked", false);
                        $(".travelling").prop("checked", false);
                        $(".music").prop("checked", false);

                        if ($.inArray("Cricket", data.hobby) != -1) {

                            $(".cricket").prop("checked", true);
                        }
                        if ($.inArray("Football", data.hobby) != -1) {

                            $(".football").prop("checked", true);
                        }
                        if ($.inArray("Travelling", data.hobby) != -1) {

                            $(".travelling").prop("checked", true);
                        }
                        if ($.inArray("Music", data.hobby) != -1) {

                            $(".music").prop("checked", true);
                        }
                    },
                });
            });

            // update Student

            $("#studentUpdateForm").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('clientUpdate') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        table.ajax.reload();
                        $('#myUpdateModal').modal('hide');

                    },
                });
            }));


            $(document).on("click", ".delete_btn", function() {

                $.ajax({
                    url: "{{ route('clientDelete') }}",
                    type: "GET",
                    data: {
                        id: $(this).attr("data-id"),
                    },

                    success: function(data) {

                        table.ajax.reload();
                        $("#myUpdateModal").modal("hide");


                    },
                });
            });


        });
    })

    $("#closeModel").click(function() {
        $('#studentForm').trigger("reset");
    })
</script>

</html>
