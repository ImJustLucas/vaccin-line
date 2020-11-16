<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

$errors = array();

include('inc/header-front.php');

if(!empty($_POST['ajoutvaccin'])) {
  $vaccin = cleanXss($_POST['vaccin']);
  $date = cleanXss($_POST['date']);
  $id_user = $_SESSION['user']['id'];

  if(!empty($vaccin)) {

  } else {
    $errors['vaccin'] = 'Veuillez selectioner un vaccin';
  }
  if(!empty($date)) {

  } else {
    $errors['date'] = 'Veuillez renseignez ce champ';
  }

  if(count($errors) == 0) {
    $sql = "INSERT INTO vl_user_vaccin (id_user,id_vaccin,fait_le)
    VALUES (:id_user,:vaccin,:date)";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_user',$id_user,PDO::PARAM_STR);
    $query->bindValue(':vaccin',$vaccin,PDO::PARAM_STR);
    $query->bindValue(':date',$date,PDO::PARAM_STR);
    $query->execute();
  }

}
?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
  <section id="banner">
    <img src="asset/img/vaccin_line.png" class="logo">
    <div class="banner-text">
      <h1>Vaccin'Line</h1>
      <p>Vaccin'Line Le Carnet Du Futur</p>
      <div class="banner-btn">
        <a href="signin.php"><span></span>Inscription</a>
        <a href="login.php"><span></span>Connexion</a>
      </div>
    </div>
    <div class="log-header">




      <!-- Si non connecter -->
      <?php if(empty($_SESSION)) : ?>

      <?php endif; ?>
      <!-- Si connecter  -->
      <?php if(!empty($_SESSION)) : ?>
        <?php
        if ($_SESSION['user']['age'] > 18)  {
          switch ($_SESSION['user']['civilite']) {
            case "monsieur" :
            echo '<img src="asset/img/undraw_profile_2.svg" alt="" width="50px"> ';
            echo  '<p class="nomPrenom">' . 'M.';
            break;
            case "madame" :
            echo '<img src="asset/img/undraw_profile_1.svg" alt="" width="50px">';
            echo '<p class="nomPrenom">' .'Mme.';
            break;
          }
        } else {
          echo '<img src="asset/img/undraw_profile_3.svg" alt="" width="50px">';
        }
        echo  $_SESSION['user']['nom'] . ' '. $_SESSION['user']['prenom'] . '</p>';
        ?>

        <div class="in-out">

          <a href="logout.php"><img src="asset/img/sign-out-alt-solid.svg" alt="" srcset="" width="30px"></a>
          <a href="settings.php"><img src="asset/img/sliders-h-solid.svg" alt="" srcset="" width="30px"></a>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <section id="feature">
    <div class="title-text">
      <p>Fonctionnalités</p>
      <h1>Pourquoi Nous Choisir</h1>
    </div>
    <div class="feature-box">
      <div class="features">
        <h1>Equipe d'expérience</h1>
        <div class="features-desc">
          <div class="feature-icon">
            <i class="fa fa-check-square-o"></i>
          </div>
          <div class="feature-text"></div>
          <p>Géré et sécurisé par une équipe expérimenté. Le carnet est simple et fonctionnel.Géré et sécurisé par une équipe expérimenté. Le carnet est simple et fonctionnel</p>
        </div>
        <h1>Sécurité</h1>
        <div class="features-desc">
          <div class="feature-icon">
            <i class="fa fa-shield"></i>
          </div>
          <div class="feature-text"></div>
          <p>L'adhésion se fait entièrement en ligne, procédure administrative simple et rapide.L'adhésion se fait entièrement en ligne, procédure administrative simple et rapide.</p>
        </div>
        <h1>Gratuité</h1>
        <div class="features-desc">
          <div class="feature-icon">
            <i class="fa fa-inr"></i>
          </div>
          <div class="feature-text"></div>
          <p>Notre carnet de vaccination et totalement gratuit et disponible à vie.Notre carnet de vaccination et totalement gratuit et disponible à vie.</p>
        </div>
      </div>
      <div class="features-img">
        <img src="asset/img/feature.jpg" alt="">
      </div>
    </div>
  </section>
  <!-- service -->
  <section id="service">
    <div class="title-text">
      <p>SERVICES</p>
      <h1>Nos Meilleurs Services</h1>
    </div>
    <div class="service-box">
      <div class="single-service">
        <img src="asset/img/pic1.jpg" alt="">
        <div class="overlay"></div>
        <div class="service-desc">
          <h3>Inscription Valable à Vie</h3>
          <hr>
          <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
        </div>
      </div>
      <div class="single-service">
        <img src="asset/img/pic2.jpg" alt="">
        <div class="overlay"></div>
        <div class="service-desc">
          <h3>Sécurité</h3>
          <hr>
          <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
        </div>
      </div>
      <div class="single-service">
        <img src="asset/img/pic3.jpg" alt="">
        <div class="overlay"></div>
        <div class="service-desc">
          <h3>Automatisation des Tâches</h3>
          <hr>
          <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
        </div>
      </div>
      <div class="single-service">
        <img src="asset/img/pic4.jpg" alt="">
        <div class="overlay"></div>
        <div class="service-desc">
          <h3>Dry Shampoo</h3>
          <hr>
          <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- témoignages -->
  <section id="testimonial">
    <div class="title-text">
      <p>TEMOIGNAGES</p>
      <h1>Commentaires Clients</h1>
    </div>
    <div class="testimonial-row">
      <div class="testimonial-col">
        <div class="user">
          <img src="asset/img/img-1.jpg" alt="">
          <div class="user-info">
            <h4>ANTOINE DANIEL <i class="fa fa-twitter"></i></h4>
            <small>@antoinedaniel</small>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
      </div>
      <div class="testimonial-col">
        <div class="user">
          <img src="asset/img/img-2.jpg" alt="">
          <div class="user-info">
            <h4>ELLA DANLOSS <i class="fa fa-twitter"></i></h4>
            <small>@elladanloss</small>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="testimonial-col">
        <div class="user">
          <img src="asset/img/img-3.jpg" alt="">
          <div class="user-info">
            <h4>TOM EIGERI <i class="fa fa-twitter"></i></h4>
            <small>@tomeigeri</small>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
      </div>
    </div>
  </section>



