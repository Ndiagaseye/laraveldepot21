

    <!-- Ajouter les liens vers les fichiers CSS requis -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navebar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <h1>Mes Tontines</h1>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <p>Vous ne participez à aucune tontine.</p>
                     @if($tontines->isEmpty())

                    @else
                       <table class="table">
                            <thead>
                                <tr>
                                    <th>Libellé</th>
                                    <th>Fréquence</th>
                                    <th>Montant de base</th>
                                    <th>Cotiser</th>
                                    <th>Dernier tiré</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tontines as $tontine)
                                <tr>
                                    <td>{{ $tontine->libelle }}</td>
                                    <td>{{ $tontine->frequence }}</td>
                                    <td>{{ $tontine->montantBase }} F CFA</td>
                                    <td>
                                        <form action="{{ route('tontines.cotiser', $tontine) }}" method="POST">
                                            @csrf
                                            <input type="number" name="montant" placeholder="Montant" required>
                                            <select name="moyen_paiement" required>
                                                <option value="ESPECES">Espèces</option>
                                                <option value="WAVE">Wave</option>
                                                <option value="OM">Orange Money</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Cotiser</button>
                                        </form>
                                    </td>
                                    <td>
                                        @php
                                            $dernierTire = $tontine->tirages()->latest()->first();
                                        @endphp
                                        @if($dernierTire)
                                            <span class="badge bg-success">{{ $dernierTire->participant->prenom }} {{ $dernierTire->participant->nom }}</span>
                                        @else
                                            <span class="badge bg-secondary">Aucun tirage</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
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

