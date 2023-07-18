<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reset password</title>
    @include('root.includes.css')
</head>
<body>
    <!-- Modal -->
    <div id="myModal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">enter new password</h5>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('reset.pass') }}" method="POST" id="changePass">
                    @csrf
                    <input type="text" value="{{ $code }}"    hidden name="code">
                    <div class="mb-3">
                        <label for="pass" class="col-form-label">new password:</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="con_pass" class="col-form-label">confirm new password:</label>
                        <input type="password" class="form-control" id="con_pass" name="con_pass">
                    </div>
                </form>
                <form action="{{ route('signin') }}" method="get" id="backToLogin"></form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="submitForm('backToLogin')">cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitForm('changePass')">send</button>
            </div>
            </div>
        </div>
    </div>

    @include('root.includes.js')
    <script>
        window.onload = function () {
            $('#myModal').modal('show');
        }

    </script>
</body>
</html>