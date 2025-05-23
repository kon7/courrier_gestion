<div class="table-responsive  table-responsive-sm">
    <table class="table table-hover table-bordered table-striped table-responsive-sm" id="roles-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Libéllé</th>
            <th>Descrption</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td></td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td width='85'>
                    <button type="button" class="btn btn-info btn-xxs" title="Détails"
                            onclick="lunchShowModal({!! $role->id !!})">
                        <i class="mdi mdi-eye"></i>
                    </button>
                    
                        <button type="button" class="btn btn-warning btn-xxs" title="Modifier"
                                onclick="lunchEditModal({!! $role->id !!})">
                            <i class="mdi mdi-pencil"></i>
                        </button>
                  
                        <button type="button" class="btn btn-danger btn-xxs" title="Supprimer"
                                onclick="lunchDeletionModal({{ $role->id }},'{!! addslashes($role->description) !!}')">
                            <i class="btn-icon mdi mdi-delete-forever"></i>
                        </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
