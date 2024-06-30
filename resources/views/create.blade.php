<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel File Upload</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="overflow-hidden">
    <!-- DEtails -->
    <div class="d-flex" style="position: absolute; left: 2rem; top: 2rem;">
        <h1>Ayoub Mazouz</h1>
    </div>

    <!-- Flash Message -->
    <div class="container" style="position: absolute; left: 50%; top: 2rem; transform: translateX(50%);">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <!-- Form -->
    <div class="d-flex align-items-center justify-content-center vh-100">
        <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data" class="container">
            @csrf
            <!-- First Name & Last Name -->
            <div class="mb-3 row">
                <div class="col form-group">
                    <label for="first_name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Nom" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="last_name" class="form-label">Prénom</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Prénom" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Birthdate -->
            <div class="mb-3 row">
                <div class="col form-group">
                    <label for="birth_date" class="form-label">Date naissance</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                    @error('birth_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Sex -->
                <div class="col form-group">
                    <label for="sex" class="form-label">Sexe</label>
                    <select id="sex" class="form-select @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}" required>
                        <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Autre...</option>
                        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Homme</option>
                        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Femme</option>
                    </select>
                    @error('sex')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Country & City -->
            <div class="row mb-3">
                <div class="form-group col">
                    <label for="country">Pay</label>
                    <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                        <option value="">Select a country</option>
                        <option value="Morocco" {{ old('country') == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                        <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
                        <option value="Italy" {{ old('country') == 'Italy' ? 'selected' : '' }}>Italy</option>
                        <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                        <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                        <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="Germany" {{ old('country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                        <option value="Spain" {{ old('country') == 'Spain' ? 'selected' : '' }}>Spain</option>
                    </select>
                    @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="city">Ville</label>
                    <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" required>
                        <option value="">Select a city</option>
                        <!-- Cities for Morocco -->
                        <option value="Rabat" data-country="Morocco" {{ old('city') == 'Rabat' ? 'selected' : '' }}>Rabat</option>
                        <option value="Casablanca" data-country="Morocco" {{ old('city') == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                        <option value="Tangier" data-country="Morocco" {{ old('city') == 'Tangier' ? 'selected' : '' }}>Tangier</option>

                </div>
                <!-- Cities for France -->
                <option value="Paris" data-country="France" {{ old('city') == 'Paris' ? 'selected' : '' }}>Paris</option>
                <option value="Toulouse" data-country="France" {{ old('city') == 'Toulouse' ? 'selected' : '' }}>Toulouse</option>
                <option value="Nantes" data-country="France" {{ old('city') == 'Nantes' ? 'selected' : '' }}>Nantes</option>

                <!-- Cities for Italy -->
                <option value="Rome" data-country="Italy" {{ old('city') == 'Rome' ? 'selected' : '' }}>Rome</option>
                <option value="Venice" data-country="Italy" {{ old('city') == 'Venice' ? 'selected' : '' }}>Venice</option>
                <option value="Milan" data-country="Italy" {{ old('city') == 'Milan' ? 'selected' : '' }}>Milan</option>

                <!-- Cities for United States -->
                <option value="New York" data-country="United States" {{ old('city') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="Los Angeles" data-country="United States" {{ old('city') == 'Los Angeles' ? 'selected' : '' }}>Los Angeles</option>
                <option value="Chicago" data-country="United States" {{ old('city') == 'Chicago' ? 'selected' : '' }}>Chicago</option>

                <!-- Cities for Canada -->
                <option value="Toronto" data-country="Canada" {{ old('city') == 'Toronto' ? 'selected' : '' }}>Toronto</option>
                <option value="Vancouver" data-country="Canada" {{ old('city') == 'Vancouver' ? 'selected' : '' }}>Vancouver</option>
                <option value="Montreal" data-country="Canada" {{ old('city') == 'Montreal' ? 'selected' : '' }}>Montreal</option>

                <!-- Cities for United Kingdom -->
                <option value="London" data-country="United Kingdom" {{ old('city') == 'London' ? 'selected' : '' }}>London</option>
                <option value="Manchester" data-country="United Kingdom" {{ old('city') == 'Manchester' ? 'selected' : '' }}>Manchester</option>
                <option value="Birmingham" data-country="United Kingdom" {{ old('city') == 'Birmingham' ? 'selected' : '' }}>Birmingham</option>

                <!-- Cities for Germany -->
                <option value="Berlin" data-country="Germany" {{ old('city') == 'Berlin' ? 'selected' : '' }}>Berlin</option>
                <option value="Munich" data-country="Germany" {{ old('city') == 'Munich' ? 'selected' : '' }}>Munich</option>
                <option value="Hamburg" data-country="Germany" {{ old('city') == 'Hamburg' ? 'selected' : '' }}>Hamburg</option>

                <!-- Cities for Spain -->
            </div>
            <option value="Madrid" data-country="Spain" {{ old('city') == 'Madrid' ? 'selected' : '' }}>Madrid</option>
            <option value="Barcelona" data-country="Spain" {{ old('city') == 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
            <option value="Valencia" data-country="Spain" {{ old('city') == 'Valencia' ? 'selected' : '' }}>Valencia</option>

            </select>
            @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    </div>
    <!-- Email -->
    <div class="mb-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <!-- Password -->
    <div class="mb-3 row">
        <div class="col form-group">
            <label for="password" class="form-label">mot de passe</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="mot de passe" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col form-group">
            <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <!-- CV -->
        <div class="form-group col mb-3">
            <label for="cv">Attach CV</label><br>
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" class="form-control-file @error('cv') is-invalid @enderror" required>
            @error('cv')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- Photo -->
        <div class="form-group col mb-3">
            <label for="photo">Attach Photo</label><br>
            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo" accept=".jpg,.jpeg,.png" required>
            @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var selectedCountry = $(this).val();
                $('#city option').each(function() {
                    var city = $(this);
                    if (city.data('country') === selectedCountry || city.val() === '') {
                        city.show();
                    } else {
                        city.hide();
                    }
                });
            }).trigger('change');
        });
    </script>
</body>

</html>