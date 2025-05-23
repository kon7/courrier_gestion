@extends('adminlte::page')

@section('title', 'Gestion des Utilisateurs')

@section('content_header')
    <h1>Gestion des Utilisateurs</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des utilisateurs</h3>
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
                Ajouter un utilisateur
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Les données seront chargées via Ajax --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal d'ajout d'utilisateur --}}
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addUserForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Rôle</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="1">Administrateur</option>
                                <option value="2">Utilisateur</option>
                                {{-- Ajoutez d'autres rôles si nécessaire --}}
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Charger la liste des utilisateurs via Ajax
            function loadUsers() {
                $.get("{{ route('admin.users.list') }}", function(data) {
                    let rows = '';
                    data.forEach(user => {
                        rows += `
                            <tr>
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.role_id}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Modifier</button>
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#usersTable tbody').html(rows);
                });
            }

            loadUsers();

            // Ajouter un utilisateur
            $('#addUserForm').submit(function(e) {
                e.preventDefault();
                $.post("{{ route('admin.users.add') }}", $(this).serialize(), function(response) {
                    $('#addUserModal').modal('hide');
                    loadUsers();
                }).fail(function(error) {
                    alert('Erreur lors de l\'ajout.');
                });
            });
        });
    </script>
@stop
