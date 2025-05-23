<div class="table-responsive  table-responsive-sm">
    <table class="table table-hover table-bordered table-striped table-responsive-sm" id="clients-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Profession</th>
            <th>Domaine de formation</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td></td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->prenom }}</td>
                <td>{{ $client->date_naissance }}</td>
                <td>{{ $client->profession }}</td>
                <td>{{ $client->domaine->name }}</td>
                <td width='85'>
                    <button type="button" class="btn btn-info btn-xxs" title="Détails"
                            onclick="lunchShowModal({!! $client->id !!})">
                        <i class="mdi mdi-eye"></i>
                    </button>
                    
                        <button type="button" class="btn btn-warning btn-xxs" title="Modifier"
                                onclick="lunchEditModal({!! $client->id !!})">
                            <i class="mdi mdi-pencil"></i>
                        </button>
                  
                        <button type="button" class="btn btn-danger btn-xxs" title="Supprimer"
                                onclick="lunchDeletionModal({{ $client->id }},'{!! addslashes($client->description) !!}')">
                            <i class="btn-icon mdi mdi-delete-forever"></i>
                        </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
