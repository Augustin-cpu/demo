<?php
$title = "Login"; 
ob_start();

?>
<div class="login-container">

<form method="POST"  class="needs-validation " novalidate>
            
            <div class="mb-3">
                <label for="nom" class="form-label">FirstName</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="login" 
                    placeholder="FirstName"
                    required
                >
                <div class="invalid-feedback">
                    Veuillez fournir un nom valide.
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="pass"
                    placeholder="Password"
                    required
                >
                <div class="invalid-feedback">
                    Veuillez entrer votre mot de passe.
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="valide" class="btn btn-primary">Se Connecter</button>
            </div>
            
            <hr>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Exemple de script pour activer la validation côté client de Bootstrap
    (function () {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
    })()
    </script>
<?php $content = ob_get_clean();
require('layout.php');
?>