<!-- <section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>Comment utiliser notre carnet ?</h1>
        <p>Le carnet de vaccination est un carnet dans lequel sont notées toutes les vaccinations d’une personne. Ce carnet est très <strong class="very-important-word">pratique</strong> : il vous permet de savoir quelles vaccinations vous avez reçues et si vous êtes à jour. Il vous suffit donc de vous connecter et ne pas oublier de le présenter au professionnel de santé à chaque fois que vous vous faites vacciner. Il est valable toute la vie ! Pour l’obtenir, il suffit de vous <a class="signin.php"><strong>inscrire</strong></a>. Il est <strong class="very-important-word">gratuit</strong>.</p>
      </div>
    </div>
    <div class="bigbox2">
      <div class="stats2">
        <h1>Notre carnet est-il sécurisé ?</h1>
        <p>Vos données medicale sont <strong class="very-important-word">précieuses</strong>, et doivent être protégées. C'est pour cela que nous avons mis au point un puissant logiciel de cryptage afin de vous proposer une <strong class="very-important-word">sécurité maximale</strong>. Enfin, vos données sont stockées dans une base de données spéciale, reconnue par le <strong class="very-important-word">gouvernement</strong>. Avec Vaccin 'line, vos données sont protégées et ne seront jamais partagées.</p>
      </div>
    </div>
    <div class="bigbox3">
      <div class="stats3">
        <h1>Eviter la réapparition <br>de dangereuses maladies</h1>
        <p>Certaines maladies semblent avoir disparu en France, ou être devenues très rares. Cependant, la plupart des microbes qui causent ces maladies existent toujours, y compris sur notre territoire. La vaccination doit donc se poursuivre. Ces microbes restent une menace pour les personnes non protégées par la vaccination ou insuffisamment protégées.</p>
      </div>
    </div>
    <div class="button">
      <div class="effect"> -->
        <!-- effect btn -->
        <!-- <a href="signin.php"  class="btn_inscription">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          inscription
        </a>
      </div>
      <div class="effect"> -->
        <!-- effect btn -->
        <!-- <a href="login.php"  class="btn_connexion">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          connexion
        </a>
      </div>
    </div>
  </div>
