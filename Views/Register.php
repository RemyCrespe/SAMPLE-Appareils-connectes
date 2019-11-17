<!DOCTYPE html>

<head>
    <title>Sampl'é</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/Register.css" />
    <link rel="icon" href="../images/logo.ico"/>
    <script src="../js/responsive.js"></script>
</head>

<body>

<h1> S'enregister </h1> <img id="logo" src="../images/logo.png" alt="image" title="icon_login"/>

<?php if(isset($params['!registered'])) {
    echo "
           <p style='color: red' align='center'>
           Une erreur est survenue, veuillez réessayer.
           </p>
        ";
    }

    if (isset($params['passwordError']))
    {
        echo "
           <p style='color: red' align='center'>
           Les mots de passes sont différents, veuillez vérifier votre saisie.
           </p>
        ";
    }

if (isset($params['userExist']))
{
    echo "
           <p style='color: red' align='center'>
           Cet utilisateur existe déjà.
           </p>
        ";
}
?>


<div class="container">
    <form action="/tryRegister" method="post" autocomplete="off">

        <!-- Prénom -->
        <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-1" name="firstName" minlength="3" maxlength="40" required />
            <label class="input__label input__label--kaede" for="input-1">
        <span class="input__label-content input__label-content--kaede">Entrez votre prénom</span>
            </label>
        </span>

            <!-- Nom -->
            <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-2" name="familyName" minlength="3" maxlength="40" required/>
            <label class="input__label input__label--kaede" for="input-2">
        <span class="input__label-content input__label-content--kaede">Entrez votre nom</span>
            </label>
        </span>
        </section>

        <!-- Username -->
        <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-3" name="username" minlength="4" maxlength="40" required />
            <label class="input__label input__label--kaede" for="input-3">
        <span class="input__label-content input__label-content--kaede">Entrez un nom d'utilisateur</span>
            </label>
        </span>

            <!-- Password -->
            <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="password" id="input-4" name="password" minlength="6" maxlength="80" required/>
            <label class="input__label input__label--kaede" for="input-4">
        <span class="input__label-content input__label-content--kaede">Entrez un mot de passe</span>
            </label>
        </span>
        </section>

        <!-- Password Re -->
        <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="password" id="input-5" name="passwordConfirm" minlength="6" maxlength="80" required />
            <label class="input__label input__label--kaede" for="input-5">
        <span class="input__label-content input__label-content--kaede">Confirmez le mot de passe</span>
            </label>
        </span>

            <!-- Email -->
            <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-6" name="email" minlength="4" maxlength="80" required/>
            <label class="input__label input__label--kaede" for="input-6">
        <span class="input__label-content input__label-content--kaede">Entrez un email</span>
            </label>
        </span>
        </section>


        <!-- Button -->
        <button type="submit">Confirmer</button>
    </form>
    <form action="/">
        <button type="back">Retour</button>
    </form>
</div>

<script src="js/classie.js"></script>
    <script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();
</script>

<footer>
    <p></p>
</footer>


</body>

</html>
