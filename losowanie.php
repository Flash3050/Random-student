<?php
            require_once "connect.php";

            $dbconnect = @new mysqli($adres_bazy, $db_user, $db_pass, $db_name);

            if($dbconnect->connect_errno==0){
                $kwerenda = "SELECT imiona, oceny FROM oceny WHERE oceny <=2 ORDER BY RAND() LIMIT 1";

                if($rezultat = @$dbconnect->query($kwerenda)){
                    while($wiersz = $rezultat->fetch_assoc()){
                        echo "Wylosowana osoba: ".$wiersz['imiona'];
                        echo "<br />";
                        echo "Ilość ocen: ".$wiersz['oceny'];
echo<<<END
                        <form>
                            Losuj ponownie: <input type="button" value="LOSUJ PONOWNIE!" onClick="location.reload();" />                      
                        </from>
END;
                    }
                    
                    $rezultat->close();
                }
                
                $dbconnect->close();
            }else{
                echo "Błąd połączenia z bazą danych! Kod błędu: ".$dbconnect->$connect_errno;
            }
?>