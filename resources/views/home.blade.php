<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Candidats</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-items-center align-items-center vh-100">
  <!-- DEtails -->
  <div class="d-flex" style="position: absolute; left: 2rem; top: 2rem;">
    <h1>Ayoub Mazouz</h1>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h1>Liste des Candidats</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{ route('candidate.create') }}" class="btn btn-primary">Ajouter un Candidat</a>
      </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom de Famille</th>
          <th>Prénom</th>
          <th>Date de Naissance</th>
          <th>Pays</th>
          <th>Ville</th>
          <th>Sexe</th>
          <th>Email</th>
          <th>CV</th>
          <th>Photo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($candidates as $candidate)
        <tr>
          <td>{{ $candidate->id }}</td>
          <td>{{ $candidate->last_name }}</td>
          <td>{{ $candidate->first_name }}</td>
          <td>{{ $candidate->birth_date }}</td>
          <td>{{ $candidate->country }}</td>
          <td>{{ $candidate->city }}</td>
          <td>{{ $candidate->gender }}</td>
          <td>{{ $candidate->email }}</td>
          <td>
            @if($candidate->cv_path)
            <a href="{{ asset('storage/' . $candidate->cv_path) }}" target="_blank">Voir CV</a>
            @endif
          </td>
          <td>
            @if($candidate->photo_path)
            <img src="{{ asset('storage/' . $candidate->photo_path) }}" alt="Photo" width="50">
            @endif
          </td>
          <td>
            <!-- Ajoutez vos boutons d'action ici -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>