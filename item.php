<?php
$_SESSION['id']=13;
                        if ($result->num_rows > 0)
                        {
                            while ($row=$result->fetch_array())
                            {

                                $id = $_SESSION['id'];
                                $_SESSION['obraz'] = $row['obraz'];
                                $_SESSION['nazwa'] = $row['nazwa'];
                                $_SESSION['opis'] = $row['opis'];
                                $_SESSION['cena'] = $row['cena'];
                                $_SESSION['idKategorii'] = $row['idKategorii'];
                                echo '<a href="details.php?id='.$id.'">';
                                echo '<div class="slot">';
                                echo '<img class="image" src="img/products/'.$_SESSION["obraz"].'" alt="">';
                                echo '<div class="sign">';
                                echo '<p>'.$_SESSION["nazwa"].'</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        }
                        else
                        {
                            echo "error";
                        }
                        // if ($result->num_rows < 0)
                        // {
                        //     echo '</div>';
                        // }
                    $result->free_result();
                    $conn->close();
                ?>