</section> -->
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>
    <!-- Formulaire ajout vaccin  -->
    <section id="vaccins">

      <form action="index.php" method="post" class="form-addvaccin">
        <h2>Ajouter un vaccin :</h1>
        <select name="vaccin" id="vaccin">
          <option value="">--VACCIN--</option>
          <?php
          $sql = "SELECT * FROM vl_vaccins ORDER BY maladie ASC";
          $query = $pdo->prepare($sql);
          $query->execute();
          $selects = $query->fetchAll();

          foreach($selects as $select) {
            echo '<option value="' . $select['id'].'">'. $select['maladie'] . '</option>';
          }
          ?>
        </select>
        <span class="error"><?php if(!empty($errors['vaccin'])) { echo $errors['vaccin']; }?></span>
        <div class="w50">
          <input type="date" name="date">
          <span class="error"><?php if(!empty($errors['date'])) { echo $errors['date']; }?></span>
        </div>
        <div class="w50">
          <input type="submit" name="ajoutvaccin">
        </div>
      </form>
    </section>
    <!-- RAPPEL VACCINs -->
    <section id="vaccins">
      <div class="rappel">


      <h1>Vos prochains rappels de vaccin :</h1>
      <br>
      <div class="BB1">
        <?php
          $id = $_SESSION['user']['id'];
          // Recuperation des données de la table vl_vaccin
          $sql = "SELECT * FROM vl_vaccins";
          $query = $pdo->prepare($sql);
          $query->execute();
          $vaccins = $query->fetchAll();
          // Recuperation des données de la table vl_user_vaccin
          $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le ASC";
          $query = $pdo->prepare($sql);
          $query->execute();
          $user_vaccins = $query->fetchAll();
          $incre_MB = 1;
          $incre_fait_le = 0;
        ?>
        <?php if(!empty($user_vaccins)) : ?>
          <?php foreach($vaccins as $vaccin) : ?>
            <div class="MB MB<?php echo $incre_MB; ?>" style="background-color:<?php if(c); ?>;">
              <p>Vaccin : <?php echo $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie']; ?></p>
              <p>Fait le : <?php echo $user_vaccins[$incre_fait_le]['fait_le']; ?></p>
            <?php if($vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] > 0) : ?> <p>Renouvelemnt : <?php echo vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] ; ?> </p> <?php endif; ?>
            </div>
            <?php
              $incre_MB += 1;
              $incre_fait_le +=1;
              if($incre_fait_le == count($user_vaccins)) {
                break;
              }
            ?>
          <?php endforeach; ?>
        <?php else : ?>
          <p>Vous n'avez pas de vaccin</p>
        <?php endif;?>
        </div>
      <br>
      <!-- derniers VACCINs -->
      <h1>Vos derniers vaccins :</h1>
      <br>

      <div class="BB2">
        <?php
          // Recuperation des données de la table vl_user_vaccin
          $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le DESC LIMIT 3";
          $query = $pdo->prepare($sql);
          $query->execute();
          $user_vaccins = $query->fetchAll();
          $incre_MB = 1;
          $incre_fait_le = 0;
          // Affichage des 3 derniers vaccin
          $incre_MB = 1;
          $incre_fait_le = 0;
          if (!empty($user_vaccins)) {
            foreach ($vaccins as $vaccin) {
              echo '<div class="MB MB'. $incre_MB .'">';
                echo '<p> Vaccin : '. $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie'] . '</p>';
                echo '<p> Fait le : '. $user_vaccins[$incre_fait_le]['fait_le'] . '</p>';
              echo '</div>';
              $incre_MB += 1;
              $incre_fait_le +=1;
              if($incre_fait_le == count($user_vaccins)) {
                break;
              }
            }
          } else {
            echo '<p> Vous n\'avez pas de vaccin actuelement </p>';
          }
        ?>

      </div>
      </div>
    </section>


<?php endif;
  include('inc/footer-front.php');
?>
