@extends('header')
@section('content')
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
     <div class="row">
     <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered rounded-md">
                    <thead>
                        <tr>
                            <th class="text-sm">Immatriculation</th>
                            <th class="text-sm">Nom</th>
                            <th class="text-sm">Prénom</th>
                            <th class="text-sm">Adresse e-mail </th>
                            <th class="text-sm">Cour d'Appel </th>
                            <th class="text-sm">Tribunal</th>
                            <th class="text-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listes as $user)
                        <tr>
                            <td class="text-sm">{{$user->immatriculation}}</td>
                            <td class="text-sm">{{$user->nom}}</td>
                            <td class="text-sm">{{$user->prenom}}</td>
                            <td class="text-sm">{{$user->email}}</td>
                            <td class="text-sm">{{$user->appel}}</td>
                            <td class="text-sm">{{$user->tribunal}}</td>
                            <td class="text-sm">{{$user->status}}</td>
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <br>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": [{extend:'copy', text:'Copier'},{ "extend": 'excel', "text": 'Excel' },{ "extend": 'pdf', "text": 'PDF' },{ "extend": 'print', "text": 'Imprimer' },{ "extend": 'colvis', "text": 'visibilité colonne' }],
      "language": {
        "sProcessing":    "Traitement en cours...",
        "sSearch":        "Rechercher&nbsp;:",
        "sLengthMenu":    "Afficher _MENU_ &eacute;l&eacute;ments",
        "sInfo":          "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        "sInfoEmpty":     "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
        "sInfoFiltered":  "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        "sInfoPostFix":   "",
        "sLoadingRecords": "Chargement en cours...",
        "sZeroRecords":   "Aucun &eacute;l&eacute;ment &agrave; afficher",
        "sEmptyTable":    "Aucune donn&eacute;e disponible dans le tableau",
        "oPaginate": {
            "sFirst":      "Premier",
            "sPrevious":   "Pr&eacute;c&eacute;dent",
            "sNext":       "Suivant",
            "sLast":       "Dernier"
        },
        "oAria": {
            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
        },
        "buttons": {
            "copyTitle": 'Copié dans le presse-papiers',
            "copySuccess": {
                "_": '%d lignes copiées',
                "1": '1 ligne copiée'
            }
        }
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection