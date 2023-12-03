<style>
        .rating-card {
            max-width: 33rem;
            background: #fff;
            margin: 0 1rem;
            padding: 1rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            border-radius: 0.5rem;
        }

        .rating-star {
            font-size: 10vh;
        }

        .one {
            color: rgb(255, 0, 0);
        }

        .two {
            color: rgb(255, 106, 0);
        }

        .three {
            color: rgb(251, 255, 120);
        }

        .four {
            color: rgb(255, 255, 0);
        }

        .five {
            color: rgb(24, 159, 14);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
</style>

<form method="post" action="a-propos.php">
    <br><br>
    <div class="rating-card">
        <br />
        <span onclick="gfg(1)" class="rating-star">★</span>
        <span onclick="gfg(2)" class="rating-star">★</span>
        <span onclick="gfg(3)" class="rating-star">★</span>
        <span onclick="gfg(4)" class="rating-star">★</span>
        <span onclick="gfg(5)" class="rating-star">★</span>
        <input type="hidden" name="rating" id="rating" value="0">
    </div>
</form>

<script>
    let stars = document.getElementsByClassName("rating-star");
    let output = document.getElementById("output");

    // Réinitialiser les étoiles au chargement de la page
    window.onload = function() {
        remove();
    };

    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            let cls = "";
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "rating-star " + cls;
        }
        output.innerText = "Rating is: " + n + "/5";
        // Mettre à jour la valeur du champ rating dans le formulaire
        document.getElementById("rating").value = n;
    }

    function remove() {
        for (let i = 0; i < stars.length; i++) {
            stars[i].className = "rating-star";
        }
    }
</script>
