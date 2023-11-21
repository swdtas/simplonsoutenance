
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecrutBurkina</title>
    <!-- Add Bootstrap CSS link here -->

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Veuillez administrer un administrateur</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register_admin') }}" class="mt-4">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="validationCustom01" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="name" id="validationCustom01" required>
                            <div class="valid-feedback">
                                veuillez entrer le nom!
                            </div>
                        </div>

                        <!-- Surname -->
                        <div class="form-group">
                            <label for="validationCustom02" class="form-label">Prénom(s)</label>
                            <input type="text" class="form-control" name="surname" id="validationCustom02" required>
                            <div class="valid-feedback">
                                veuillez entrer le Prénom!
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required autocomplete="username">
                            @if($errors->has('email'))
                                <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="form-group mt-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password">
                            @if($errors->has('password'))
                                <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mt-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                            @if($errors->has('password_confirmation'))
                                <div class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" name="connecter" class="btn btn-success"> Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
