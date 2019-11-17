<!DOCTYPE html>

<head>
   <title>Sampl'é</title>
   <meta charset="utf-8" />
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <link rel="stylesheet" href="css/Login.css" />
    <link rel="icon" href="../images/logo.ico"/>
    <script src="../js/responsive.js"></script>
</head>


<body>
      
   	<h1> Sampl'é </h1>

   <img src="images/icon_login.svg" alt="image" title="icon_login" width="30%"/>

    <?php

    if(isset($params['accessDenied'])) {
        echo "
           <p style='color: red' align='center'>
           Une erreur est survenue.
           </p>
        ";
    }

    if(isset($params['registered'])) {
        echo "
           <p style='color: green' align='center'>
           Vous avez bien été enregistré.
           </p>
        ";
    }
    ?>

    <div class="container">
        <form action="/login" method="post">

            <!-- Username -->
    <section class="content">
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="text" id="input-1" name="username" minlength="4" maxlength="40" required autofocus />
            <label class="input__label input__label--kaede" for="input-1">
        <span class="input__label-content input__label-content--kaede">Entez votre nom d'utilisateur</span>
            </label>
        </span>

            <!-- Password -->
        <span class="input input--kaede">
            <input class="input__field input__field--kaede" type="password" id="input-2" name="password" minlength="6" maxlength="80" required/>
            <label class="input__label input__label--kaede" for="input-2">
        <span class="input__label-content input__label-content--kaede">Entez votre mot de passe</span>
            </label>
        </span>
    </section>

            <!-- Button -->
            <button type="login">Confirmer</button>
        </form>
        <form action="/register">
            <button type="register">S'enregistrer</button>
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
