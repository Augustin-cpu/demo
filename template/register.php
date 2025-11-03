<div class="container d-flex align-items-center justify-content-center h-100 mt-5">
        <div class="row w-100">
            <div class="col-12 col-md-8 col-lg-5 mx-auto">
                
                <div class="card p-3 bg-white"> 
                    <div class="card-body">
                        
                        <h4 class="card-title text-center mb-4 fw-bold text-primary">Créer un Compte</h4>
                        <hr>
                        
                        <form method="POST" action="traitement_inscription.php" class="needs-validation" novalidate>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email (Login)</label>
                                <input 
                                    type="email" 
                                    class="form-control form-control-lg" 
                                    id="email" 
                                    name="email" 
                                    placeholder="nom@exemple.com"
                                    required
                                >
                                <div class="invalid-feedback">
                                    Veuillez fournir un email valide.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input 
                                    type="password" 
                                    class="form-control form-control-lg" 
                                    id="password" 
                                    name="pass"
                                    placeholder="Mot de passe sécurisé"
                                    required
                                    minlength="8"
                                >
                                <div class="invalid-feedback">
                                    Le mot de passe doit contenir au moins 8 caractères.
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirmer le Mot de passe</label>
                                <input 
                                    type="password" 
                                    class="form-control form-control-lg" 
                                    id="confirm_password" 
                                    name="confirm_pass"
                                    placeholder="Confirmer le mot de passe"
                                    required
                                >
                                <div class="invalid-feedback">
                                    Veuillez confirmer votre mot de passe.
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" name="register" class="btn btn-primary btn-lg">S'inscrire</button>
                            </div>
                            
                            <hr class="mt-4">

                            <div class="text-center mt-3">
                                <p class="mb-0">
                                    Déjà un compte ? 
                                    <a href="?page=login" class="text-decoration-none fw-bold">Connectez-vous ici</a>
                                </p>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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