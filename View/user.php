<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/css/home.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div> Connected as <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></div>
        <div> <a href="View/disconnect.php">Disconnect</a> </div>
    </header>
    <div id="main">
        <div class="submain">
            <fieldset class="categorie">
                <legend>My programs</legend>
                <button onclick="dispDiv('addProgram')">Add program</button>
                <form action="" method="post" style="display:none" id="addProgram">
                    <label for="pgmname">Program name</label>
                    <input type="text" required name="pgmname" id="pgmname">
                    <input type="submit">
                </form>
            </fieldset>
            <fieldset class="categorie">
                <legend>My exercices</legend>
                <table>
                    <tr>
                        <th>Exercice name</th>
                        <th>Muscle group</th>
                    </tr>
                    <?php
                        if(sizeof($exercicesList)==0) echo "No exercices found <br>";
                        else{
                            for($i=0;$i<sizeof($exercicesList);$i++){
                                if($i%2==0) $color='lightgrey';
                                else $color='white';
                                echo "<tr style='background-color:".$color."'>";
                                echo "<td class='exname'>".$exercicesList[$i]["name"]."</td>";
                                echo "<td class='exgrp'>".$exercicesList[$i]["muscle"]."</td>";
                                echo "</tr>";
                            }
                            
                        }
                    ?>
                </table>
                <button onclick="dispDiv('addExercice')">Add exercice</button>
                <form action="" method="post" style="display:none" id="addExercice">
                    <table>
                        <tr>
                            <td><label for="exgroup">Muscle group</label></td>
                            <td>
                                <select name="exgroup" id="exgroup">
                                    <option value="quadriceps">Quadriceps</option>
                                    <option value="hamstrings">Hamstrings</option>
                                    <option value="gluteals">Gluteals</option>
                                    <option value="pectoralis">Pectoralis</option>
                                    <option value="back">Back</option>
                                    <option value="lats">Lats</option>
                                    <option value="biceps">Biceps</option>
                                    <option value="triceps">Triceps</option>
                                    <option value="deltoids">Deltoids</option>
                                    <option value="abs">Abs</option>
                                    <option value="calves">Calves</option>
                                    <option value="forearm">Forearm</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="exname">Exercice name</label></td>
                            <td><input type="text" required name="exname" id="exname"></td>
                        </tr>
                        <tr>
                            <td><label for="exnotes">Notes</label></td>
                            <td><input type="text"  name="exnotes" id="exnotes"></td>
                        </tr>
                    </table>
                    <input type="submit" value="Add">
                </form>
            </fieldset>
        </div>
        <div class="submain">
            <fieldset class="categorie">
                <legend>Weight track</legend>
            </fieldset>
            <fieldset class="categorie">
                <legend>Help</legend>
                <a href="https://sites.google.com/site/bodytrainingandexercise/_/rsrc/1424052191640/muscle-groups/muscle-anatomy-chart.jpg"><Button>Muscle group</Button></a>
            </fieldset>
        </div>


    </div>
</body>
</html>

<script>
    function dispDiv(div){
        document.getElementById(div).style.display="block";
    }
</script>