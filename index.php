<?php
    include_once 'db/connect.php';
    include_once 'includes/header.php';
    session_start();
    unset ($_SESSION['ile']);
    unset($_SESSION['blad_add']);
    unset($_SESSION['score']);
    unset($_SESSION['id']);
    print_r($_SESSION);
?>




<header>
    <div class="container">
        <h1>PHP QUIZERR</h1>
    </div>
</header>





<?php
  if (!isset($_SESSION['user'])){echo '<a href="logowanie/logowanie.php">Zaloguj się</a>';}
    else{echo 'Witaj: '.$_SESSION['user'].' ';}
      if(isset($_SESSION['uprawinienia'])){
        if($_SESSION['uprawinienia']=='1'){
          echo '<a href="admin/paneladmin.php">Zarządzaj Użytkownikami</a> ';
          echo '<a href="quizy/add_quiz.php">Dodaj quiz</a> ';
          echo '<a href="quizy/set_quiz.php">Zaplanuj quiz</a> ';
          echo '<a href="modyfiakcja_quiz/modify_quiz.php">Modyfikuj quizy</a> ';
            }
            else if($_SESSION['uprawinienia']=='0'){
               }
        }


?>




<main>
    <div class="container">
        <h2> Test your PHP Knowlege</h2>
<p> This is the multiple choice quiz to test your knowledge of PHP</p>
<ul>
    <li><strong> Number of Questions: </strong><?php echo $total;?> </li>
    <li><strong> Type Of Quiz: </strong> Multiple Choice</li>
    <li><strong> Estimated time: </strong><?php echo $total * 0.5; ?> Minutes </li>

</ul>
<a href="question.php?n=1" class="btn btn-primary">Start Quiz</a>
<!-- Needed -->
</div>

<?php
include_once 'includes\footer.php';
?>
<div class='grid'><form method='post' action='quiz_menu.php'>
<?php
if (isset($_SESSION['grupa']) && isset($_SESSION['klasa'])){
  $query="SELECT * FROM kolejka WHERE klasa='".$_SESSION['klasa']."' AND grupa='".$_SESSION['grupa']."' OR grupa='3' AND data_start<='".date('Y-m-d H:i:s')."' AND data_koniec>='".date('Y-m-d H:i:s')."'";
  $results= $mysqli->query($query) or die($mysqli_error.__LINE__);
  while($row=$results->fetch_assoc()){
      echo "<button type=submit name='quiz_id' value='".$row['id_quiz']."'>".$row['name']."</button>";
  }
}



?></form></div>
</div>
</main>



