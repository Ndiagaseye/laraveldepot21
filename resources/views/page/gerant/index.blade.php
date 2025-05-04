 <!-- Ajouter les liens vers les fichiers CSS requis -->
 <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


 <div id="wrapper">

     <!-- Sidebar -->

     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             @include('layouts.navebar')
             <!-- End of Topbar -->

             <!-- Begin Page Content -->
             <div class="container-fluid">

                <h2>Gestion des Tontines</h2>
    <a href="{{ route('gerant.create') }}" class="btn btn-primary">Créer une nouvelle tontine</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>DateDebut</th>
                <th>DateFin</th>
                <th>Nombre participants</th>
                <th>Fréquence</th>
                <th>Montant Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tontines as $tontine)
                <tr>
                    <td>{{ $tontine->libelle }}</td>
                    <td>{{ $tontine->dateDeb }}</td>
                    <td>{{ $tontine->dateFin }}</td>
                    <td>{{ $tontine->nbr_participant }}</td>
                    <td>{{ $tontine->frequence }}</td>
                    <td>{{ $tontine->montantTotal }} FCFA</td>
                    <td>
                        <form action="{{ route('gerant.delete', $tontine->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <form action="{{ route('gerant.creerTirage', $tontine->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info">Tirage</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('gerant.historique') }}" class="btn btn-info mt-3">Voir l'historique</a>
</div>
<!-- Page Heading -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>

<!-- Footer -->
@include('layouts.footer')
<!-- End of Footer -->


<!-- Ajouter les scripts JS nécessaires -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

