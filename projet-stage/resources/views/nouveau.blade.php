
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
@extends('header')
@section('content')

<body class="hold-transition sidebar-mini"> 

<section class="content">
<div class="container-fluid">
  <div class="card card-default">
  <form action="/ajouter" method="Post">
        @csrf
        <div class="row">
          <div class="col-md-6" id="im">
            <div class="form-group">
              <label> Immatriculation:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="im" class="form-control rounded" placeholder="Immatriculation:" data-mask /><br>
          
              </div>
            </div>
            <div class="form-group">
              <label> Nom:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="nom" class="form-control rounded" placeholder="Nom:" data-mask /><br>
          
              </div>
            </div>
            <div class="form-group">
              <label> Prénom:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="prenom" class="form-control rounded" placeholder="Prénom:" data-mask /><br>
          
              </div>
            </div>

            <div class="form-group">
              <label> Adresse e-mail:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-home"></i></span>
                </div>
                <input type="email" name="mail" class="form-control rounded" placeholder="Adresse e-mail:" data-mask /><br>
          
              </div>
            </div>


          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label> Cour d'Appel:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-home"></i></span>
                </div>
                <input type="text" name="appel" class="form-control rounded" value="{{ Auth::user()->appel }}" /><br>
              </div>
            </div>
            <div class="form-group">
              <label> Tribunal:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-home"></i></span>
                </div>
                <input type="text" name="tpi" class="form-control rounded" value="{{Auth::user()->tribunal}}"  /><br>
          
              </div>
            </div>
            <div class="form-group">
              <label> Status:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text"> <i class="fas fa-number"></i></span> -->
                </div>
                <input type="number" name="status" class="form-control rounded" placeholder="Status:" data-mask /><br>
          
              </div>
            </div>

            <div class="form-group">
              <label> Mot de passe:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text"> <i class="fas fa-password"></i></span> -->
                </div>
                <input type="password" name="mdp" class="form-control rounded " placeholder="Mot de passe:" data-mask /><br>
          
              </div>
            </div>


          </div>
          
        </div>


        <button type="submit" class="btn btn-success col fileinput-button" value="">
        <i class="fas fa-plus"></i>  
        <span>Enregistrer</span>
        </button> 
  </form>


  </div>
</div>
</section>
  
</body>

@endsection
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../../plugins/codemirror/codemirror.js"></script>
<script src="../../plugins/codemirror/mode/css/css.js"></script>
<script src="../../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>