<li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="link-icon" data-feather="home"></i>
        <span class="link-title">Accueil</span>
    </a>
</li>
<!-- @can('SEARCH_MENU') -->
    <li class="nav-item {{ Request::is('recherches') ? 'active' : '' }}">
        <a href="{{ route('recherches.index') }}" class="nav-link">
            <i class="link-icon" data-feather="search"></i>
            <span class="link-title">Recherche</span>
        </a>
    </li>
<!-- @endcan --> 
 <!-- client -->
 <li class="nav-item nav-category">Module Client</li>
<li class="nav-item {{ Request::is('client/domaines') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Clients</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('client/domaines') ? 'show' : '' }}"
             id="users">
            <ul class="nav sub-menu">
                
                    <li class="nav-item {{ Request::is('client/domaines') ? 'active' : '' }}">
                        <a href="{{ route('client.domaines.index') }}"
                           class="nav-link {{ Request::is('client/domaines') ? 'active' : '' }}">
                            Domaine
                        </a>
                    </li>
              
               
                    <li class="nav-item {{ Request::is('client/clients') ? 'active' : '' }}">
                        <a href="{{ route('client.clients.index') }}"
                           class="nav-link {{ Request::is('client/clients') ? 'active' : '' }}">
                            Client
                        </a>
                    </li>
            
            </ul>
        </div>
    </li>

<!-- utilisateur -->
<li class="nav-item nav-category">Module Utilisateur</li>
<li class="nav-item {{ Request::is('utilisateur/roles') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Utilisateurs</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('utilisateur/roles') ? 'show' : '' }}"
             id="users">
            <ul class="nav sub-menu">
                
                    <li class="nav-item {{ Request::is('utilisateur/roles') ? 'active' : '' }}">
                        <a href="{{ route('utilisateur.roles.index') }}"
                           class="nav-link {{ Request::is('utilisateur/roles') ? 'active' : '' }}">
                            Roles
                        </a>
                    </li>
              
               
                    <li class="nav-item {{ Request::is('utilisateur/users') ? 'active' : '' }}">
                        <a href="{{ route('utilisateur.users.index') }}"
                           class="nav-link {{ Request::is('utilisateur/users') ? 'active' : '' }}">
                            Utilisateur
                        </a>
                    </li>
            
            </ul>
        </div>
    </li>
{{--
@canany('ENTITE_SHOW')
    <li class="nav-item nav-category {{ Request::is('entites/*') ? 'active' : '' }}">
        Module Entité
    </li>
@endcanany
@can('ENTITE_SHOW','NOTE_SHOW','ADRESSE_SHOW','FICHIER_SHOW')
    <li class="nav-item {{ Request::is('entites/entites*') ? 'active' : '' }}">
        <a href="{{ route('entites.entites.index') }}" class="nav-link">
            <i class="link-icon" data-feather="target"></i>
            <span class="link-title">Entités</span>
        </a>
    </li>
@endcan
<!-- <li class="nav-item {{ Request::is('entites//graphique*') ? 'active' : '' }}">
        <a href="{{ route('entites.entites.graphique') }}" class="nav-link">
            <i class="link-icon" data-feather="bar-chart-2"></i>
            <span class="link-title">Graphes</span>
        </a>
    </li> -->
@can('NOTE_SHOW')
    <li class="nav-item {{ Request::is('entites/notes*') ? 'active' : '' }}">
        <a href="{{ route('entites.notes.index') }}" class="nav-link">
            <i class="link-icon" data-feather="file-text"></i>
            <span class="link-title">Notes</span>
        </a>
    </li>
@endcan
@can('ADRESSE_SHOW')
    <li class="nav-item {{ Request::is('entites/adresses*') ? 'active' : '' }}">
        <a href="{{ route('entites.adresses.index') }}" class="nav-link">
            <i class="link-icon" data-feather="map-pin"></i>
            <span class="link-title">Adresses</span>
        </a>
    </li>
@endcan
@can('FICHIER_SHOW')
    <li class="nav-item {{ Request::is('entites/fichiers*') ? 'active' : '' }}">
        <a href="{{ route('entites.fichiers.index') }}" class="nav-link">
            <i class="link-icon" data-feather="file"></i>
            <span class="link-title">Fichiers</span>
        </a>
    </li>
@endcan
@canany('EVENEMENT_SHOW','EVENEMENT_LOCALISATION', 'EVENEMENT_STATS')
    <li class="nav-item nav-category {{ Request::is('evenements/*') ? 'active' : '' }}">
        Module Evènement
    </li>
@endcanany
@can('EVENEMENT_SHOW')
    <li class="nav-item {{ Request::is('evenements/evenements*') ? 'active' : '' }}">
        <a href="{{ route('evenements.evenements.index') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Evènements</span>
        </a>
    </li>
@endcan
@can('EVENEMENT_SHOW')
    <li class="nav-item {{ Request::is('evenements/evenements/search*') ? 'active' : '' }}">
        <a href="{{ route('evenements.evenements.search') }}" class="nav-link">
            <i class="link-icon" data-feather="paperclip"></i>
            <span class="link-title">Liste Evènements</span>
        </a>
    </li>
@endcan
<!-- @can('EVENEMENT_SHOW')
    <li class="nav-item {{ Request::is('evenements/element_bilans*') ? 'active' : '' }}">
        <a href="{{ route('evenements.element_bilans.index') }}" class="nav-link">
            <i class="link-icon" data-feather="paperclip"></i>
            <span class="link-title">Elements de Bilan</span>
        </a>
    </li>
@endcan -->
@can('EVENEMENT_LOCALISATION')
    <li class="nav-item {{ Request::is('evenements/cartographie*') ? 'active' : '' }}">
        <a href="{{ route('cartographie.index') }}" class="nav-link">
            <i class="link-icon" data-feather="map"></i>
            <span class="link-title">Carto Evènements</span>
        </a>
    </li>
@endcan
@can('EVENEMENT_STATS')
    <li class="nav-item {{ Request::is('evenements/statistiques*') ? 'active' : '' }}">
        <a href="{{ route('evenements.statistiques.index') }}" class="nav-link">
            <i class="link-icon" data-feather="pie-chart"></i>
            <span class="link-title">Stats Evènements</span>
        </a>
    </li>
@endcan
@canany('STATUTENTITE_SHOW','TYPEENTITE_SHOW','IMPORTANCE_SHOW','RAISON_SHOW','TYPADRESSE_SHOW','TYPENOTE_SHOW','TYPESELECTEUR_SHOW','CFIELD_SHOW',
'TYPEVENT_SHOW','LOCALITE_SHOW','DEPARTEMENT_SHOW', 'PROVINCE_SHOW','REGION_SHOW')
    <li class="nav-item nav-category" {{ Request::is('parametrage/*') ? 'active' : '' }}>Module Paramétrage</li>
@endcanany
@canany('STATUTENTITE_SHOW','TYPEENTITE_SHOW','IMPORTANCE_SHOW','RAISON_SHOW','TYPADRESSE_SHOW','TYPENOTE_SHOW','TYPESELECTEUR_SHOW','CFIELD_SHOW')
    <li class="nav-item {{ Request::is('parametrage/statut_entites*','parametrage/type_entites*','parametrage/importances*',
                        'parametrage/raison_interets*','parametrage/type_adresses*','parametrage/type_notes*',
                        'parametrage/type_selecteurs*','parametrage/custom_fields*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#param_entites" role="button" aria-expanded="false"
           aria-controls="general-pages">
            <i class="link-icon" data-feather="target"><i class="link-icon" data-feather="settings"></i></i>
            <span class="link-title">Entités</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div
            class="collapse {{ Request::is('parametrage/statut_entites*','parametrage/type_entites*','parametrage/importances*',
                            'parametrage/raison_interets*','parametrage/type_adresses*','parametrage/type_notes*',
                            'parametrage/type_selecteurs*','parametrage/custom_fields*') ? 'show' : '' }}"
            id="param_entites">
            <ul class="nav sub-menu">
                @can('STATUTENTITE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/statut_entites*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.statut_entites.index') }}"
                           class="nav-link {{ Request::is('parametrage/statut_entites*') ? 'active' : '' }}">
                            Statuts entité
                        </a>
                    </li>
                @endcan
                @can('TYPEENTITE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_entites*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_entites.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_entites*') ? 'active' : '' }}">
                            Types entité
                        </a>
                    </li>
                @endcan
                @can('IMPORTANCE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/importances*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.importances.index') }}"
                           class="nav-link {{ Request::is('parametrage/importances*') ? 'active' : '' }}">
                            Importances
                        </a>
                    </li>
                @endcan
                @can('RAISON_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/raison_interets*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.raison_interets.index') }}"
                           class="nav-link {{ Request::is('parametrage/raison_interets*') ? 'active' : '' }}">
                            Raisons interet
                        </a>
                    </li>
                @endcan
                @can('TYPADRESSE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_adresses*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_adresses.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_adresses*') ? 'active' : '' }}">
                            Types adresses
                        </a>
                    </li>
                @endcan
                @can('TYPENOTE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_notes*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_notes.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_notes*') ? 'active' : '' }}">
                            Types notes
                        </a>
                    </li>
                @endcan
                @can('TYPESELECTEUR_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_selecteurs*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_selecteurs.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_selecteurs*') ? 'active' : '' }}">
                            Types sélecteurs
                        </a>
                    </li>
                @endcan
                @can('CFIELD_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/custom_fields*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.custom_fields.index') }}"
                           class="nav-link {{ Request::is('parametrage/custom_fields*') ? 'active' : '' }}">
                            Customs fields
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany
@canany('TYPEVENT_SHOW','LOCALITE_SHOW','DEPARTEMENT_SHOW', 'PROVINCE_SHOW','REGION_SHOW','MODE_OP_SHOW','TYPE_EL_BILAN_SHOW')
    <li class="nav-item {{ Request::is('parametrage/type_evenements*','parametrage/mode_operatoires*',
                        'parametrage/type_element_bilans*','parametrage/localites*','parametrage/departements*',
                        'parametrage/provinces*','parametrage/regions*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#param_events" role="button" aria-expanded="false"
           aria-controls="icons">
            <i class="link-icon" data-feather="calendar"><i class="link-icon" data-feather="settings"></i></i>
            <span class="link-title">Evènenements</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('parametrage/type_evenements*','parametrage/mode_operatoires*',
                            'parametrage/type_element_bilans*','parametrage/localites*','parametrage/departements*',
                            'parametrage/provinces*','parametrage/regions*') ? 'show' : '' }}" id="param_events">
            <ul class="nav sub-menu">
                @can('TYPEVENT_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_evenements*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_evenements.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_evenements*') ? 'active' : '' }}">
                            Types évenements
                        </a>
                    </li>
                @endcan
                @can('MODE_OP_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/mode_operatoires*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.mode_operatoires.index') }}"
                           class="nav-link {{ Request::is('parametrage/mode_operatoires*') ? 'active' : '' }}">
                            Mode operatoires
                        </a>
                    </li>
                @endcan
                @can('TYPE_EL_BILAN_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/type_element_bilans*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.type_element_bilans.index') }}"
                           class="nav-link {{ Request::is('parametrage/type_element_bilans*') ? 'active' : '' }}">
                            Types élements bilan
                        </a>
                    </li>
                @endcan
                @can('LOCALITE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/localites*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.localites.index') }}"
                           class="nav-link {{ Request::is('parametrage/localites*') ? 'active' : '' }}">
                            Localités
                        </a>
                    </li>
                @endcan
                @can('DEPARTEMENT_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/departements*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.departements.index') }}"
                           class="nav-link {{ Request::is('parametrage/departements*') ? 'active' : '' }}">
                            Départements
                        </a>
                    </li>
                @endcan
                @can('PROVINCE_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/provinces*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.provinces.index') }}"
                           class="nav-link {{ Request::is('parametrage/provinces*') ? 'active' : '' }}">
                            Provinces
                        </a>
                    </li>
                @endcan
                @can('REGION_SHOW')
                    <li class="nav-item {{ Request::is('parametrage/regions*') ? 'active' : '' }}">
                        <a href="{{ route('parametrage.regions.index') }}"
                           class="nav-link {{ Request::is('parametrage/regions*') ? 'active' : '' }}">
                            Regions
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany
@canany('USER_SHOW','GROUPE_SHOW','DROIT_SHOW','DOMAINE_SHOW','ACTION_SHOW','CONNEXION_SHOW','MODULE_SHOW','SOUSMODULE_SHOW','MENU_SHOW' )
    <li class="nav-item nav-category">Module Administration</li>
