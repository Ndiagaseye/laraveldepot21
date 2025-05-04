
@section('content')
<div class="container">
    <h2>Créer une nouvelle tontine</h2>

    <form action="{{ route('gerant.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Libellé</label>
            <input type="text" name="libelle" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Fréquence</label>
            <select name="frequence" id="frequence" class="form-control" required>
                <option value="HEBDOMADAIRE">Hebdomadaire</option>
                <option value="MENSUELLE">Mensuelle</option>
                <option value="ANNUELLE">Annuelle</option>
              </select>

        </div>
        <div class="mb-3">
            <label>Date de début</label>
            <input type="date" name="dateDeb" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date de fin</label>
            <input type="date" name="dateFin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Montant Total</label>
            <input type="number" name="montantTotal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre de Participants</label>
            <input type="number" name="nbr_participant" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Montant de Base</label>
            <input type="number" name="montantBase" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
