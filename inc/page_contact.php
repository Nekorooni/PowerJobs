<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])||empty($_POST['email'])||empty($_POST['content']))
        $err.="Vul alle velden in.";
    else{
        //Recaptcha validation
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfWkB8UAAAAAIaYdPzyh_rLQlRF5Tl7aRWeOWrI&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false){
            $err.="De robot check is niet goedgekeurd.";
        }else{
            try
            {
                $stmt = $pdo->prepare("INSERT INTO contact (`Naam`, `Email`, `Content`) VALUES (:name, :email, :content)");
                $stmt->bindParam(':name',      $_POST['name']);
                $stmt->bindParam(':email',      $_POST['email']);
                $stmt->bindParam(':content',   $_POST['content']);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

        }
    }
}
?>
<div class="item">
    <h1>Neem contact op</h1>
    <form method="post" action="<?php echo basename($_SERVER['REQUEST_URI']);?>">
        <label>Naam: <input type="text" name="name" placeholder="Naam.." required></label>
        <label>Email: <input type="text" name="email" placeholder="Email.." required></label>
        <label>Vraag: <textarea name="content" placeholder="Vraag ons iets.." rows="10" required></textarea></label>
        <div class="g-recaptcha" data-sitekey="6LfWkB8UAAAAABavAEj475iiWxoarcCwuxzVBS1b"></div>
        <input type="submit" value="Versturen">
        <?php echo $err; ?>
    </form>
</div>