@endcanany
@canany('USER_SHOW','GROUPE_SHOW')
    <li class="nav-item {{ Request::is('administration/utilisateurs','administration/groupes*') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Utilisateurs</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('administration/utilisateurs','administration/groupes*') ? 'show' : '' }}"
             id="users">
            <ul class="nav sub-menu">
                @can('USER_SHOW')
                    <li class="nav-item {{ Request::is('administration/utilisateurs') ? 'active' : '' }}">
                        <a href="{{ route('administration.utilisateurs.index') }}"
                           class="nav-link {{ Request::is('administration/utilisateurs') ? 'active' : '' }}">
                            Utilisateurs
                        </a>
                    </li>
                @endcan
                @can('GROUPE_SHOW')
                    <li class="nav-item {{ Request::is('administration/groupes*') ? 'active' : '' }}">
                        <a href="{{ route('administration.groupes.index') }}"
                           class="nav-link {{ Request::is('administration/groupes*') ? 'active' : '' }}">
                            Groupes
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany
@canany('DROIT_SHOW','DOMAINE_SHOW')
    <li class="nav-item {{ Request::is('administration/droits','administration/domaine_interets','administration/classifications') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#droits" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="key"></i>
            <span class="link-title">Droits Acces</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('administration/droits','administration/domaine_interets',
                                'administration/classifications') ? 'show' : '' }}" id="droits">
            <ul class="nav sub-menu">
                @can('DROIT_SHOW')
                    <li class="nav-item {{ Request::is('administration/droits') ? 'active' : '' }}">
                        <a href="{{ route('administration.droits.index') }}"
                           class="nav-link {{ Request::is('administration/droits') ? 'active' : '' }}">Droits</a>
                    </li>
                @endcan
                @can('DOMAINE_SHOW')
                    <li class="nav-item {{ Request::is('administration/domaine_interets') ? 'active' : '' }}">
                        <a href="{{ route('administration.domaine_interets.index') }}"
                           class="nav-link {{ Request::is('administration/domaine_interets') ? 'active' : '' }}">
                            Domaine interets
                        </a>
                    </li>
                @endcan
                @can('DOMAINE_SHOW')
                    <li class="nav-item {{ Request::is('administration/classifications') ? 'active' : '' }}">
                        <a href="{{ route('administration.classifications.index') }}"
                           class="nav-link {{ Request::is('administration/classifications') ? 'active' : '' }}">
                            Classifications
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany
@canany('ACTION_SHOW','CONNEXION_SHOW')
    <li class="nav-item {{ Request::is('administration/actions','administration/connexions') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#audits" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="mouse-pointer"></i>
            <span class="link-title">Audits</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('administration/actions','administration/connexions') ? 'show' : '' }}"
             id="audits">
            <ul class="nav sub-menu">
                @can('ACTION_SHOW')
                    <li class="nav-item {{ Request::is('administration/actions*') ? 'active' : '' }}">
                        <a href="{{ route('administration.actions.index') }}"
                           class="nav-link {{ Request::is('administration/actions*') ? 'active' : '' }}">
                            Actions
                        </a>
                    </li>
                @endcan
                @can('CONNEXION_SHOW')
                    <li class="nav-item {{ Request::is('administration/connexions*') ? 'active' : '' }}">
                        <a href="{{ route('administration.connexions.index') }}"
                           class="nav-link {{ Request::is('administration/connexions*') ? 'active' : '' }}">
                            Connexions
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
    </li>
