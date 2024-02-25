<?php

//si cest un admin
if ($_SESSION['utilisateurConnecte']=="administrateur"){

    ?><script>
    document.getElementById("dashboard-admin").hidden= false;
</script><?php

}else{
?>
    <script>
    document.getElementById("demandesDeServices").hidden= false;
</script><?php
}
    ?>
    

