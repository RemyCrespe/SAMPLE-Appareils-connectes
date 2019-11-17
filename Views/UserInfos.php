<!DOCTYPE html>

<head>
   <title>Sampl'é</title>
   <meta charset="utf-8" />
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <link rel="stylesheet" href="../css/Login.css" />
   <link rel="icon" href="../images/logo.ico"/>
   <script src="../js/states.js"></script>
   <script src="../js/responsive.js"></script>
</head>

<body>
	<h1>Sampl'é - Infos utilisateur</h1>
	<img id="logo" src="../images/logo.png" alt="image" title="icon_login"/>

    <?php if(isset($params['error'])) {
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

    if (isset($params['success']))
    {
        echo "
           <p style='color: green' align='center'>
           Modifications correctement prises en comptes !
           </p>
        ";
    }
    ?>

    <br/>
    <h2 align="center">Identité : <?php $user = $params['app']->getSessionParameters('user'); echo $user['username']; ?> </h2>

    <form action="/user/update" method="post">

    <!-- Username -->
    <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-1" value="<?php echo $user['username']; ?>" name="username" minlength="4" maxlength="40" required />
            <label class="input__label input__label--kaede" for="input-1">
        <span class="input__label-content input__label-content--kaede">Entrez un nom d'utilisateur</span>
            </label>
        </span>

        <!-- Nom -->
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-2" value="<?php echo $user['familyName']; ?>" name="familyName" minlength="3" maxlength="40" required/>
            <label class="input__label input__label--kaede" for="input-2">
        <span class="input__label-content input__label-content--kaede">Entrez un nom</span>
            </label>
        </span>
    </section>

        <!-- Prénom -->
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-3" value="<?php echo $user['firstName']; ?>" name="firstName" minlength="3" maxlength="40" required/>
            <label class="input__label input__label--kaede" for="input-3">
        <span class="input__label-content input__label-content--kaede">Entrez un prénom</span>
            </label>
        </span>
    </section>

    <!-- Email -->
    <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-4" value="<?php echo $user['email']; ?>" name="email" minlength="4" maxlength="80" required />
            <label class="input__label input__label--kaede" for="input-4">
        <span class="input__label-content input__label-content--kaede">Entrez un email</span>
            </label>
        </span>

        <!-- Password -->
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="password" id="input-5" value="" name="password" minlength="6" maxlength="80"/>
            <label class="input__label input__label--kaede" for="input-5">
        <span class="input__label-content input__label-content--kaede">Entez un mot de passe</span>
            </label>
        </span>
    </section>

    <!-- Password Re -->
    <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="password" id="input-6" value="" name="passwordConfirm" minlength="6" maxlength="80" />
            <label class="input__label input__label--kaede" for="input-6">
        <span class="input__label-content input__label-content--kaede">Confirmez le mot de passe</span>
            </label>
        </span>
    </section>

        <button type="login">Enregistrer les modifications</button>
    </form>

    <form action="/home">
        <button type="register">Retour</button>
    </form>

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

