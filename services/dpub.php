
<!DOCTYPE html>

<?php
session_start();
?>
    

<body>
<?php
include "nav.php" ;
?>


    <h1>Demande de Publicité</h1>
        <form action="creation/dpub.php" method="post">

            <div class="row g-3">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Nom de l'entreprise / Organisation" name="nom_entreprise" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Contact principal" name="contact_principal" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="tel" class="form-control bg-light border-0 px-4" placeholder="Téléphone" name="telephone" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="email" class="form-control bg-light border-0 px-4" placeholder="Adresse e-mail" name="email" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Type de publicité souhaité" name="type_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Objectif de la publicité" name="objectif_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Public cible" name="public_cible" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Format de la publicité" name="format_publicite" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Texte principal" name="texte_principal" required></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="date" class="form-control bg-light border-0 px-4" placeholder="Date de diffusion souhaitée" name="date_diffusion" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Budget prévu pour la publicité" name="budget_publicite" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Canal de diffusion préféré" name="canal_diffusion" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Remarques ou commentaires additionnels" name="remarques"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100 py-3" type="submit">Envoyer la demande</button>
                    </div>
                </div>
            </div>
        </form>

</div>
</div>
<?php
include "../footer.php" ;
?>
</body>
   
</html>