@endcanany

@canany('MODULE_SHOW','SOUSMODULE_SHOW','MENU_SHOW')
    <li class="nav-item {{ Request::is('administration/modules','administration/sous_modules','administration/menus') ? 'active' : '' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#menus" role="button" aria-expanded="false"
           aria-controls="emails">
            <i class="link-icon" data-feather="list"></i>
            <span class="link-title">Menus</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ Request::is('administration/modules','administration/sous_modules',
                                'administration/menus') ? 'show' : '' }}" id="menus">
            <ul class="nav sub-menu">
                @can('MODULE_SHOW')
                    <li class="nav-item {{ Request::is('administration/modules') ? 'active' : '' }}">
                        <a href="{{ route('administration.modules.index') }}"
                           class="nav-link {{ Request::is('administration/modules') ? 'active' : '' }}">
                            Modules
                        </a>
                    </li>
                @endcan
                @can('SOUSMODULE_SHOW')
                    <li class="nav-item {{ Request::is('administration/sous_modules') ? 'active' : '' }}">
                        <a href="{{ route('administration.sous_modules.index') }}"
                           class="nav-link {{ Request::is('administration/sous_modules') ? 'active' : '' }}">
                            Sous modules
                        </a>
                    </li>
                @endcan
                @can('MENU_SHOW')
                    <li class="nav-item {{ Request::is('administration/menus') ? 'active' : '' }}">
                        <a href="{{ route('administration.menus.index') }}"
                           class="nav-link {{ Request::is('administration/menus') ? 'active' : '' }}">
                            Menus
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany --}}

<li class="nav-item nav-category">Module Documentation</li>
<li class="nav-item {{ Request::is('help') ? 'active' : '' }}">
    <a href="{{ route('help') }}" class="nav-link">
        <i class="link-icon" data-feather="info"></i>
        <span class="link-title">Aide</span>
    </a>
</li>
<li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
    <a href="{{ route('about') }}" class="nav-link">
        <i class="link-icon" data-feather="info"></i>
        <span class="link-title">A propos</span>
    </a>
</li>
