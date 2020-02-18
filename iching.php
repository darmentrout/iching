<?php

header('Content-Type: application/json');

function consultOracle( $id ){
    $db = new PDO(
        'sqlite:iching.db',
        '',
        '',
        array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
    );

    try {
        $sql = 'SELECT * FROM iching where id = ?';
        $stm = $db->prepare( $sql );
        $stm->bindParam( 1, $id, PDO::PARAM_INT );
        $stm->execute();
        $result = $stm->fetchAll( PDO::FETCH_ASSOC );
        // PDO::FETCH_ASSOC prevents duplicates in results
        echo json_encode( $result );
    }
    catch(PDOException $e){
        echo 'Exception : '.$e->getMessage();
    }
}

// if the id is set and not empty
if( isset($_GET['id']) && !empty($_GET['id']) ){
    $id  = htmlspecialchars( $_GET['id'] );
    if( $id > 0 && $id < 65){
        consultOracle( $id );
    }
    else {
        echo '[{"error": "valid IDs fall within 1-64 range"}]';
    }
}

// if the id is set but there is value
if( isset($_GET['id']) && empty($_GET['id']) ){
    echo '[{"error": "no id supplied"}]';
}

// get a random reading
if( isset($_GET['random']) ){
    $rdm = rand( 1, 64 );
    consultOracle( $rdm );
}


?>
