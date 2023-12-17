@extends('.controlPanel.layouts.layout')
@section('content')
<div class="container mt-5">
    <h1>Admin Data</h1>
    <form id="adminForm">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" readonly>
        </div>
        <div class="mb-3">
            <label for="adminId" class="form-label">Admin ID</label>
            <input type="text" class="form-control" id="adminId" name="adminId" placeholder="Enter Admin ID" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Enter Date of Birth">
        </div>
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name">
        </div>
        <div class="mb-3">
            <label for="secondName" class="form-label">Second Name</label>
            <input type="text" class="form-control" id="secondName" name="secondName" placeholder="Enter Second Name">
        </div>
        <button type="button" class="btn btn-success" id="updateButton">Update Admin Data</button>
    </form>
    <div id="adminData" class="mt-4"></div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    // Function to fetch admin data by username


    $(document).ready(function() {
        var myElement = document.getElementById('sticky-wrapper');
        myElement.classList.add('is-sticky');
    });

    $(document).ready(fetchAdminData(userData.usernameData));
    function fetchAdminData(username) {
        $.ajax({
            url: 'https://facemosque.com/api/api.php?client=app&cmd=get_admin_data&username=' + username,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Fill the input fields with admin data
                $('#username').val(data.username);
                $('#adminId').val(data.admin_id);
                $('#email').val(data.email);
                $('#dateOfBirth').val(data.date_of_birth);
                $('#firstName').val(data.first_name);
                $('#secondName').val(data.second_name);
            },
            error: function () {
                // Display an error message if admin not found
                $('#adminData').html('<p class="text-danger">Admin not found.</p>');
            }
        });
    }

    // Event listener for the fetch button


    // Event listener for the update button
    $('#updateButton').click(function () {
        var username = $('#username').val();
        var adminId = $('#adminId').val();
        var email = $('#email').val();
        var dateOfBirth = $('#dateOfBirth').val();
        var firstName = $('#firstName').val();
        var secondName = $('#secondName').val();

        // Perform an AJAX request to update admin data here
        // You should send the updated data to the server using an appropriate API endpoint
        // Handle success and error cases accordingly
        // Example:
         $.ajax({
             url: 'https://facemosque.com/api/api.php?client=app&cmd=update_admin_data',
             method: 'POST',
             data: {
                 username: username,
                 adminId: adminId,
                 email: email,
                 dateOfBirth: dateOfBirth,
                 firstName: firstName,
                 secondName: secondName
             },
             dataType: 'json',
             success: function (response) {
                 // Handle success response here
                 // You can show a success message to the user
                 $('#adminData').html('<p class="text-success">Admin information is updated.</p>');

             },
             error: function () {
                 // Handle error response here
                 // You can show an error message to the user
                 $('#adminData').html('<p class="text-danger">Admin information can not be Updated.</p>');

             }
         });
    });

    // You can retrieve the username from cookies and fill the input field here
    // Example (assuming you are using a library to work with cookies):
    // var usernameFromCookies = Cookies.get('username');
    // $('#username').val(usernameFromCookies);
</script>
@endsection
