<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                <?php
                        if(sizeof($programList)==0) echo "No program <br>";
                        else{
                            for($i=0;$i<sizeof($programList);$i++){
                                if($i%2==0) $color='lightgrey';
                                else $color='white';
                                echo "<a href='#' style='background-color:".$color."' class='program' id='program".$programList[$i]["idProgram"]."'>".$programList[$i]["name"]."</a><br>";
                            }
                            
                        }
                ?>
                <button onclick="dispDiv('addProgram')">Add program</button>
                <form action="" method="post" style="display:none" id="addProgram">
                    <table>
                        <tr>
                            <td><label for="pgmname">Program name</label></td>
                            <td><input type="text" required name="pgmname" id="pgmname"></td>  
                        </tr>
                    </table>
                    <input type="submit" value="Add">
                </form>
                <form action="" method="post" id="addnewexercices">
                    <div id="addexercices" style="display:none">
                        <div id="addPrgLegend">Add exercice to program</div>
                        <table id="newexgrp" style="background-color:darkgrey;"> 
                            <tr>
                                <td>Muscle group</td>
                                <td>
                                    <select name="exgroup" id="mslgroup">
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
                                <td>Exercice</td>
                                <td>
                                    <select name="exname" id="exgroup" >
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Sets</td>
                                <td><input type="number" name="sets" required></td>
                            </tr>
                            <tr>
                                <td>Reps</td>
                                <td><input type="number" name="reps" required></td>
                            </tr>
                            <tr>
                                <td>Rest(min)</td>
                                <td><input type="number" name="rest" required></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Add exercice" name="id" id="newexsubmit"></td>
                            </tr>
                            
                        </table>

                    </div>
                </form>
            </fieldset>
            <fieldset class="categorie">
                <legend>Program details</legend>
                <div id="programdetails">Choose a program on your left to display more details</div>
                <table id="tableprogram">
                    <thead>
                        <tr>
                            <td>Exercice name</td>
                            <td>Sets</td>
                            <td>Reps</td>
                            <td>Rest(min)</td>
                        </tr>
                    </thead>
                    <tbody id="tablecontent"></tbody>
                </table>
            </fieldset>
        </div>
        <div class="submain">
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
            <fieldset class="categorie">
                <legend>Help</legend>
                <a href="https://sites.google.com/site/bodytrainingandexercise/_/rsrc/1424052191640/muscle-groups/muscle-anatomy-chart.jpg"><Button>Muscle group</Button></a>
            </fieldset>
        </div>


    </div>
</body>
</html>

<script src="View/js/user.js"></script>