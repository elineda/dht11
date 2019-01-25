<?php ob_start();?>
    <header>
      <img src="tuturu.png"></img>
    </header>
    <main>
      <h1>Configuration DDB </h1>
      <div>Merci d'entrer les données suivantes.</div>
      <form class="envoi" action="model/empty.php" method="post">
        <div>Adresse</div><input type="text" name="host" value="">
        <div>Utilisateur</div><input type="text" name="username" value="">
        <div>Password</div><input type="password" name="password" value="">
        <div>nom de la base</div><input type="text" name="dbname" value="">
        <button type="submit" name="button">gooooo</button>
      </form>

</main>
    <footer>

    </footer>



<script src="script.js" type="text/javascript"></script>

<?php $content=ob_get_clean();?>
