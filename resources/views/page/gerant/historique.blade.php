
@section('content')
<div class="container">
    <h1>Historique des Tontines Supprimées</h1>

    @if($tontinesSupprimees->isEmpty())
        <div class="alert alert-info">
            Aucune tontine supprimée n'a été trouvée.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Libellé</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Montant Total</th>
                    <th>Description</th>
                    <th>Supprimée le</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tontinesSupprimees as $tontine)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tontine->libelle }}</td>
                        <td>{{ \Carbon\Carbon::parse($tontine->dateDeb)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($tontine->dateFin)->format('d/m/Y') }}</td>
                        <td>{{ $tontine->montantTotal }} FCFA</td>
                        <td>{{ $tontine->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($tontine->deleted_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
