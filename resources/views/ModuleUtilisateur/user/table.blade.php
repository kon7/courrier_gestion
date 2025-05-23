<div class="table-responsive  table-responsive-sm">
    <table class="table table-hover table-bordered table-striped table-responsive-sm" id="users-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->date_naissance }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td width='85'>
                    <button type="button" class="btn btn-info btn-xxs" title="Détails"
                            onclick="lunchShowModal({!! $user->id !!})">
                        <i class="mdi mdi-eye"></i>
                    </button>
                    
                        <button type="button" class="btn btn-warning btn-xxs" title="Modifier"
                                onclick="lunchEditModal({!! $user->id !!})">
                            <i class="mdi mdi-pencil"></i>
                        </button>
                  
                        <button type="button" class="btn btn-danger btn-xxs" title="Supprimer"
                                onclick="lunchDeletionModal({{ $user->id }},'{!! addslashes($user->description) !!}')">
                            <i class="btn-icon mdi mdi-delete-forever"></i>
                        </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
